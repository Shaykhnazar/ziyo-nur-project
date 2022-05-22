<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetDiplomaRequest;
use App\Models\Diploma;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function getDiploma(GetDiplomaRequest $request)
    {
        $diploma = Diploma::where('number', $request->get('number'))->first();

        if($diploma && $diploma->url){
            return response()->json([
                'url' => $diploma->url
            ]);
        }

        return response()->json(['error' => 'Bunday raqamli diplom bazada topilmadi!']);
    }

}
