<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        
        $countries = Country::all();
        $qrcode = Qrcode::size(80)
                ->generate(route('register.link', auth()->user()->code));
        return view((auth()->user()->is_admin ? 'admin.profile' : 'profile'), compact(auth()->user()->is_admin ? 'countries' : 'qrcode'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        auth()->user()->update($data);

        return response()->json(['successfull']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('welcome');
    }
}
