<x-app-layout>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('locale.user', ['suffix'=>'s'])</h3>
            </div>

            <div class="panel-body">
                <div id="message-report"></div>
                <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.firstname') & @lang('locale.name')</th>
                                <th>@lang('locale.phone')</th>
                                <th>@lang('locale.address')</th>
                                <th>@lang('locale.code', ['suffix'=>''])</th>
                                <th>@lang('locale.parent_code')</th>
                                <th>@lang('locale.win', ['suffix'=>'s'])</th>
                                <th>@lang('locale.balance')</th>
                                <th>@lang('locale.withdraw', ['suffix'=>'s'])</th>
                                <th>@lang('locale.children')</th>
                                <th>@lang('locale.country')</th>
                                @if(auth()->id() == 1)
                                <th class="text-center">@lang('locale.action', ['suffix'=>'s'])</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="text-muted">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span></td>
                                <td>{{ $item->firstname.' '.$item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->parent }}</td>
                                <td>{{ $item->wins->count() .' | '. moneyFormat($item->wins->sum('amount'), $item->country->currency, ' ') }}</td>
                                <td>{{ moneyFormat($item->balance, $item->country->currency, ' ') }}</td>
                                <td>{{$item->withdraws->where('status', 'paid')->count() .' | '. moneyFormat($item->withdraws->where('status', 'paid')->sum('levied_amount'), $item->country->currency, ' ') }}</td>
                                <td>{{ $item->children()->count() + $item->subchildren()->count() }}</td>
                                <td>{{ app()->getLocale() == 'en' ? $item->country->name : $item->country->nom }}</td>
                                @if(auth()->id() == 1)
                                <td class="text-center">
                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-mint"><i class="demo-pli-check"></i></button>
                                    </form>     
                                    @if(!$item->is_paid)
                                        <a href="{{ route('users.enable', $item->id) }}" style="display: inline-block" title="Activer le compte" class="btn btn-sm btn-success"><i class="demo-pli-close"></i></a>  
                                        <a href="{{ route('users.remove', $item->id) }}" style="display: inline-block" title="Supprimer Ce compte" class="btn btn-sm btn-danger"><i class="demo-pli-trash"></i></a>  
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    setInterval($('#message-report').load("{{ route('users.autoupdate') }}", {'_token':$('meta[name="csrf-token"]').prop('content'), '_method':'GET'}), 120000); 
</script>
@endpush
</x-app-layout>



