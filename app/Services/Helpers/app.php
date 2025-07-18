<?php


    use App\Models\Win;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Http;
    use App\Notifications\RegisterConfirmPay;

    /**
     * @return string 
     */
    if (!function_exists('ispublicpath')) 
    {     
        function ispublicpath() 
        {
            return env('APP_ENV') == 'local' ? 'public/' : '';
        }
    }  
    
    /**m
     * @return string 
     */
    if (!function_exists('balance')) 
    {     
        function balance($user) 
        {
            $user->wins->each(fn($item) => $item->delete());
            
            $balance = 0;
            foreach($user->children() as $item) {
                $tax = changetax($item, $item->parent());
                $balance += $tax;
                Win::create(['amount' => $tax, 'user_id' => $user->id, 'level_id' => 1, 'description'=>"Gain Filleul Direct"]);
            }
            
            foreach($user->subchildren() as $item) {
                $tax = changetax($item, $item->parent());
                $balance += $tax;
                Win::create(['amount' => $tax, 'user_id' => $user->id, 'level_id' => 2, 'description'=>"Gain Filleul Indirect"]);
            }
            
            $balance -= $user->withdraws->where('status', 'paid')->sum('levied_amount');
            if($user->balance != $balance)
                $user->update(compact('balance'));
        }
    } 
    
    /**
     * @return string 
     */
    if (!function_exists('changetax')) 
    {     
        function changetax($child, $parent = NULL) 
        {
            $win = $child->country->price;
            $parentcurrency = strtolower(is_null($parent) ? $child->parent()->country->currency : $parent->country->currency);
            $childcurrency = strtolower($child->country->currency);
            if($childcurrency != $parentcurrency) {
                $win *= DB::table('change_currencies')->find(1)->$parentcurrency;
                $win /= DB::table('change_currencies')->find(1)->$childcurrency;
            }
                
            return $win*0.25;
        }
    } 

    /**
     * @return string : Profile PHOTO URL
     */
    if (!function_exists('uiavatar')) 
    {     
        function uiavatar($name = '') 
        {
            return 'https://ui-avatars.com/api/?name='. (empty($name) ? env('APP_NAME') : $name);
        }
    }  

    /**
     * compare deux dates fournies en paramètre, si date2 n'est pas renseignée, elle sera considéré comme la date actuelle
     * @param string $ip
     * @return array []
     */
    if (!function_exists('geoip')) 
    {     
        function geoip(string $ip) 
        {
            $geoip = Http::get('http://ip-api.com/json/' .$ip);
            return $geoip->json();
        }
    } 
    
    
    if (!function_exists("parentcode")) 
    {
        function parentcode($code = '85460164') 
        {
            $parent = User::firstWhere(compact('code'));
            return $parent->code;                 
        }
    }

    if (!function_exists("winbyaddchild")) 
    {
        function winbyaddchild($user, $level = 1) 
        {
            $parent = $user->parent();
            if (!is_null($parent) && $level <= 2) 
            {
                $parent->update(['balance'=>$parent->balance + $parent->country->price*0.25]);
                Win::create(['amount' => $parent->country->price*0.25, 'user_id' => $parent->id, 'level_id' => $level, 'description'=>"Gain Filleul ". ( $level == 1 ? 'Direct' : 'Indirect')]);
                $level++;

                if ($parent->parent()) 
                    winbyaddchild($parent, $level);
            }
            return true;
        }
    }

    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('moneyformat')) 
    {
        function moneyFormat(string $amount, string $currency = "XOF", string $sep = " ") 
        {
            $number = number_format($amount, 0, ',', $sep);
            return $number. " " .$currency;
        }   
    }


    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('bsend')) 
    {
        function bsend(User $user) 
        {
            $request = Http::post(env('BSEND_HOST'), [
                'public_key' => '',
                'cmd' => '',
                'amount' => $user->country->price,
                'payment_ref' => $user->payment_ref,
                'description' => "ADHESION PAYMENT TO TRANSPORT POUR TOUS",
                'currency' => $user->country->currency,
                'country' => $user->country->name,
                'country_ccode' => $user->country->two,
                'country_cdial' => $user->country->code,
                'firstname' => $user->firstname,
                'phone' => $user->phone,
                'email' => $user->email,
            ]);

            if ($request->ok()) 
                return $request->json();

            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('flutterwave')) 
    {
        function flutterwave(User $user) 
        {
            $request = Http::withHeaders(['Authorization'=>env('FLUTTERWAVE_AUTH')])
                ->post(env('FLUTTERWAVE_HOST') ."/payments", [
                    'amount' => $user->country->price,
                    'tx_ref' => $user->payment_ref,
                    'currency' => $user->country->currency,
                    'customer' => [
                        'email' => $user->email,
                        'phonenumber' => $user->phone,
                        'name' => $user->name
                    ],
                    'redirect_url' => route('notify.flutterwave', $user->payment_ref),
                    'customizations' => [
                        'title' => "ADHESION TO TRANSPORT POUR TOUS",
                        'logo' => "https://transportpourtous.org/logo/transportpourtous.webp"
                    ]
                ]);
            if ($request->ok()) 
                return ['payment_url'=>$request->json()['data']['link'], 'status' => 'success', 'message' => 'Hosted Link'];

            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('flutterwave_status')) 
    {
        function flutterwave_status(string $ref) 
        {
            $request = Http::withHeaders(['Authorization'=>env('FLUTTERWAVE_AUTH')])->get(env('FLUTTERWAVE_HOST') ."/transactions/verify_by_reference?tx_ref=". $ref);
            if ($request->ok()) 
                return $request->json()['data']['status'];

            return $request->body();
        }   
    }

    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpay')) 
    {
        function cinetpay(User $user) 
        {
            $request = Http::post(env('CINETPAY_HOST'), [
                'apikey' => env('CINETPAY_API_KEY'),
                'site_id' => env('CINETPAY_SITE_ID'),
                'amount' => $user->country->price,
                'transaction_id' => $user->payment_ref,
                'description' => "ADHESION PAYMENT TO TRANSPORT POUR TOUS",
                'currency' => $user->country->currency,
                'country' => $user->country->name,
                'customer_name' => $user->name,
                'customer_surname' => $user->firstname,
                'channels' => 'MOBILE_MONEY',
                'lang' => app()->getLocale(),
                'notify_url' => route('notify.cinetpay', $user->payment_ref),
                'return_url' => route('notify.cinetpay', $user->payment_ref),
            ]);

            if ($request->ok()) 
                return $request->json()['data'];

            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpay_status')) 
    {
        function cinetpay_status(string $ref) 
        {
            $request = Http::post(env('CINETPAY_HOST') ."/check", [
                'apikey' => env('CINETPAY_API_KEY'),
                'site_id' => env('CINETPAY_SITE_ID'),
                'transaction_id' => $ref
            ]);

            if ($request->ok()) 
                return $request->json()['data']['status'];

            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('makeconfirmpay')) 
    {
        function makeconfirmpay() 
        {
            $noconfirms = User::where(['is_paid'=>0])->get();
            
            foreach($noconfirms as $item) {
                $status = ($item->payment.'_status')($item->payment_ref);
                if($status == 'ACCEPTED' || $status == 'success') {
                    $item->update(['is_paid'=>1]);
                    winbyaddchild($item);
                    if($item->payment == 'cinetpay')
                        cinetpayaddcontact($item);
                        
                    $item->notify(new RegisterConfirmPay($item->code));
                } 
                
                // if(!in_array($status, ['ACCEPTED']) && $item->payment == 'cinetpay') 
                    // $item->delete();
                    
            }
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpaytoken')) 
    {
        function cinetpaytoken() 
        {
            $curl = curl_init();

            curl_setopt_array($curl, [
              CURLOPT_URL => "https://client.cinetpay.com/v1/auth/login",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"apikey\"\r\n\r\n525830545660d86055a73b1.49750985\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n19Malachie4@...\r\n-----011000010111000001101001--\r\n",
              CURLOPT_HTTPHEADER => [
                "content-type: multipart/form-data; boundary=---011000010111000001101001"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              return json_decode($response)->data->token;
            }
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpaybalance')) 
    {
        function cinetpaybalance() 
        {
            $request = Http::get(env('CINETPAY_BASE') .'/transfer/check/balance', [ 'token' => cinetpaytoken(), 'lang' => app()->getLocale() ]);
            
            if ($request->ok()) 
                return $request->json()['data']['available'];

            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('flutterwavebalance')) 
    {
        function flutterwavebalance() 
        {
            $request = Http::withHeaders(['Authorization'=>env('FLUTTERWAVE_AUTH')])
                ->get(env('FLUTTERWAVE_HOST') .'/balances/'.strtoupper(auth()->user()->country->currency));
            
            if ($request->ok()) 
                return $request->json()['data']['available_balance'];
    
            return $request->body();
        }   
    }
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpayaddcontact')) 
    {
        function cinetpayaddcontact($user) 
        {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => env('CINETPAY_BASE') .'/transfer/contact?token=' .cinetpaytoken(),
                CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST', CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_POSTFIELDS => ['data' => json_encode([
                    'prefix' => $user->country->code, 
                    'phone' => $user->phone,
                    'surname' => $user->firstname,
                    'name' => $user->name,
                    'email' => $user->email,
                ])]
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            return $err ?  $err : json_decode($response, true);
        }   
    }
    
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('cinetpaytransfer')) 
    {
        function cinetpaytransfer(array $data) 
        {   
            $balance = cinetpaybalance();
            if($balance >= $data['amount']) {
                
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => env('CINETPAY_BASE') .'/transfer/money/send/contact?token=' .cinetpaytoken(). '&lang=' .app()->getLocale(),
                    CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST', CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_POSTFIELDS => ['data' => json_encode([
                        'prefix' => auth()->user()->country->code, 
                        'phone' => auth()->user()->phone,
                        'amount' => $data['amount'],
                        'client_transaction_id' => $data['order_id'],
                        'notify_url' => route('withdraws.show', $data['order_id']),
                    ])]
                ]);
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                
                return $err ?  $err : json_decode($response, true);
            }
            
            return ['message'=>__('locale.not_enough_fund')];
        }   
    }
    
    
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('flutterwavetransfer')) 
    {
        function flutterwavetransfer(array $data) 
        {   
            $balance = flutterwavebalance();
            if($balance >= $data['amount']) {
                $request = Http::withHeaders(['Authorization'=>env('FLUTTERWAVE_AUTH')])
                    ->post(env('FLUTTERWAVE_HOST') .'/transfers', [
                        'account_bank' => $data['bank'],
                        'account_number' => auth()->user()->country->code . auth()->user()->phone,
                        'amount' => $data['amount'],
                        'narration' => __('locale.withdraw_with_flutterwave', ['amount'=>$data['amount'].' '.auth()->user()->country->currency, 'from'=>auth()->user()->name, 'to'=>auth()->user()->phone]),
                        'currency' => auth()->user()->country->currency,
                        'debit_currency' => auth()->user()->country->currency,
                        'reference' => $data['order_id'],
                        'beneficiary_name' => auth()->user()->firstname. " " .auth()->user()->name
                    ]);
                    
                $response = ['message'=>__('locale.not_enough_fund')];
                
                if ($request->ok()) {
                    $response = $request->json();
                    $response['code'] = 0;
                }
                
                return $response;
            }
        }   
    }
    
    
    /**
     * @param string $money : The amount to format
     * @param string $sep : The separator who need to replace
     * @param string $currency : The currency of the money
     * @return string : formatted money 
     */
    if (!function_exists('flutterwavebanks')) 
    {
        function flutterwavebanks(string $two) 
        {   
            $request = Http::withHeaders(['Authorization'=>env('FLUTTERWAVE_AUTH')])->get(env('FLUTTERWAVE_HOST') .'/banks/' .strtolower($two));
            if ($request->ok()) 
                return $request->json()['data'];
            
            return [];
        }   
    }


    

    