<select placeholder="@lang('locale.bank', ['suffix'=>''])" name="bank" class="form-control" required/>
    @foreach($banks as $item)
    <option value="{{ $item['code'] }}">{{ strtoupper($item['name']) }}</option>
    @endforeach
</select>
        