<?php

namespace App\Http\Controllers;

use App\Models\Win;
use App\Models\User;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        $services = Service::orderBy('name')->get();
        return view('welcome', compact('services'));
    }

    public function home() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        $services = Service::all();
        return view('home', compact('services'));
    }

    public function wallet() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        return view('wallet');
    }

    public function children() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        return view('children');
    }

    public function language() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        return view('language');
    }

    public function chats() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        $countries = Country::orderBy('name')->get();
        return view('chats', compact('countries'));
    }

    public function layout() 
    {
        app()->setLocale(session('locale') ?? app()->getLocale());
        // dd(request()->server('SERVER_ADDR'));
        return view('layouts.template');
    }

    public function dashboard() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());

        $wins = Win::all();
        $withdraws = Withdraw::all();
        $payments = Payment::all();
        $users = User::all();
        $services = Service::orderBy('name')->get();
        
        return view('admin.dashboard', compact('payments', 'users', 'wins', 'withdraws', 'services'));
    }

    public function aboutus() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('aboutus');
    }

    public function faqs() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('faqs');
    }

    public function privacy() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('privacy');
    }

    public function feedback() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('feedback');
    }

    public function network() 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('admin.network');
    }
    
    public function success(string $message) 
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        return view('success', compact('message'));
    }

    public function setLang($locale) 
    {
        if (auth()->check()) {
            auth()->user()->update(compact('locale'));
            
            if (auth()->user()->is_admin) 
                return back();
        } 

        session()->put('locale', $locale);
        app()->setLocale($locale);

        return redirect()->back();
    }
}
