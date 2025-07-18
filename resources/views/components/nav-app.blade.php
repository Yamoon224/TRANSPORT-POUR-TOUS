<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{ uiavatar(auth()->user()->firstname.' '.auth()->user()->name) }}" alt="PROFILE PHOTO">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name">{{ auth()->user()->firstname.' '.auth()->user()->name }}</p>
                                <span class="mnp-desc">@lang('locale.'.(auth()->user()->locale == 'fr' ? 'french' : 'english'))</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="{{ route('locale', auth()->user()->locale == 'fr' ? 'en' : 'fr') }}" class="list-group-item">
                                <i class="demo-pli-internet icon-lg icon-fw"></i> @lang('locale.'.(auth()->user()->locale == 'en' ? 'french' : 'english'))
                            </a>
                        </div>
                    </div>
    
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
    
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-header">@lang('locale.nav')</li>
                        <li class="navlink {{ Route::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">@lang('locale.dashboard')</span>
                            </a>
                        </li>
                       
                       @if(auth()->id() == 1)
                        <li class="list-divider"></li>                    
                        <li class="list-header">@lang('locale.wallet', ['suffix'=>'s', 'prefix'=>__('locale.all')])</li>
                        <li class="navlink">
                            <a href="{{ route('withdraws.index') }}">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">@lang('locale.withdraw', ['suffix'=>'s'])</span>
                            </a>
                        </li>
                        <li class="navlink">
                            <a href="{{ route('wins.index') }}">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">@lang('locale.win', ['suffix'=>'s'])</span>
                            </a>
                        </li>
                        <li class="navlink">
                            <a href="{{ route('methods.index') }}">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">@lang('locale.method', ['suffix'=>'s'])</span>
                            </a>
                        </li>
                    
                        <li class="list-divider"></li>
                        <li class="list-header">@lang('locale.subscription')</li>        
                        <li class="navlink">
                            <a href="{{ route('network') }}">
                                <i class="demo-pli-computer-secure"></i>
                                <span class="menu-title">@lang('locale.network')</span>
                            </a>
                        </li>
                        @endif

                        <li class="list-divider"></li>
                        <li class="list-header">@lang('locale.administration')</li>                        
                        <li class="navlink">
                            <a href="{{ route('users.index') }}">
                                <i class="demo-pli-checked-user"></i>
                                <span class="menu-title">@lang('locale.user', ['suffix'=>'s'])</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
