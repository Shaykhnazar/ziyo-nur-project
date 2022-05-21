<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Diploma\BulkDestroyDiploma;
use App\Http\Requests\Admin\Diploma\DestroyDiploma;
use App\Http\Requests\Admin\Diploma\IndexDiploma;
use App\Http\Requests\Admin\Diploma\StoreDiploma;
use App\Http\Requests\Admin\Diploma\UpdateDiploma;
use App\Models\Diploma;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DiplomasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDiploma $request
     * @return array|Factory|View
     */
    public function index(IndexDiploma $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Diploma::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'number', 'url'],

            // set columns to searchIn
            ['id', 'number', 'url']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.diploma.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.diploma.create');

        return view('admin.diploma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiploma $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDiploma $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Diploma
        $diploma = Diploma::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/diplomas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/diplomas');
    }

    /**
     * Display the specified resource.
     *
     * @param Diploma $diploma
     * @throws AuthorizationException
     * @return void
     */
    public function show(Diploma $diploma)
    {
        $this->authorize('admin.diploma.show', $diploma);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Diploma $diploma
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Diploma $diploma)
    {
        $this->authorize('admin.diploma.edit', $diploma);


        return view('admin.diploma.edit', [
            'diploma' => $diploma,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiploma $request
     * @param Diploma $diploma
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDiploma $request, Diploma $diploma)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Diploma
        $diploma->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/diplomas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/diplomas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDiploma $request
     * @param Diploma $diploma
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDiploma $request, Diploma $diploma)
    {
        $diploma->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDiploma $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDiploma $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Diploma::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
