<x-app-layout>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">            
            <div class="panel">
                <div id="mainnav-profile" class="mainnav-profile">
                    <div class="profile-wrap text-center">
                        <a class="navlink pad-btm" href="{{ route('welcome') }}" title="@lang('locale.home_page')">
                            <img class="img-circle img-md" src="{{ asset(ispublicpath() .'/logo/transportpourtous.webp') }}" alt="LOGO">
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="demo-cir-wz">
                        <div class="wz-heading pad-ver">
                            <div class="progress progress-xs progress-light-base">
                                <div class="progress-bar progress-bar-mint"></div>
                            </div>
                    
                            <ul class="wz-nav-off">
                                <li class="col-xs-3">
                                    <a data-toggle="tab" href="#demo-cir-tab1" title="@lang('locale.parent')" class="add-tooltip">
                                        <div class="icon-wrap icon-wrap-sm bg-mint">
                                            <i class="wz-icon demo-pli-checked-user icon-lg"></i>
                                            <i class="wz-icon-done demo-psi-checked-user icon-lg"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-xs-3">
                                    <a data-toggle="tab" href="#demo-cir-tab2" title="@lang('locale.personal_infos')" class="add-tooltip">
                                        <div class="icon-wrap icon-wrap-sm bg-mint">
                                            <i class="wz-icon demo-pli-information icon-lg"></i>
                                            <i class="wz-icon-done demo-psi-information icon-lg"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-xs-3">
                                    <a data-toggle="tab" href="#demo-cir-tab3" title="@lang('locale.auth_infos')" class="add-tooltip">
                                        <div class="icon-wrap icon-wrap-sm bg-mint">
                                            <i class="wz-icon demo-pli-lock-user icon-lg"></i>
                                            <i class="wz-icon-done demo-psi-lock-user icon-lg"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-xs-3">
                                    <a data-toggle="tab" href="#demo-cir-tab4" title="Finish" class="add-tooltip">
                                        <div class="icon-wrap icon-wrap-sm bg-mint">
                                            <i class="wz-icon demo-pli-credit-card-2 icon-lg"></i>
                                            <i class="wz-icon-done demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    
                        <form method="POST" class="form-horizontal" id="demo-bv-wz-form"  action="{{ route('register') }}">
                            @csrf
                            <div class="panel-body">
                                <p id="report-error" class="text-danger">
                                    <x-input-error :messages="$errors->get('username')" />
                                    <x-input-error :messages="$errors->get('email')" />
                                    <x-input-error :messages="$errors->get('password')" />
                                </p>
                                <div class="tab-content">
                                    <div id="demo-cir-tab1" class="tab-pane">
                                        <div class="panel panel-bordered-mint pos-rel">
                                            <div class="widget-control text-right">
                                                <div class="btn-group dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-right" style="">
                                                        <li><a href="tel:+{{ $parent->phone }}"><i class="icon-lg icon-fw demo-pli-old-telephone"></i> @lang('locale.call_him')</a></li>
                                                        <li><a href="mailto:{{ $parent->email }}"><i class="icon-lg icon-fw demo-pli-mail"></i> @lang('locale.email_him')</a></li>
                                                        <li><a href="{{ url()->current() }}"><i class="icon-lg icon-fw demo-pli-internet"></i> @lang('locale.link')</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="pad-all">
                                                <div class="media pad-ver">
                                                    <div class="media-left">
                                                        <a href="#" class="box-inline">
                                                            <img alt="PROFILE PHOTO" class="img-md img-circle" src="{{ uiavatar($parent->firstname. ' ' .$parent->name) }}">
                                                        </a>
                                                    </div>
                                                    <div class="media-body pad-top">
                                                        <a href="{{ url()->current() }}" class="box-inline">
                                                            <span class="text-lg text-semibold text-main">{{ $parent->firstname. ' ' .$parent->name }}</span>
                                                            <p class="text-sm">@lang('locale.parent') : {{ $parent->username }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-center pad-to">
                                                    <div class="btn-group">
                                                        <a href="tel:+{{ $parent->phone }}" class="btn btn-sm btn-default"><i class="demo-pli-old-telephone icon-lg icon-fw"></i> @lang('locale.call_him')</a>
                                                        <a href="mailto:{{ $parent->email }}" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> @lang('locale.email_him')</a>
                                                        <a href="{{ url()->current() }}" class="btn btn-sm btn-default"><i class="demo-pli-internet icon-lg icon-fw"></i> @lang('locale.link')</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox pad-btm text-left">
                                            <input id="accept-conditions" class="magic-checkbox" type="checkbox">
                                            <label for="accept-conditions">
                                            @lang('locale.accept') <a class="text-bold" href="{{ asset(ispublicpath() .'pdf/adhesion_documentation.pdf') }}">@lang('locale.using_conditions')</a>
                                            </label>
                                        </div>
                                        <x-text-input class="form-control" type="hidden" name="parent" :value="$parent->code" required/>
                                    </div>
                                
                                    <div id="demo-cir-tab2" class="tab-pane fade">
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.firstname') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="firstname" class="form-control" type="text" name="firstname"  placeholder="{{ __('locale.firstname') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.name') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="name" class="form-control" type="text" name="name"  placeholder="{{ __('locale.name') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.mail_address') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="register-email" class="form-control" type="email" name="email" :value="old('email')"  placeholder="{{ __('locale.mail_address') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.phone') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="phone" class="form-control" type="tel" name="phone" placeholder="{{ __('locale.phone') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.address') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="address" class="form-control" type="text" name="address" placeholder="{{ __('locale.address') }}" required/>
                                        </div> 
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.country') <span class="text-danger">*</span></x-input-label>
                                            <select id="country" class="form-control" name="country_id" required>
                                                <option value="">-- @lang('locale.select') --</option>
                                                @foreach ($countries as $item)
                                                <option value="{{ $item->id }}" title="{{ $item->price }}" itemid="{{ $item->currency }}">
                                                    {{ app()->getLocale() == 'en' ? $item->name : $item->nom }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                            
                                    <div id="demo-cir-tab3" class="tab-pane">      
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.username') <span class="text-danger">*</span></x-input-label>
                                            <x-text-input id="username" class="form-control" type="text" name="username" placeholder="{{ __('locale.username') }}" autocomplete='username' required/>
                                        </div>                                        
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.withdraw_password') <span class="text-danger">*</span></x-input-label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                                <x-text-input id="withdraw-password" class="form-control" placeholder="{{ __('locale.withdraw_password').' | Min : 8 '.__('locale.character', ['suffix'=>'s']) }}" type="password" name="withdraw_password" autocomplete='new-password' required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.password') <span class="text-danger">*</span></x-input-label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                                <x-text-input id="register-password" class="form-control" placeholder="{{ __('locale.password').' | Min : 8 '.__('locale.character', ['suffix'=>'s']) }}" type="password" name="password" autocomplete='new-password' required/>
                                            </div>
                                            <p class="text-muted" id="password-indicator">@lang('locale.password_indication')</p>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label>@lang('locale.password_confirmation') <span class="text-danger">*</span></x-input-label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                                <x-text-input id="password_confirmation" class="form-control" type="password"  placeholder="{{ __('locale.password_confirmation') }}" name="password_confirmation" autocomplete='new-password' required />
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div id="demo-cir-tab4" class="tab-pane">
                                        <div class="form-group">
                                            <p class="text-main text-bold">@lang('locale.amount', ['suffix'=>'']) : <span class="text-mint" id="amount"></span></p>
                                            <select class="selectpicker" data-live-search="true" data-width="100%" name="payment">
                                                <option value="flutterwave">Flutterwave</option>
                                                <option value="cinetpay">Cinetpay</option>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        
                            <div class="panel-footer text-right" id="navigate-btn">
                                <div class="box-inline">
                                    <button type="button" class="previous btn btn-danger">@lang('locale.previous')</button>
                                    <button type="button" class="next btn btn-mint">@lang('locale.next')</button>
                                    <button class="finish btn btn-mint" id="auth-btn" disabled>@lang('locale.finish')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <x-welcome-scripts></x-welcome-scripts>
    <x-password-scripts></x-password-scripts>
    @endpush
</x-app-layout>
