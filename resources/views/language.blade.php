<x-home-layout>
<section id="language-screen">
    <div class="container">
        <div class="language-screen-full">
            <h1 class="d-none">@lang('locale.switch_language')</h1>
            <div class="lang-list">
                <div class="form-check change-lan-sec language-sel">
                    <input class="form-check-input custom-input" name="locale" type="radio" id="english" value="en" {{ app()->getLocale() == 'en' ? 'checked' : '' }}>
                    <label class="form-check-label custom-lable" for="english">
                        <a href="{{ route('locale', 'en') }}" class="text-white">@lang('locale.english')</a>
                    </label>
                </div>
                <div class="form-check change-lan-sec">
                    <input class="form-check-input custom-input" name="locale" type="radio" id="french" value="fr" {{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
                    <label class="form-check-label custom-lable" for="french">
                        <a href="{{ route('locale', 'fr') }}" class="text-white">@lang('locale.french')</a>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>
</x-home-layout>
