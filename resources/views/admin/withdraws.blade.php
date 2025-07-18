<x-app-layout>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-mint">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('locale.withdraw', ['suffix'=>'s'])</h3>
            </div>

            <div class="panel-body">
                @if (auth()->user()->balance > 10)
                <div class="pad-btm form-inline">
                    <div class="row">
                        <div class="col-sm-12 table-toolbar-right">
                            <a class="btn btn-mint"  data-target="#withdraw-form" data-toggle="modal"><i class="demo-pli-wallet-2 icon-fw"></i> @lang('locale.make_withdraw')</a>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('locale.created_at')</th>
                                <th>@lang('locale.method', ['suffix'=>''])</th>
                                <th>@lang('locale.amount', ['suffix'=>''])</th>
                                <th>@lang('locale.reference')</th>
                                @if (auth()->user()->is_admin)
                                <th>@lang('locale.user', ['suffix'=>''])</th>
                                @endif
                                <th>@lang('locale.status')</th>
                                <th>@lang('locale.description')</th>
                                @if (auth()->user()->is_admin)
                                <th class="text-center">@lang('locale.action', ['suffix'=>'s'])</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="text-muted">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</span></td>
                                <td>{{ $item->method }}</td>
                                <td>{{ moneyFormat($item->amount) }}</td>
                                <td>{{ $item->reference }}</td>
                                @if (auth()->user()->is_admin)
                                <td>{{ $item->user->firstname.' '.$item->user->name }}</td>
                                @endif
                                <td class="text-center">
                                    <div class="label text-sm label-table label-{{ $item->status == 'paid' ? 'success' : ($item->status == 'approved' ? 'primary' : ($item->status == 'inprogress' ? 'warning' : 'danger')) }}">{{ $item->status }}</div>
                                </td>
                                <td>{{ $item->description }}</td>
                                @if (auth()->user()->is_admin)
                                <td class="text-center">
                                    @if ($item->status == 'inprogress')
                                        <form action="{{ route('withdraws.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-warning"><i class="demo-psi-check"></i> @lang('locale.confirm')</button>
                                        </form>
                                    @else
                                    <i class="demo-pli-check"></i> @lang('locale.paid')
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

<div class="modal fade" id="withdraw-form" role="dialog" tabindex="-1" aria-labelledby="withdraw-form" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">@lang('locale.make_withdraw')</h4>
            </div>
            <form action="{{ route('withdraws.store') }}" method="POST">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group text-danger text-center" id="report-error"></div>
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="form-group">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ion-eye-disabled"></i></span>
                            <x-text-input id="withdraw-password" class="form-control required" placeholder="{{ __('locale.withdraw_password').' | Min : 8 '.__('locale.character', ['suffix'=>'s']) }}" type="password" name="withdraw_password" autocomplete='new-password' required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" autocomplete="off" name="amount" min="10" class="form-control required" placeholder="@lang('locale.amount', ['suffix'=>'']) * | Min: {{ moneyFormat(10) }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" autocomplete="off" name="confirmation_code" class="form-control" placeholder="@lang('locale.confirmation_code') *" required>
                    </div>
                    <div class="form-group" id="notify"></div>
                    <div class="form-group">
                        <textarea autocomplete="off" name="description" class="form-control" style="resize: none" placeholder="@lang('locale.description')"></textarea>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" id="send-mail-withdraw-confirmation"><i class="demo-psi-mail-send icon-fw"></i>@lang('locale.send_mail')</button>
                    <button class="btn btn-mint">@lang('locale.submit')</button>
                </div>
            </form>  
        </div>
    </div>
</div>
@push('scripts')
<script>
    var isEmptyRequiredField = (fields) => {
        isEmpty = 0;
        fields.each(function() {
            if ($(this).val().trim() === '') {
                isEmpty++; 
            }
        });

        return isEmpty == 0 ? true : false;
    }

    $('#send-mail-withdraw-confirmation').on('click', function () {
        if(isEmptyRequiredField($('.required'))) {
            $('#notify').load("{{ route('sendmail') }}", {'_token':$('meta[name="csrf-token"]').prop('content')});
        } else {
            $('#notify').html('<p class="text-danger text-muted text-center text-sm" style="font-style: italic">Vous devez remplir les champs obligatoires avant d\'envoyer le code</p>');
        }
    })
    $('[name=method_id]').on('change', function () {
        let option = $(this).children('option:selected').text(), 
            value = $(this).children('option:selected').val();
        $('[name=reference]').prop('placeholder', 'Reference ' + (value === '' ? '*' : option.toUpperCase() + ' *'));
    })
</script>
<x-password-scripts></x-password-scripts>
@endpush
</x-app-layout>



