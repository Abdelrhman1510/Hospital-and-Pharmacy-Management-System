<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">{{trans('Dashboard/invoices.add invoice')}}</button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{trans('Dashboard/services.name')}}</th>
            <th>{{trans('Dashboard/patients.columns.name')}}</th>
            <th>{{trans('Dashboard/invoices.invoice date')}}</th>
            <th>{{trans('Dashboard/invoices.doctor name')}}</th>
            <th>{{trans('Dashboard/invoices.section name')}}</th>
            <th>{{trans('Dashboard/invoices.Service price')}}</th>
            <th>{{trans('Dashboard/invoices.discount')}}</th>
            <th>{{trans('Dashboard/invoices.tax')}}</th>
            <th>{{trans('Dashboard/invoices.tax value')}}</th>
            <th>{{trans('Dashboard/invoices.total')}}</th>
            <th>{{trans('Dashboard/invoices.invoice type')}}</th>
            <th>{{trans('Dashboard/invoices.process')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($group_invoices as $group_invoice)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $group_invoice->Group->name }}</td>
                <td>{{ $group_invoice->Patient->name }}</td>
                <td>{{ $group_invoice->invoice_date }}</td>
                <td>{{ $group_invoice->Doctor->name }}</td>
                <td>{{ $group_invoice->Section->name }}</td>
                <td>{{ number_format($group_invoice->price, 2) }}</td>
                <td>{{ number_format($group_invoice->discount_value, 2) }}</td>
                <td>{{ $group_invoice->tax_rate }}%</td>
                <td>{{ number_format($group_invoice->tax_value, 2) }}</td>
                <td>{{ number_format($group_invoice->total_with_tax, 2) }}</td>
                <td>{{ $group_invoice->type == 1 ? trans('Dashboard/invoices.cash') : trans('Dashboard/invoices.dept') }}</td>
                <td>
                    <button wire:click="edit({{ $group_invoice->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $group_invoice->id }})" ><i class="fa fa-trash"></i></button>
                    <a href="#"  wire:click="print({{ $group_invoice->id }})" class="btn btn-primary btn-sm" target="_blank" title="{{trans('Dashboard/invoices.print exchange deed')}}"><i class="fas fa-print"></i></a>
                </td>
            </tr>

        @endforeach
    </table>
    @include('livewire.group_invoices.delete')
</div>
