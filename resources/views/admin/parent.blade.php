@if ($parent)
<div class="panel panel-bordered-mint">
    <div class="panel-body text-center">
        <img alt="PROFILE" class="img-lg img-circle mar-btm" src="{{ uiavatar($parent->firstname.' '.$parent->name) }}">
        <p class="text-lg text-semibold mar-no text-main">{{ $parent->firstname.' '.$parent->name }}</p>
        <p class="text-muted" id="parent-code">@lang('locale.code', ['suffix'=>'']) : {{ $parent->code }}</p>
    </div>
</div>
@else
<p class="text-danger">@lang('locale.no_parent')</p>
@endif
