@extends('Dashboard.layouts.master')

@section('title')
    {{ trans('Dashboard/main-sidebar_trans.medicine_sections') }}
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
                <h4 class="content-title mb-0 my-auto">Medicines Sections</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSectionModal">
                            {{ trans('Dashboard/sections_trans.add_sections') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/sections_trans.name_sections') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/sections_trans.description') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/sections_trans.created_at') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/sections_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                       <h4>{{ $section->name }}</h4>
                                    </td>
                                    <td>{{ \Str::limit($section->description, 50) }}</td>
                                    <td>{{ $section->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#editSectionModal{{ $section->id }}">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#deleteSectionModal{{ $section->id }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                @include('Dashboard.dashboard_PharmacyEmployee.medicine-sections.edit', ['section' => $section])

                                <!-- Delete Modal -->
                                @include('Dashboard.dashboard_PharmacyEmployee.medicine-sections.delete', ['section' => $section])
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        @include('Dashboard.dashboard_PharmacyEmployee.medicine-sections.add')

    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Notify js -->
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
