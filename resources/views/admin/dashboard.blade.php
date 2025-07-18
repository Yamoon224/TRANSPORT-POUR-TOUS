<x-app-layout>
<div class="row">
    <div class="col-lg-7">
        <div id="demo-panel-network" class="panel">
            <div class="panel-heading pad-all">
                <h1 class="panel-title text-lg text-semibold text-center" id="typed"></h1>
            </div>
            <div class="pad-all">
                <div id="demo-gallery-3" style="display:none;">
                    @foreach($services as $item)
                    <a href="#">
                        <img alt="{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}" src="{{ asset(ispublicpath() . $item->image) }}" data-image="{{ asset(ispublicpath() . $item->slider) }}" data-description="{{ app()->getLocale() == 'en' ? $item->description : $item->details }}" style="display:none">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row">         
            <div class="col-sm-12 col-lg-6">
                <div class="panel media middle pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="demo-pli-male icon-2x"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <p class="text-1x mar-no text-semibold text-main">{{ $withdraws->count() }}</p>
                        <p class="text-muted mar-no">@lang('locale.withdraw', ['suffix'=>'s']) : {{ moneyFormat($withdraws->sum('amount')) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="panel media middle pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="demo-pli-wallet-2 icon-2x"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <p class="text-1x mar-no text-semibold text-main">{{ moneyFormat(auth()->user()->balance) }}</p>
                        <p class="text-muted mar-no">@lang('locale.balance')</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6">
                <div class="panel media middle pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="demo-pli-male icon-2x"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <p class="text-1x mar-no text-semibold text-main">{{ $wins->count() }}</p>
                        <p class="text-muted mar-no">@lang('locale.win', ['suffix'=>'s']) : {{ moneyFormat($wins->sum('amount')) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="panel media middle">
                    <div class="media-left bg-mint pad-all">
                        <i class="demo-psi-wallet-2 icon-3x"></i>
                    </div>
                    <div class="media-body pad-all">
                        <p class="text-2x mar-no text-semibold text-main">{{ $payments->count() }}</p>
                        <p class="text-muted mar-no">@lang('locale.payment', ['suffix'=>'s']) : {{ moneyFormat($payments->sum('amount')) }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="panel panel-mint">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#demo-acc-purple" data-toggle="collapse" href="#demo-acd-purple-1">@lang('locale.buying_activation_code')</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="demo-acd-purple-1">
                        <div class="panel-body list-group">
                            <a class="list-group-item  list-item-sm" href="#">*126*14*675279057*25000# (MTN) réf : 1</a>
                            <a class="list-group-item list-item-sm" href="#">#150*14*556999*698137482*25000# (Orange)</a>
                            <a class="list-group-item list-item-sm" href="#">USDT(TRC20) 40$ TQ1RDVtnBoGUsSZUvf1ay93wWJvxnbc6Ax</a>
                            <a class="list-group-item list-item-sm" href="#">USDT(BEP20) 40$ <P class="text-sm">0x3756fee55aeb22037698f7a15117467092622a7a</P></a>
                            <a class="list-group-item list-item-sm" href="#">USDL en cours...</a>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset(ispublicpath() .'plugins/flot-charts/jquery.flot.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/flot-charts/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

<script src="{{ asset(ispublicpath() .'plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>

<script src="{{ asset(ispublicpath() .'js/demo/dashboard.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/unitegallery/js/unitegallery.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/unitegallery/themes/slider/ug-theme-slider.js') }}"></script>
<script>
    $("#demo-gallery-3").unitegallery({
        slider_enable_text_panel: true,
        slider_enable_bullets: false
    });
    var typed = new Typed('#typed', {
        strings: ["{{ config('app.name', 'TRANSPORT POUR TOUS') }}", "{{ env('APP_SECOND_NAME') }}"],
        typeSpeed: 100,
        fadeOut: true,
        showCursor: false,
        loop: true,
    });
</script>
@endpush
</x-app-layout>