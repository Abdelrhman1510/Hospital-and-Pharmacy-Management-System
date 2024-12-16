@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('Dashboard/main-sidebar_trans.sections') }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Internal Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patient Operations</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Payments</span>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- Row -->
    <!-- Row Opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->date }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- bd -->
            </div>
            <!-- bd -->
        </div>
        <!-- /div -->

        @include('Dashboard.Sections.add')
        <!-- /Row -->
    </div>
    <!-- Row Closed -->

    <!-- Container Closed -->

    <!-- Main Content Closed -->
@endsection
@section('js')
    <!-- Internal Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
