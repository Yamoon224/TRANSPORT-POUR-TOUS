<x-home-layout>
<section id="wallet-screen">
    <div class="container">
        <div class="wallet-screen-wrap">
            <div class="wallet-first mt-24">
                <div class="wallet-first-content">
                    <div class="Wallet">
                        <h1 class="wallet-title">@lang('locale.wallet', ['prefix'=>__('locale.my'), 'suffix'=>''])</h1>
                    </div>
                    <div class="wallet-price">
                        <p class="wallet-price1">{{ moneyformat(auth()->user()->balance, auth()->user()->country->currency) }}</p>
                    </div>
                </div>
                <p class="wallet-txt2 mt-3">
                    @if(auth()->user()->balance <= 500)
                    <span class="text-danger">@lang('locale.not_enough_fund')</span>
                    @else
                    <form class="forget-password-screen-form mt-4" method="POST" action="{{ route('withdraws.store') }}">
                        @csrf
                        <input type='hidden' name='phone' value='{{ auth()->user()->phone }}' />
                        <div class="row my-2">
                            <div class="col-md-12 text-center" id="notify"></div>
                            <div class="text-center text-danger">{{ !empty($errors->get('message')) ? $errors->get('message')[0] : '' }}</div>
                            <div class="col-md-4 mt-1">
                                <select placeholder="@lang('locale.method', ['suffix'=>''])" name="method" class="form-control required" required />
                                    <option value="cinetpay">CINETPAY</option>
                                    <option value="flutterwave">FLUTTERWAVE</option>
                                </select>
                            </div>
                            <div class="col-md-8 mt-1" id="country-banks"></div>
                        </div>
                        <div class="form-details-sign-in my-1">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    <g id="SVGRepo_iconCarrier"> <path d="M31,7H1A1,1,0,0,0,0,8V24a1,1,0,0,0,1,1H31a1,1,0,0,0,1-1V8A1,1,0,0,0,31,7ZM25.09,23H6.91A6,6,0,0,0,2,18.09V13.91A6,6,0,0,0,6.91,9H25.09A6,6,0,0,0,30,13.91v4.18A6,6,0,0,0,25.09,23ZM30,11.86A4,4,0,0,1,27.14,9H30ZM4.86,9A4,4,0,0,1,2,11.86V9ZM2,20.14A4,4,0,0,1,4.86,23H2ZM27.14,23A4,4,0,0,1,30,20.14V23Z"/> <path d="M7.51.71a1,1,0,0,0-.76-.1,1,1,0,0,0-.61.46l-2,3.43a1,1,0,0,0,1.74,1L7.38,2.94l5.07,2.93a1,1,0,0,0,1-1.74Z"/> <path d="M24.49,31.29a1,1,0,0,0,.5.14.78.78,0,0,0,.26,0,1,1,0,0,0,.61-.46l2-3.43a1,1,0,1,0-1.74-1l-1.48,2.56-5.07-2.93a1,1,0,0,0-1,1.74Z"/> <path d="M16,10a6,6,0,1,0,6,6A6,6,0,0,0,16,10Zm0,10a4,4,0,1,1,4-4A4,4,0,0,1,16,20Z"/> </g>
                                </svg>
                            </span>
                            <input type="number" id="amount" placeholder="@lang('locale.amount', ['suffix'=>''])" name="amount" min="500" max="{{ auth()->user()->balance }}" class="sign-in-custom-input required" required />
                        </div>
                        <div class="row">
                            <div class="col-md-6 my-1">
                                <div class="form-details-sign-in">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z" fill="#1C274C"/> <path d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z" fill="#1C274C"/> <path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="#1C274C"/> <path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" fill="#1C274C"/> <path d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.4453 2.75 16.5018 4.42242 17.0846 6.68694C17.1879 7.08808 17.5968 7.32957 17.9979 7.22633C18.3991 7.12308 18.6405 6.7142 18.5373 6.31306C17.788 3.4019 15.1463 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z" fill="#1C274C"/> </g>
                                        </svg>
                                    </span>
                                    <input type="password" id="withdraw_password" placeholder="@lang('locale.withdraw_password')" name="withdraw_password" class="sign-in-custom-input required" required />
                                </div>
                            </div>
                                
                            <div class="col-md-6 my-1">
                                <div class="form-details-sign-in">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"/> </g> <g id="Layer_7" data-name="Layer 7"> <path d="M39,18H35V13A11,11,0,0,0,24,2H22A11,11,0,0,0,11,13v5H7a2,2,0,0,0-2,2V44a2,2,0,0,0,2,2H39a2,2,0,0,0,2-2V20A2,2,0,0,0,39,18ZM15,13a7,7,0,0,1,7-7h2a7,7,0,0,1,7,7v5H15ZM14,35a3,3,0,1,1,3-3A2.9,2.9,0,0,1,14,35Zm9,0a3,3,0,1,1,3-3A2.9,2.9,0,0,1,23,35Zm9,0a3,3,0,1,1,3-3A2.9,2.9,0,0,1,32,35Z"/> </g> </g> </g>
                                        </svg>
                                    </span>
                                    <input type="text" id="confirmation_code" placeholder="@lang('locale.confirmation_code')" name="confirmation_code" class="sign-in-custom-input" required />
                                </div>
                            </div>
                        </div>
                        
                        <div class="feedback-submit">
                            <div class="row">
                                <div class="col-md-6 my-1">
                                    <button type='button' class="btn btn-warning" id="btn-send-mail">
                                        @lang('locale.send_mail')
                                    </button>
                                </div>
                                <div class="col-md-6 my-1">
                                    <button class="btn btn-success" id="submit-btn">@lang('locale.withdraw', ['suffix'=>''])</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </p>
            </div>
        </div>

        <div class="ongoing-section-wrap mt-2">
            <ul class="nav nav-pills ongoing-courses-tab" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="win-tab" data-bs-toggle="pill" data-bs-target="#win" type="button" role="tab" aria-controls="win" aria-selected="true">@lang('locale.my') @lang('locale.win', ['suffix'=>'s'])</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="withdraw-tab" data-bs-toggle="pill" data-bs-target="#withdraw" type="button" role="tab" aria-controls="withdraw" aria-selected="false">@lang('locale.my') @lang('locale.withdraw', ['suffix'=>'s'])</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="win" role="tabpanel" aria-labelledby="win-tab" tabindex="0">
                    <div class="ongoing-section-details">
                        @foreach (auth()->user()->wins as $item)
                        <div class="ongoing-section-details-wrap category-redirect my-4">
                            <div class="ongoing-first">
                                <img src="{{ asset(ispublicpath() .'/images/icons/win.webp') }}" alt="LOGO" style="height: 40px; width: 40px">
                            </div>
                            <div class="ongoing-second">
                                <div class="ongoing-second-wrap">
                                    <div class="ongoing-details">
                                        <h2 class="ongoing-txt1">{{ moneyformat($item->amount, auth()->user()->country->currency) }} | {{ $item->description }}</h2>
                                        <div>
                                            <span class="ongoing-img"><img src="{{ asset(ispublicpath() .'/images/checkout-screen/time-icon.svg') }}" alt="Icon" ></span>
                                            <span class="ongoing-txt2">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab" tabindex="0">
                    <div class="Completed-section-details">
                        @foreach (auth()->user()->withdraws as $item)
                        <div class="ongoing-section-details-wrap complete-course mt-4">
                            <div class="ongoing-first">
                                <img src="{{ asset(ispublicpath() .'/images/icons/withdraw.webp') }}" alt="LOGO" style="height: 40px; width: 40px">
                            </div>
                            <div class="ongoing-second">
                                <div class="ongoing-second-wrap">
                                    <div class="ongoing-details">
                                        <h2 class="ongoing-txt1">{{ moneyformat($item->amount, auth()->user()->country->currency) }} | {{ $item->reference .' | '. $item->confirmation_code }}</h2>
                                        <div>
                                            <span class="ongoing-img"><img src="{{ asset(ispublicpath() .'/images/checkout-screen/time-icon.svg') }}" alt="time-icon" ></span>
                                            <span class="ongoing-txt2">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    var isEmptyRequiredField = (fields) => {
        isEmpty = 0;
        fields.each(function() {
            if ($(this).val().trim() === '') 
                isEmpty++; 
        });

        return isEmpty == 0 ? true : false;
    }
    
    
    $('[name="method"]').on('change', function() {
        $('#country-banks').html('');
        
        if($(this).children('option:selected').val() == 'flutterwave') {
            $('#country-banks').load("{{ route('countries.banks') }}", {'_token':$('meta[name="csrf-token"]').prop('content'), '_method':"GET"})
        }
    });
    
    $('#btn-send-mail').on('click', function () {
        if(isEmptyRequiredField($('.required'))) {
            $('#notify').load("{{ route('sendmail') }}", {'_token':$('meta[name="csrf-token"]').prop('content')}).addClass('text-success');
        } else {
            $('#notify').html('<p class="text-danger text-center text-sm" style="font-style: italic">Vous devez remplir les champs obligatoires avant d\'envoyer le code</p>');
        }
    })
</script>
@endpush
</x-home-layout>
