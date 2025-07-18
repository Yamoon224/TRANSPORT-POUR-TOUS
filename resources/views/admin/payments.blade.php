<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('locale.payment', ['suffix'=>'s'])</h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.method', ['suffix'=>''])</th>
                                <th>@lang('locale.amount', ['suffix'=>''])</th>
                                <th>@lang('locale.address')</th>
                                <th>@lang('locale.status')</th>
                                <th>@lang('locale.description')</th>
                                <th class="text-center">@lang('locale.action', ['suffix'=>'s'])</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="text-muted">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span></td>
                                <td>{{ $item->method->name }}</td>
                                <td>{{ moneyFormat($item->amount) }}</td>
                                <td>{{ $item->address }}</td>
                                <td class="text-center">
                                    <div class="label label-table label-{{ $item->status == 'paid' ? 'success' : ($item->status == 'approved' ? 'primary' : ($item->status == 'inprogress' ? 'warning' : 'danger')) }}">{{ $item->status }}</div>
                                </td>
                                <td>{{ $item->description }}</td>
                                <td class="text-center">-</td>
                            </tr>
                            @endforeach                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<x-datatable></x-datatable>


