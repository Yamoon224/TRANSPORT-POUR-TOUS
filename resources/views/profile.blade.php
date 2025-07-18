<x-home-layout>
<section id="profile-screen">
    <div class="container">
        <div class="profile-screen-wrap mt-2">
            <div class="profile-first">
                <div class="profile-edit-img text-center">
                    <div class="mb-1" title="@lang('scan_qrcode', ['param'=>auth()->user()->firstname .' '. auth()->user()->name])">{{ $qrcode }}</div>
                    <p title="{{ route('register.link', auth()->user()->code) }}" class="text-sm text-success" id="subscription-link">@lang('locale.copied_subscription_link')</p>
                </div>
                <div class="profile-details mt-24 mb-1">
                    <h1>{{ auth()->user()->firstname .' '. auth()->user()->name }} <sub class="text-success">({{ auth()->user()->username }})</sub></h1>
                    <p>{{  auth()->user()->country->code . auth()->user()->phone .' | '. auth()->user()->email .' | '. auth()->user()->address }}</p>
                </div>
            </div>
            <div class="profile-second mt-2">
                <div class="boder-top-profile"></div>
                <div class="profile-second-wrap">
                    <div class="profile-follower">
                        <h2>{{ auth()->user()->children()->count() }}</h2>
                        <p>@lang('locale.direct_children')</p>
                    </div>
                    <div class="profile-following">
                        <h2>{{ auth()->user()->subchildren()->count() }}</h2>
                        <p>@lang('locale.indirect_children')</p>
                    </div>
                </div>
                <div class="boder-top-profile"></div>
                <div class='my-2'>
                    <form method="POST" action="{{ route('users.update', auth()->id()) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="text-center text-success">{{ !empty(session('status')) ? session('status') : '' }}</div>
                            <div class="col-md-6 col-sm-12 col-xs-12 my-1">
                                <div class="form-details-sign-in">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z" fill="#1C274C"/> <path d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z" fill="#1C274C"/> <path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="#1C274C"/> <path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" fill="#1C274C"/> <path d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.4453 2.75 16.5018 4.42242 17.0846 6.68694C17.1879 7.08808 17.5968 7.32957 17.9979 7.22633C18.3991 7.12308 18.6405 6.7142 18.5373 6.31306C17.788 3.4019 15.1463 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z" fill="#1C274C"/> </g>
                                        </svg>
                                    </span>
                                    <input type="password" id="withdraw_password" placeholder="@lang('locale.withdraw_password')" name="withdraw_password" class="sign-in-custom-input"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 my-1">
                                <div class="form-details-sign-in">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z" fill="#1C274C"/> <path d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z" fill="#1C274C"/> <path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="#1C274C"/> <path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" fill="#1C274C"/> <path d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.4453 2.75 16.5018 4.42242 17.0846 6.68694C17.1879 7.08808 17.5968 7.32957 17.9979 7.22633C18.3991 7.12308 18.6405 6.7142 18.5373 6.31306C17.788 3.4019 15.1463 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z" fill="#1C274C"/> </g>
                                        </svg>
                                    </span>
                                    <input type="tel" id="phone" placeholder="@lang('locale.phone')" name="phone" value="{{ auth()->user()->phone }}" class="sign-in-custom-input" required/>
                                </div>
                            </div>
                            <div class="col-12 my-1">
                                <div class="feedback-submit">
                                    <button class="btn btn-success btn-lg">@lang('locale.set')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $('#subscription-link').on('click', function() {
        var textarea = $('<textarea>').appendTo('body').val($(this).attr('title')).select();
        document.execCommand('copy');
        textarea.remove();
        alert('Lien copié avec succès !');
    })
</script>
<!-- <script src="{{ asset(ispublicpath() .'js/form.js') }}"></script> -->
@endpush
</x-home-layout>
