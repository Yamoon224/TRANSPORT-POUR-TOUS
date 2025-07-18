<x-app-layout>
<div class="row">
    <div class="col-md-4 col-md-offset-4">            
        <div class="panel">
            <div id="mainnav-profile" class="mainnav-profile">
                <div class="profile-wrap text-center">
                    <a class="navlink pad-btm" href="{{ route('welcome') }}" title="@lang('locale.home_page')">
                        <img class="img-circle img-md" src="{{ asset(ispublicpath() .'/logo/transportpourtous.webp') }}" alt="LOGO">
                    </a>
                    <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                        <span class="mnp-desc"><i class="demo-pli-internet icon-lg icon-fw"></i> {{ ucfirst(app()->getLocale() == 'en' ? __('locale.english') : __('locale.french')) }}</span>
                    </a>
                </div>
                <div id="profile-nav" class="collapse list-group bg-trans text-center">
                    <a href="{{ route('locale', app()->getLocale() == 'fr' ? 'en' : 'fr') }}" id="locale-btn" class="list-group-item">
                        <i class="demo-pli-refresh icon-lg icon-fw"></i> {{ ucfirst(app()->getLocale() == 'fr' ? __('locale.english') : __('locale.french')) }}
                    </a>
                </div>
            </div>
            <div class="panel-heading">
                <div class="panel-control">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tabs2-box-1" data-toggle="tab">
                                <i class="demo-psi-unlock"></i> @lang('locale.sign_in')
                            </a>
                        </li>
                        <li>
                            <a href="#tabs2-box-3" data-toggle="tab">
                                @lang('locale.forgot_password')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="panel-body" id="register-done">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabs2-box-1">
                        <div class="text-center text-danger">{{ !empty($errors->get('email')) ? $errors->get('email')[0] : '' }}</div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <x-input-label>@lang('locale.username') @lang('locale.or') @lang('locale.mail_address')</x-input-label>
                                <x-text-input id="login-email" class="form-control" type="text" name="email" :value="old('email')" placeholder="{{ __('locale.username').' '.__('locale.or').' '.__('locale.mail_address') }}" required autofocus autocomplete="username" />
                            </div>
                            <div class="form-group">
                                <x-input-label>@lang('locale.password')</x-input-label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                    <x-text-input id="current-password" class="form-control" placeholder="{{ __('locale.password') }}" type="password" name="password" autocomplete='current-password' required/>
                                </div>
                            </div>
                            <div class="checkbox pad-btm text-left">
                                <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                                <label for="demo-form-checkbox">@lang('locale.remember_me')</label>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" id="auth-btn">@lang('locale.sign_in')</button>
                        </form>                                                
                    </div>
                    <div class="tab-pane fade" id="tabs2-box-3">
                        <div class="text-center text-danger">{{ !empty($errors->get('forgot')) ? $errors->get('forgot')[0] : '' }}</div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <x-input-label>@lang('locale.mail_address') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="forgot-email" class="form-control" type="email" name="email" :value="old('email')"  placeholder="{{ __('locale.mail_address') }}" required/>
                            </div>
                                        
                            <button class="btn btn-primary btn-lg btn-block">@lang('locale.send_link')</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pad-all">
                    <div class="media">
                        <a class="pull-right text-bold" href="{{ asset(ispublicpath() .'pdf/adhesion_documentation.pdf') }}">@lang('locale.adhesion_conditions')</a>
                        <div class="media-body text-left text-main">@lang('locale.read_our_adhesion_conditions')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<x-password-scripts></x-password-scripts>
@endpush
</x-app-layout>
