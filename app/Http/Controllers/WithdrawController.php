<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Withdraw;
use App\Models\WithdrawCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ConfirmationCodeTrait;
use App\Notifications\WithdrawalConfirmationNotification;

class WithdrawController extends Controller
{
    use ConfirmationCodeTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        app()->setLocale(auth()->user()->locale ?? app()->getLocale());
        $withdraws = Withdraw::all();
        $methods = Method::all();

        return view('admin.withdraws', compact('withdraws', 'methods'));
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
        $data = $request->except(['_token', 'withdraw_password', 'phone']);
        $data['user_id'] = auth()->id();
        
        if(empty(WithdrawCode::firstWhere(['withdraw_code' => $data['confirmation_code'], 'user_id' => $data['user_id'], 'status'=>'available'])))
            return back()->withErrors(['message'=>__('locale.incorrect_confirmation_code')]);

        if(auth()->user()->withdraw_password != $request->withdraw_password)
            return back()->withErrors(['message'=>__('locale.incorrect_withdraw_password')]);
            
        $data['levied_amount'] = $data['amount'] + $data['amount']*config('app.withdraw_fee')*0.01;
        if(auth()->user()->balance < $data['levied_amount'])
            return back()->withErrors(['message'=>__('locale.not_enough_fund')]);
            
        $data['order_id'] = Str::uuid()->toString(20);
        $method = $data['method'] . "transfer";
        $response = $method($data);
        
        if($response['code'] == 0) {
            unset($data['bank']);
            $data['status'] = 'paid';
            DB::beginTransaction();
                $withdraw = Withdraw::create($data);
                WithdrawCode::firstWhere('withdraw_code', $data['confirmation_code'])->update(['status'=>'used']);
                auth()->user()->update(['balance' => auth()->user()->balance - $data['levied_amount']]);
            DB::commit(); 
            
            return redirect()->route('success', __('locale.withdraw_done'));
        }
            
        return back()->withErrors($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $withdraw = Withdraw::firstWhere(['order_id'=>$id]);
        $withdraw->update(['status'=>'paid']);
        return view('withdraw');
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
        $withdraw = Withdraw::find($id);

        $withdraw->update(['status'=>'paid']);
        return response()->json(['successfull']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendmail(Request $request) 
    {
        $data = $request->except('_token');
        $data['withdraw_code'] = $this->generateConfirmationCode();
        $data['user_id'] = auth()->id();
        WithdrawCode::create($data);

        auth()->user()->notify(new WithdrawalConfirmationNotification($data['withdraw_code']));

        return view('alert', ['title'=>__('locale.withdraw', ['suffix'=>'']), 'message'=>__('locale.code_confirmation_message')]);
    }
}
