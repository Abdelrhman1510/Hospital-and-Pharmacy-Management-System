@extends('Dashboard.layouts.master')

@section('title')
    Invoices
@stop

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal Notify -->
    <link href="{{ URL::asset('Dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3>All Invoices</h3>
                        <a href="{{ route('medicineinvoices.create') }}" class="btn btn-primary">
                            Create New Invoice
                        </a>
                    </div>
                    <div class="mt-3">
                        <form action="{{ route('medicineinvoices.index') }}" method="GET" class="form-inline">
                            <input
                                type="text"
                                name="search"
                                class="form-control mr-2"
                                placeholder="Search by Invoice Number"
                                value="{{ old('search', $search ?? '') }}"
                            />
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ route('medicineinvoices.index') }}" class="btn btn-secondary ml-2">Clear</a>
                        </form>
                    </div>
                </div>
                @if($invoices->isEmpty())
                <p class="text-center">No invoices found matching your search.</p>
            @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-25p border-bottom-0">Invoice Number</th>
                                <th class="wd-25p border-bottom-0">Total</th>
                                <th class="wd-35p border-bottom-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('medicineinvoices.show', $invoice->id) }}">{{ $invoice->invoice_number }}</a>
                                    </td>
                                    <td>${{ number_format($invoice->total, 2) }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                        data-toggle="modal" href="#deleteInvoiceModal{{ $invoice->id }}">
                                         <i class="las la-trash"></i>
                                     </a>
                                    </td>
                                </tr>
                                @include('Dashboard.dashboard_PharmacyEmployee.invoices.delete', ['invoice' => $invoice])
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        function printReceipt(url) {
            const printWindow = window.open(url, '_blank');
            printWindow.focus();
            printWindow.print();
        }
    </script>
@endsection
