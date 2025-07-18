<header id="navbar">
    <div id="navbar-container" class="boxed">
        @auth
            @if(!request()->routeIs('register.link'))
            <div class="navbar-header">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <img src="{{ asset(ispublicpath() .'logo/solutionb.webp') }}" alt="LOGO" class="brand-icon" height="52" width="52">
                    <div class="brand-title">
                        <span class="brand-text text-uppercase">@lang('locale.administration')</span>
                    </div>
                </a>
            </div>
            @endif
        @endauth        
    
        <div class="navbar-content">
            @auth
                @if(!request()->routeIs('register.link'))
                <ul class="nav navbar-top-links">
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="demo-pli-list-view"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links">       
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                            <span class="ic-user pull-right">
                                <i class="demo-pli-male"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                            <ul class="head-list">
                                @if(auth()->id() == 1)
                                <li class="navlink"><a href="{{ route('profile') }}"><i class="demo-pli-male icon-lg icon-fw"></i> @lang('locale.profile')</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}"><i class="demo-pli-unlock icon-lg icon-fw"></i> @lang('locale.logout')</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @endif
            @endauth   
        </div>   
    </div>
</header>