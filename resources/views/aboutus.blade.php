<x-home-layout>
<section id="about-us-section">
    <div class="container">
        <div class="about-us-section-wrap mt-32">
            <h1 class="d-none">@lang('locale.about_us')</h1>
            <h2 class="d-none">Hidden</h2>
            <div class="about-us-screen-full">
                <div class="privacy-first-content">
                    <p class="privacy-txt2" style="text-align: justify">@lang('locale.about_solution')</p>
                </div>
            </div>
            <div class="about-us-social-media mt-32">
                <div class="about-us-icon-wrapper">
                    <div class="social-detail-about ">
                        <div class="shape facebook-bg">
                            <a href="https://www.facebook.com/" target="_blank" >
                                <img src="{{ asset(ispublicpath() .'images/about-us/facebook.svg') }}" alt="facebook">
                            </a>
                        </div>
                        <div>
                            <p class="about-social-txt">Facebbok</p>
                        </div>
                    </div>
                    <div class="social-detail-about ">
                        <div class="shape instragram-bg">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{ asset(ispublicpath() .'images/about-us/instagram.svg') }}" alt="instagram">
                            </a>
                        </div>
                        <div>
                            <p class="about-social-txt">Instagram</p>
                        </div>
                    </div>
                    <div class="social-detail-about ">
                        <div class="shape twitter-bg">
                            <a href="https://twitter.com/" target="_blank" >
                                <img src="{{ asset(ispublicpath() .'images/about-us/twitter.svg') }}" alt="twitter">
                            </a>
                        </div>
                        <div>
                            <p class="about-social-txt">Twitter</p>
                        </div>
                    </div>
                    <div class="social-detail-about ">
                        <div class="shape youtube-bg">
                            <a href="https://www.youtube.com/" target="_blank" >
                                <img src="{{ asset(ispublicpath() .'images/about-us/youtube.svg') }}" alt="youtube">
                            </a>
                        </div>
                        <div>
                            <p class="about-social-txt">YouTube</p>
                        </div>
                    </div>
                </div>
            </div>			
        </div>
    </div>
</section>
</x-home-layout>
