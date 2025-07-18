<?php

namespace App\Http\Controllers;


class CountryController extends Controller
{
    public function banks()
    {
        $banks = flutterwavebanks(auth()->user()->country->two);
        return view('banks', compact('banks'));
    }
    
}
