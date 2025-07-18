<x-home-layout>
<section id="chatscree2">
    <div class="container">
        <h1 class="d-none">Hidden</h1>
        <div class="chatscree2-wrap-sec">
            <div class="chatscree2-content my-4 chat-screen-redirect">
                <div class="chatscree2-wrap">
                    <div class="chat-img">
                        <div class="chat-img-sec">
                            <img src="{{ asset(ispublicpath() .'images/icons/whatsapp.webp') }}" alt="client-img" height="50" width="50">
                        </div>
                    </div>
                    <div class="chat-content">
                        <div class="chat-content-wrap">
                            <div class="chat-content-top">
                                <span class="chat-txt1">@lang('locale.whatsapp_support')</span>
                            </div>
                            <div class="chat-content-wrap-time mt-8">
                                <a href="https://wa.me/237675079938" title="@lang('locale.click_to_join_whatsapp_support')" class="chat-txt3">@lang('locale.click_to_join_whatsapp_support') 👍</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-border"></div>
            </div> 
            <div class="chatscree2-content my-4 chat-screen-redirect">
                <div class="chatscree2-wrap">
                    <div class="chat-img">
                        <div class="chat-img-sec">
                            <img src="{{ asset(ispublicpath() .'images/icons/telegram.webp') }}" alt="client-img" height="50" width="50">
                        </div>
                    </div>
                    <div class="chat-content">
                        <div class="chat-content-wrap">
                            <div class="chat-content-top">
                                <span class="chat-txt1">{{ app()->getLocale() == 'en' ? auth()->user()->country->name : auth()->user()->country->nom }}</span>
                            </div>
                            <div class="chat-content-wrap-time mt-8">
                                <a href="{{ auth()->user()->country->telegram }}" title="@lang('locale.click_to_join_whatsapp_support')" class="chat-txt3">@lang('locale.telegram_group') 👍</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-border"></div>
            </div> 
            <!--@foreach ($countries as $item)-->
            <!--<div class="chatscree2-content my-4 chat-screen-redirect">-->
            <!--    <div class="chatscree2-wrap">-->
            <!--        <div class="chat-img">-->
            <!--            <div class="chat-img-sec">-->
            <!--                <img src="{{ asset(ispublicpath() .'images/icons/telegram.webp') }}" alt="client-img" height="50" width="50">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="chat-content">-->
            <!--            <div class="chat-content-wrap">-->
            <!--                <div class="chat-content-top">-->
            <!--                    <span class="chat-txt1">{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}</span>-->
            <!--                </div>-->
            <!--                <div class="chat-content-wrap-time mt-8">-->
            <!--                    <a href="{{ $item->telegram }}" class="chat-txt3">@lang('locale.telegram_group') 👍</a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="chat-border"></div>-->
            <!--</div> -->
            <!--@endforeach-->
        </div>
    </div>
</section>
</x-home-layout>
