<x-home-layout>
<section id="faq-sec">
    <div class="container">
        <div class="faq-full-sec mt-32">
            <h1 class="d-none">@lang('locale.faqs')</h1>
            <h2 class="d-none">Hidden</h2>
            <div class='nested-accordion'>
                <h3 class="boder-top">@lang('locale.question1')</h3>
                <div class='comment'>@lang('locale.answer1')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question2')</h3>
                <div class='comment'>@lang('locale.answer2')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question3')</h3>
                <div class='comment'>@lang('locale.answer3')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question4')</h3>
                <div class='comment'>@lang('locale.answer4')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question5')</h3>
                <div class='comment'>@lang('locale.answer5')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question6')</h3>
                <div class='comment'>@lang('locale.answer6')</div>
            </div>
            <div class='nested-accordion mt-24'>
                <h3 class="boder-top">@lang('locale.question7')</h3>
                <div class='comment'>@lang('locale.answer7')</div>
            </div>
        </div>		
    </div>
</section>
@push('scripts')
<script src="{{ asset(ispublicpath() .'js/custom.home.js') }}"></script>
@endpush
</x-home-layout>
