<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GetDiplomaRequest;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function getDiploma(GetDiplomaRequest $request)
    {
        dd($request);
        $diplom = Diploma::where('number', $request->get('number'))->first();

        if($diplom && $diplom->url){
            if ($request->ajax()) {
                return [
                    'url' => $diplom->url
                ];
            }
        }

        return redirect()->back()->with(['error' => 'Bunday raqamli diplom bazada topilmadi!']);
    }

}
