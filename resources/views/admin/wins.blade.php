<x-app-layout>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('locale.win', ['suffix'=>'s'])</h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.user', ['suffix'=>''])</th>
                                <th>@lang('locale.level', ['suffix'=>''])</th>
                                <th>@lang('locale.amount', ['suffix'=>''])</th>
                                <th>@lang('locale.description')</th>
                                <th class="text-center">@lang('locale.action', ['suffix'=>'s'])</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wins as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="text-muted">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span></td>
                                <td>{{ $item->user->firstname.' '.$item->user->name.' | '.$item->user->code }}</td>
                                <td>{{ $item->level->name }}</td>
                                <td>{{ moneyFormat($item->amount) }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="text-center">-</td>
                            </tr>
                            @endforeach                              
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">@lang('locale.total')</td>
                                <td colspan="3">{{ moneyFormat($wins->sum('amount')) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>



