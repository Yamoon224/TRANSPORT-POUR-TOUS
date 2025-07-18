
<x-app-layout>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">            
            <div class="panel">
                <div id="mainnav-profile" class="mainnav-profile">
                    <div class="profile-wrap text-center">
                        <div class="pad-btm">
                            <img class="img-circle img-md" src="{{ asset('public/logo/96.webp') }}" alt="LOGO">
                        </div>
                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                            <span class="mnp-desc"><i class="demo-pli-internet icon-lg icon-fw"></i> {{ ucfirst(app()->getLocale() == 'en' ? 'english' : 'french') }}</span>
                        </a>
                    </div>
                    <div id="profile-nav" class="collapse list-group bg-trans text-center">
                        <a href="{{ route('locale', app()->getLocale() == 'fr' ? 'en' : 'fr') }}" id="locale-btn" class="list-group-item">
                            @lang('locale.change_in') {{ ucfirst(app()->getLocale() == 'fr' ? 'english' : 'french') }}
                        </a>
                    </div>
                </div>
                
                <div class="panel-body">
                    <div id="report-error" class="text-center"></div>
                    <div class="tab-pane fade in active" id="tabs2-box-1">
                        <form method="POST" action="{{ route('password.store') }}">
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            @csrf
                            <div class="form-group">
                                <x-input-label>@lang('locale.mail_address')</x-input-label>
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="{{ __('locale.mail_address') }}" required autofocus autocomplete="email" />
                            </div>                                     
                            <div class="form-group">
                                <x-input-label>@lang('locale.password') <span class="text-danger">*</span></x-input-label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                    <x-text-input id="register-password" class="form-control" placeholder="{{ __('locale.password').' | Min : 8 '.__('locale.character', ['suffix'=>'s']) }}" type="password" name="password" autocomplete='new-password' required/>
                                </div>
                                <p class="text-muted" id="password-indicator">@lang('locale.password_indication')</p>
                            </div>
                            <div class="form-group">
                                <x-input-label>@lang('locale.password_confirmation') <span class="text-danger">*</span></x-input-label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                    <x-text-input id="confirm-password" class="form-control" placeholder="{{ __('locale.password_confirmation').' | Min : 8 '.__('locale.character', ['suffix'=>'s']) }}" type="password" name="password_confirmation" autocomplete='new-password' required/>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block">@lang('locale.reset')</button>
                        </form>                                                
                    </div>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
    <x-password-scripts></x-password-scripts>
</x-app-layout>

