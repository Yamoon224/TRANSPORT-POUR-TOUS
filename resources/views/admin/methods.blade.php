<x-app-layout>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('locale.method', ['suffix'=>'s'])</h3>
            </div>

            <div class="panel-body">
                <div class="pad-btm form-inline">
                    <div class="row">
                        <div class="col-sm-2 table-toolbar-left"></div>
                        <div class="col-sm-10 table-toolbar-right">
                            <form action="{{ route('methods.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" autocomplete="off" name="name" class="form-control" placeholder="@lang('locale.name')" required>
                                </div>
                                <button class="btn btn-mint"><i class="demo-pli-add icon-fw"></i>@lang('locale.submit')</button>
                            </form>                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.name')</th>
                                <th>@lang('locale.payment', ['suffix'=>'s'])</th>
                                <th class="text-center">@lang('locale.action', ['suffix'=>'s'])</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($methods as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="text-muted">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->payments->count() }}</td>
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
</x-app-layout>



