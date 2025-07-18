<x-app-layout>
<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-body text-center">
                <a>
                    <img alt="Profile Picture" class="img-lg img-circle mar-btm" src="{{ asset(ispublicpath() .'logo/transportpourtous.webp') }}" height="30" width="30">
                </a>
                <div class="mar-top">
                    <a class="navlink btn btn-mint" href="{{ route('login') }}">@lang('locale.sign_in')</a>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title text-center text-uppercase">
                    @lang('locale.service', ['suffix'=>'s', 'prefix'=>__('locale.all')])
                </h3>
            </div>
            <div class="pad-all">
                <div id="demo-gallery-3" style="display:none;">
                    @foreach ($services as $item)
                    <a href="#">
                        <img alt="{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}" src="{{ asset(ispublicpath() . $item->image) }}" data-image="{{ asset(ispublicpath() . $item->slider) }}" data-description="{{ app()->getLocale() == 'en' ? $item->description : $item->details }}" style="display:none">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset(ispublicpath() .'plugins/unitegallery/js/unitegallery.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/unitegallery/themes/slider/ug-theme-slider.js') }}"></script>
<script>
    $(document).on('nifty.ready', $("#demo-gallery-3").unitegallery({
        slider_enable_text_panel: true,
        slider_enable_bullets: false
    }));
</script>
@endpush
</x-app-layout>
