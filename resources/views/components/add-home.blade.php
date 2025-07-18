<div class="offcanvas offcanvas-bottom addtohome-popup theme-offcanvas" tabindex="-1" id="offcanvas" aria-modal="true" role="dialog">
    <button type="button" class="btn-close text-reset popup-close-home" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body small">
        <img src="{{ asset(ispublicpath() .'logo/solutionb.webp') }}" alt="LOGO" class="logo-popup" width="100" height="100">
        <p class="title font-w600">{{ env('APP_SECOND_NAME') }}</p>
        <p class="install-txt">@lang('locale.install') {{ env('APP_SECOND_NAME') }} - Online Learning & Educational Courses PWA to your home screen for easy access, just like any other app</p>
        <a href="javascript:void(0)" class="theme-btn install-app btn-inline addhome-btn" id="installApp">@lang('locale.add_to_homescreen')</a>
    </div>
</div>