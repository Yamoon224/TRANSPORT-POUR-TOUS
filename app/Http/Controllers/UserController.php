<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());

        $users = User::orderByDesc('id')->get();
        return view('admin.users', compact('users'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function selectAll()
    {
        $users = User::where('is_paid', 1)->get();
        foreach($users as $item) {
            balance($item);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except(['_token', '_method']);
        $user = User::find($id);
        if(empty($data['withdraw_password']))
            $data['withdraw_password'] = auth()->user()->withdraw_password;

        $user->update($data);
        return back()->with('status', __('locale.successful_update'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function enable(string $id)
    {
        $user = User::find($id);
        $user->update(['is_paid'=>1]);
        return redirect()->back();
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function remove(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(empty($user->email_verified_at))
            $user->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            
        balance($user);
        return redirect()->route('template');
    }
}
