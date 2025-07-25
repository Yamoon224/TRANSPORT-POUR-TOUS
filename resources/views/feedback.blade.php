<x-home-layout>
<section id="forget-password-screen-content">
    <div class="container">
        <h1 class="d-none">@lang('locale.send_feedback')</h1>
        <h2 class="d-none">Hidden</h2>
        <div class="forget-password-screen-wrap">
            <div class="forget-password-screen-top mt-32">
                <p class="title-sec" id="message-report">@lang('locale.do_you_get_feedback') ?</p>
            </div>
            <form class="forget-password-screen-form mt-24" method="POST" action="{{ route('feedbacks.store') }}">
                @csrf
                <div class="form-details-sign-in">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_231_1405" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_231_1405)">
                                <path d="M4 20H8L18.5 9.5C19.0304 8.96956 19.3284 8.25014 19.3284 7.5C19.3284 6.74985 19.0304 6.03043 18.5 5.5C17.9696 4.96956 17.2501 4.67157 16.5 4.67157C15.7499 4.67157 15.0304 4.96956 14.5 5.5L4 16V20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 6.5L17.5 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    </span>
                    <input type="text" id="message" placeholder="@lang('locale.write_your_feedback')" name="message" class="sign-in-custom-input" required />
                    <input type='hidden' name='user_id' value='{{ auth()->id() }}' />
                </div>
                <div class="feedback-submit mt-32">
                    <button>@lang('locale.submit')</button>
                </div>
            </form>
            
        </div>
    </div>
</section>
@push('scripts')
<script src="{{ asset(ispublicpath() .'js/form.js') }}"></script>
@endpush
</x-home-layout>
