<x-app-layout>
<div class="panel">
    <div class="panel-body">
        <div class="fixed-fluid">
            <div class="fixed-md-300 pull-sm-left fixed-right-border">
                <div class="text-center">
                    <div class="pad-ver">
                        <img src="{{ uiavatar() }}" class="img-lg img-circle" alt="PHOTO">
                    </div>
                    <h4 class="text-lg text-overflow mar-no">{{ auth()->user()->firstname." ".auth()->user()->name }}</h4>
                    <p class="text-sm text-muted text-uppercase">{{ auth()->user()->gender }}</p>
                </div>
                <hr>
            
                <p class="pad-ver text-main text-sm text-uppercase text-bold">@lang('locale.about_me')</p>
                <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{ auth()->user()->address }}</p>
                <p><i class="demo-pli-mail icon-lg icon-fw"></i> {{ auth()->user()->email }}</p>
                <p><i class="demo-pli-smartphone-3 icon-lg icon-fw"></i> {{ auth()->user()->phone }}</p>
                <p><i class="demo-pli-calendar-4 icon-lg icon-fw"></i> {{ date('d/m/Y', strtotime(auth()->user()->birthday)) }}</p>
                <p><i class="demo-pli-warning-window icon-lg icon-fw"></i> {{ auth()->user()->code }}</p>
                <p><i class="demo-pli-internet icon-lg icon-fw"></i> {{ app()->getLocale() == 'en' ? auth()->user()->country->name : auth()->user()->country->nom }}</p>
                <hr>
                <p class="pad-ver text-main text-sm text-uppercase text-bold">@lang('locale.level', ['suffix'=>app()->getLocale() == 'en' ? 's' : 'x'])</p>
                <ul class="list-inline">
                    @foreach (auth()->user()->wins as $item)
                    <li class="tag tag-sm">{{ $item->level->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="fluid">
                <div class="panel panel-mint">
                    <div class="panel-heading">
                        <div class="panel-control">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#profile" data-toggle="tab">
                                        <i class="demo-pli-find-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#auth" data-toggle="tab">
                                        <i class="demo-psi-lock-2"></i> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="report-error" class="text-center text-danger"></div>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="profile">
                                <form method="post" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('patch')
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.firstname') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="firstname" class="form-control" type="text" name="firstname" value="{{ auth()->user()->firstname }}" placeholder="{{ __('locale.firstname') }}" required/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.name') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="name" class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" placeholder="{{ __('locale.name') }}" required/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.birthday') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="birth" class="form-control" type="date" name="birthday" value="{{ auth()->user()->birthday }}"  placeholder="{{ __('locale.birth') }}" required/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.gender') <span class="text-danger">*</span></x-input-label>
                                                    <select id="gender" class="form-control" name="gender" required>
                                                        <option value="homme" {{ auth()->user()->gender == 'homme' ? 'selected' : '' }}>@lang('locale.man')</option>
                                                        <option value="femme" {{ auth()->user()->gender == 'femme' ? 'selected' : '' }}>@lang('locale.woman')</option>
                                                        <option value="autres" {{ auth()->user()->gender == 'autres' ? 'selected' : '' }}>@lang('locale.other', ['suffix'=>'s'])</option>
                                                    </select>
                                                </div> 
                                            </div> 
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.phone') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="phone" class="form-control" type="tel" name="phone" value="{{ auth()->user()->phone }}" placeholder="{{ __('locale.phone') }}" required/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.mail_address') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="email" class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" placeholder="{{ __('locale.mail_address') }}" required/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.address') <span class="text-danger">*</span></x-input-label>
                                                    <x-text-input id="address" class="form-control" type="text" name="address" value="{{ auth()->user()->address }}" placeholder="{{ __('locale.address') }}" required/>
                                                </div>  
                                            </div> 
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <x-input-label>@lang('locale.country') <span class="text-danger">*</span></x-input-label>
                                                    <select id="country_id" class="form-control" name="country_id" required>
                                                        @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}" {{ auth()->user()->country_id == $item->id ? 'selected' : '' }}>{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                            </div>  
                                        </div>
                                    </div>
                                    <button class="btn btn-mint btn-lg btn-block">@lang('locale.submit')</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="auth">
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <x-input-label>@lang('locale.current_password') <span class="text-danger">*</span></x-input-label>
                                        <div class="input-group mar-btm">
                                            <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                            <x-text-input id="current-password" class="form-control" placeholder="{{ __('locale.current_password') }}" type="password" name="current_password" autocomplete='current-password' required/>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label>@lang('locale.new_password') <span class="text-danger">*</span></x-input-label>
                                        <div class="input-group mar-btm">
                                            <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                            <x-text-input id="new-password" class="form-control" placeholder="{{ __('locale.new_password') }}" type="password" name="password" autocomplete='new-password' required/>
                                        </div>
                                        <p class="text-muted" id="password-indicator">@lang('locale.password_indication')</p>
                                    </div>
                                    <div class="form-group">
                                        <x-input-label>@lang('locale.password_confirmation') <span class="text-danger">*</span></x-input-label>
                                        <div class="input-group mar-btm">
                                            <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                                            <x-text-input id="password_confirmation" class="form-control" type="password"  placeholder="{{ __('locale.password_confirmation') }}" name="password_confirmation" autocomplete='new-password' required />
                                        </div>
                                    </div>
                                    <button class="btn btn-mint btn-lg btn-block">@lang('locale.submit')</button>
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    
