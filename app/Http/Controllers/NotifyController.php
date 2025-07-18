<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\RegisterConfirmPay;
use Illuminate\Support\Facades\Http;

class NotifyController extends Controller
{
    public function cinetpay(string $ref)
    {
        $user = User::firstWhere('payment_ref', $ref);
        $status = cinetpay_status($ref);
        if ($status == 'ACCEPTED') {
            $user->update(['is_paid' => 1]);
            winbyaddchild($user);
            cinetpayaddcontact($user);
            $user->notify(new RegisterConfirmPay($user->code));
        } 
        
        if($status == 'REFUSED') 
            $user->delete();
                    
        return redirect()->route('login');
    }
    
    public function flutterwave(string $ref)
    {
        $user = User::firstWhere('payment_ref', $ref);
        $status = flutterwave_status($ref);
        if ($status == 'success') {
            $user->update(['is_paid' => 1]);
            winbyaddchild($user);
            $user->notify(new RegisterConfirmPay($user->code));
        } 
        
        if($status == 'REFUSED') 
            $user->delete();
                    
        return redirect()->route('login');
    }
}
