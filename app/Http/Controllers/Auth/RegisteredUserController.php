<?php

namespace App\Http\Controllers\Auth;

use App\Models\Win;
use App\Models\User;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($code): View
    {
        $countries = Country::orderBy('name')->get();
        $parent = User::firstWhere(compact('code'));
        if(empty($parent))
            abort(404);
            
        return view('auth.register', compact('countries', 'parent'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'parent' => ['required', 'string', 'max:50'],
            'withdraw_password' => ['required', 'string',],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->except(['code', '_token', 'password_confirmation', 'code_id']);
        $data['password'] = Hash::make($request->password);
        $data['code'] = fake()->ean8();
        $data['payment_ref'] = Str::random(25);

        DB::beginTransaction();
            $user = User::create($data);
            $user->update(['currency'=>$user->country->currency]);
        DB::commit();

        return redirect()->away(($request->payment)($user)['payment_url']);
    }
}
