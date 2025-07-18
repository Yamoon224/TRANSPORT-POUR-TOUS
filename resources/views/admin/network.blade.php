<x-app-layout>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <div class="panel-control">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tabs-box-1" data-toggle="tab">@lang('locale.level', ['suffix'=>auth()->user()->locale == 'fr' ? 'x' : 's'])</a></li>
                        <li><a href="#tabs-box-2" data-toggle="tab">@lang('locale.treeview')</a></li>
                    </ul>
                </div>
                <h3 class="panel-title">@lang('locale.network')</h3>
            </div>
            
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabs-box-1">                        
                        <div class="tab-base">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#lft-tab-1">@lang('locale.level', ['suffix'=>'']) 1</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-2">@lang('locale.level', ['suffix'=>'']) 2</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-3">@lang('locale.level', ['suffix'=>'']) 3</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-4">@lang('locale.level', ['suffix'=>'']) 4</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-5">@lang('locale.level', ['suffix'=>'']) 5</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-6">@lang('locale.level', ['suffix'=>'']) 6</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-7">@lang('locale.level', ['suffix'=>'']) 7</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-8">@lang('locale.level', ['suffix'=>'']) 8</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-9">@lang('locale.level', ['suffix'=>'']) 9</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-10">@lang('locale.level', ['suffix'=>'']) 10</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#lft-tab-11">@lang('locale.level', ['suffix'=>'']) 11</a>
                                </li>
                            </ul>
                        
                            <div class="tab-content">
                                <div id="lft-tab-1" class="tab-pane fade active in">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 1</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @php( $iterator = 1 )
                                            @foreach (auth()->user()->children() as $item)
                                            <div class="col-sm-4 col-md-4">
                                                <div class="panel pos-rel">
                                                    <div class="pad-all text-center">
                                                        @if ($item->children()->count() == 3)
                                                        <div class="widget-control">
                                                            <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                            </a>
                                                        </div>
                                                        @endif
                                                        <a href="#">
                                                            <img alt="{{ $item->firstname .' '. $item->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item->name) }}">
                                                            <p class="text-lg text-semibold mar-no text-main">{{ $item->firstname .' '. $item->name }}</p>
                                                            <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item->code }}</p>
                                                            <p class="text-sm">{{ $item->phone .' - '. $item->email }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>                                    
                                </div>

                                <div id="lft-tab-2" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 2</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                <div class="col-sm-4 col-md-3">
                                                    <div class="panel pos-rel">
                                                        <div class="pad-all text-center">
                                                            @if ($child->children()->count() == 3)
                                                            <div class="widget-control">
                                                                <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                    <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                </a>
                                                            </div>
                                                            @endif
                                                            <a href="#">
                                                                <img alt="{{ $child->firstname .' '. $child->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($child->name) }}">
                                                                <p class="text-lg text-semibold mar-no text-main">{{ $child->firstname .' '. $child->name }}</p>
                                                                <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $child->code }}</p>
                                                                <p class="text-sm">{{ $child->phone .' - '. $child->email }}</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>

                                <div id="lft-tab-3" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 3</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                    <div class="col-sm-4 col-md-3">
                                                        <div class="panel pos-rel">
                                                            <div class="pad-all text-center">
                                                                @if ($value->children()->count() == 3)
                                                                <div class="widget-control">
                                                                    <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                        <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                <a href="#">
                                                                    <img alt="{{ $value->firstname .' '. $value->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($value->name) }}">
                                                                    <p class="text-lg text-semibold mar-no text-main">{{ $value->firstname .' '. $value->name }}</p>
                                                                    <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $value->code }}</p>
                                                                    <p class="text-sm">{{ $value->phone .' - '. $value->email }}</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>

                                <div id="lft-tab-4" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 4</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                        <div class="col-sm-4 col-md-3">
                                                            <div class="panel pos-rel">
                                                                <div class="pad-all text-center">
                                                                    @if ($item1->children()->count() == 3)
                                                                    <div class="widget-control">
                                                                        <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                            <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                        </a>
                                                                    </div>
                                                                    @endif
                                                                    <a href="#">
                                                                        <img alt="{{ $item1->firstname .' '. $item1->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item1->name) }}">
                                                                        <p class="text-lg text-semibold mar-no text-main">{{ $item1->firstname .' '. $item1->name }}</p>
                                                                        <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item1->code }}</p>
                                                                        <p class="text-sm">{{ $item1->phone .' - '. $item1->email }}</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>

                                <div id="lft-tab-5" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 5</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                            <div class="col-sm-4 col-md-3">
                                                                <div class="panel pos-rel">
                                                                    <div class="pad-all text-center">
                                                                        @if ($item2->children()->count() == 3)
                                                                        <div class="widget-control">
                                                                            <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                        <a href="#">
                                                                            <img alt="{{ $item2->firstname .' '. $item2->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item2->name) }}">
                                                                            <p class="text-lg text-semibold mar-no text-main">{{ $item2->firstname .' '. $item2->name }}</p>
                                                                            <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item2->code }}</p>
                                                                            <p class="text-sm">{{ $item2->phone .' - '. $item2->email }}</p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>

                                <div id="lft-tab-6" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 6</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                <div class="col-sm-4 col-md-3">
                                                                    <div class="panel pos-rel">
                                                                        <div class="pad-all text-center">
                                                                            @if ($item3->children()->count() == 3)
                                                                            <div class="widget-control">
                                                                                <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                    <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                </a>
                                                                            </div>
                                                                            @endif
                                                                            <a href="#">
                                                                                <img alt="{{ $item3->firstname .' '. $item3->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item3->name) }}">
                                                                                <p class="text-lg text-semibold mar-no text-main">{{ $item3->firstname .' '. $item3->name }}</p>
                                                                                <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item3->code }}</p>
                                                                                <p class="text-sm">{{ $item3->phone .' - '. $item3->email }}</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                                <div id="lft-tab-7" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 7</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                    @foreach ($item3->children() as $item4)
                                                                    <div class="col-sm-4 col-md-3">
                                                                        <div class="panel pos-rel">
                                                                            <div class="pad-all text-center">
                                                                                @if ($item4->children()->count() == 3)
                                                                                <div class="widget-control">
                                                                                    <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                        <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                    </a>
                                                                                </div>
                                                                                @endif
                                                                                <a href="#">
                                                                                    <img alt="{{ $item4->firstname .' '. $item4->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item4->name) }}">
                                                                                    <p class="text-lg text-semibold mar-no text-main">{{ $item4->firstname .' '. $item4->name }}</p>
                                                                                    <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item4->code }}</p>
                                                                                    <p class="text-sm">{{ $item4->phone .' - '. $item4->email }}</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                                <div id="lft-tab-8" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 8</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                    @foreach ($item3->children() as $item4)
                                                                        @foreach ($item4->children() as $item5)
                                                                        <div class="col-sm-4 col-md-3">
                                                                            <div class="panel pos-rel">
                                                                                <div class="pad-all text-center">
                                                                                    @if ($item5->children()->count() == 3)
                                                                                    <div class="widget-control">
                                                                                        <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                            <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    @endif
                                                                                    <a href="#">
                                                                                        <img alt="{{ $item5->firstname .' '. $item5->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item5->name) }}">
                                                                                        <p class="text-lg text-semibold mar-no text-main">{{ $item5->firstname .' '. $item5->name }}</p>
                                                                                        <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item5->code }}</p>
                                                                                        <p class="text-sm">{{ $item5->phone .' - '. $item5->email }}</p>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                                <div id="lft-tab-9" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 9</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                    @foreach ($item3->children() as $item4)
                                                                        @foreach ($item4->children() as $item5)
                                                                            @foreach ($item5->children() as $item6)
                                                                            <div class="col-sm-4 col-md-3">
                                                                                <div class="panel pos-rel">
                                                                                    <div class="pad-all text-center">
                                                                                        @if ($item6->children()->count() == 3)
                                                                                        <div class="widget-control">
                                                                                            <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                                <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                            </a>
                                                                                        </div>
                                                                                        @endif
                                                                                        <a href="#">
                                                                                            <img alt="{{ $item6->firstname .' '. $item6->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item6->name) }}">
                                                                                            <p class="text-lg text-semibold mar-no text-main">{{ $item6->firstname .' '. $item6->name }}</p>
                                                                                            <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item6->code }}</p>
                                                                                            <p class="text-sm">{{ $item6->phone .' - '. $item6->email }}</p>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                                <div id="lft-tab-10" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 10</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                    @foreach ($item3->children() as $item4)
                                                                        @foreach ($item4->children() as $item5)
                                                                            @foreach ($item5->children() as $item6)
                                                                                @foreach ($item6->children() as $item7)
                                                                                <div class="col-sm-4 col-md-3">
                                                                                    <div class="panel pos-rel">
                                                                                        <div class="pad-all text-center">
                                                                                            @if ($item7->children()->count() == 3)
                                                                                            <div class="widget-control">
                                                                                                <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                                    <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                                </a>
                                                                                            </div>
                                                                                            @endif
                                                                                            <a href="#">
                                                                                                <img alt="{{ $item7->firstname .' '. $item7->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item7->name) }}">
                                                                                                <p class="text-lg text-semibold mar-no text-main">{{ $item7->firstname .' '. $item7->name }}</p>
                                                                                                <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item7->code }}</p>
                                                                                                <p class="text-sm">{{ $item7->phone .' - '. $item7->email }}</p>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>

                                <div id="lft-tab-11" class="tab-pane fade">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-panel="fullscreen">
                                                    <i class="icon-max demo-psi-maximize-3"></i>
                                                    <i class="icon-min demo-psi-minimize-3"></i>
                                                </button>
                                            </div>
                                            <h3 class="panel-title">@lang('locale.level', ['suffix'=>'']) 11</h3>
                                        </div>                                        
                                        <div class="panel-body bg-gray">
                                            @foreach (auth()->user()->children() as $item)
                                                @foreach ($item->children() as $child)
                                                    @foreach ($child->children() as $value)
                                                        @foreach ($value->children() as $item1)
                                                            @foreach ($item1->children() as $item2)
                                                                @foreach ($item2->children() as $item3)
                                                                    @foreach ($item3->children() as $item4)
                                                                        @foreach ($item4->children() as $item5)
                                                                            @foreach ($item5->children() as $item6)
                                                                                @foreach ($item6->children() as $item7)
                                                                                    @foreach ($item7->children() as $item8)
                                                                                    <div class="col-sm-4 col-md-3">
                                                                                        <div class="panel pos-rel">
                                                                                            <div class="pad-all text-center">
                                                                                                @if ($item8->children()->count() == 3)
                                                                                                <div class="widget-control">
                                                                                                    <a class="add-tooltip btn btn-trans" data-original-title="Favorite">
                                                                                                        <span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span>
                                                                                                    </a>
                                                                                                </div>
                                                                                                @endif
                                                                                                <a href="#">
                                                                                                    <img alt="{{ $item8->firstname .' '. $item8->name }}" class="img-lg img-circle mar-ver" src="{{ uiavatar($item8->name) }}">
                                                                                                    <p class="text-lg text-semibold mar-no text-main">{{ $item8->firstname .' '. $item8->name }}</p>
                                                                                                    <p class="text-sm">@lang('locale.order_id'): {{ $iterator++ }} | @lang('locale.code', ['suffix'=>'']) : {{ $item8->code }}</p>
                                                                                                    <p class="text-sm">{{ $item8->phone .' - '. $item8->email }}</p>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-box-2" style="overflow-x: scroll">
                        <figure>
                            <ul class="tree">
                                <li>
                                    <code>{{ auth()->user()->firstname.' '.auth()->user()->name }}</code>
                                    <ul>
                                        {{-- level 1 --}}
                                        @foreach (auth()->user()->children() as $item)
                                        <li>
                                            <code>{{ $item->name.' '.$item->firstname.' - '.$item->code  }}</code>
                                            <ul>
                                                {{-- level 2 --}}
                                                @foreach ($item->children() as $item1)
                                                <li>
                                                    <code>{{ $item1->name.' '.$item1->firstname.' - '.$item1->code  }}</code>
                                                    <ul>
                                                        {{-- level 3 --}}
                                                        @foreach ($item1->children() as $item2)
                                                            <li>
                                                                <code>{{ $item2->name.' '.$item2->firstname.' - '.$item2->code  }}</code>
                                                                <ul>
                                                                    {{-- level 4 --}}
                                                                    @foreach ($item2->children() as $item3)
                                                                    <li>
                                                                        <code>{{ $item3->name.' '.$item3->firstname.' - '.$item3->code  }}</code>
                                                                        <ul>
                                                                            {{-- level 3 --}}
                                                                            @foreach ($item3->children() as $item4)
                                                                                <li>
                                                                                    <code>{{ $item4->name.' '.$item4->firstname.' - '.$item4->code  }}</code>
                                                                                    <ul>
                                                                                        {{-- level 4 --}}
                                                                                        @foreach ($item4->children() as $item5)
                                                                                        <li>
                                                                                            <code>{{ $item5->name.' '.$item5->firstname.' - '.$item5->code  }}</code>
                                                                                            <ul>
                                                                                                {{-- level 5 --}}
                                                                                                @foreach ($item5->children() as $item6)
                                                                                                <li>
                                                                                                    <code>{{ $item6->name.' '.$item6->firstname.' - '.$item6->code  }}</code>
                                                                                                    <ul>
                                                                                                        {{-- level 6 --}}
                                                                                                        @foreach ($item6->children() as $item7)
                                                                                                        <li>
                                                                                                            <code>{{ $item7->name.' '.$item7->firstname.' - '.$item7->code  }}</code>
                                                                                                            <ul>
                                                                                                                {{-- level 7 --}}
                                                                                                                @foreach ($item7->children() as $item8)
                                                                                                                <li>
                                                                                                                    <code>{{ $item8->name.' '.$item8->firstname.' - '.$item8->code  }}</code>
                                                                                                                    <ul>
                                                                                                                        {{-- level 8 --}}
                                                                                                                        @foreach ($item8->children() as $item9)
                                                                                                                        <li>
                                                                                                                            <code>{{ $item9->name.' '.$item9->firstname.' - '.$item9->code  }}</code>
                                                                                                                            <ul>
                                                                                                                                {{-- level 9 --}}
                                                                                                                                @foreach ($item9->children() as $item10)
                                                                                                                                <li>
                                                                                                                                    <code>{{ $item10->name.' '.$item10->firstname.' - '.$item10->code  }}</code>
                                                                                                                                    <ul>
                                                                                                                                        {{-- level 10 --}}
                                                                                                                                        @foreach ($item10->children() as $item11)
                                                                                                                                        <li>
                                                                                                                                            <code>{{ $item11->name.' '.$item11->firstname.' - '.$item11->code  }}</code>
                                                                                                                                            <ul>
                                                                                                                                                {{-- level 11 --}}
                                                                                                                                                @foreach ($item11->children() as $item12)
                                                                                                                                                <li>
                                                                                                                                                    <code>{{ $item12->name.' '.$item12->firstname.' - '.$item12->code  }}</code>
                                                                                                                                                </li>
                                                                                                                                                @endforeach
                                                                                                                                            </ul>
                                                                                                                                        </li>
                                                                                                                                        @endforeach
                                                                                                                                    </ul>
                                                                                                                                </li>
                                                                                                                                @endforeach
                                                                                                                            </ul>
                                                                                                                        </li>
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                </li>
                                                                                                                @endforeach
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>                                        
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ asset('js/demo/ui-panels.js') }}"></script>
@endpush
</x-app-layout>
