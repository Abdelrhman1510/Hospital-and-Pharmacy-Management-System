@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/patients.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('Dashboard/patients.breadcrumb') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('Patients.create') }}" class="btn btn-primary">{{ trans('Dashboard/patients.add_new') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>{{ trans('Dashboard/patients.columns.id') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.name') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.email') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.birth_date') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.phone') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.gender') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.blood_group') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.address') }}</th>
                                    <th>{{ trans('Dashboard/patients.columns.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($Patients as $Patient)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('Patients.show',$Patient->id)}}">{{$Patient->name}}</a></td>
                                    <td>{{ $Patient->email }}</td>
                                    <td>{{ $Patient->Date_Birth }}</td>
                                    <td>{{ $Patient->Phone }}</td>
                                    <td>{{ $Patient->Gender == 1 ? trans('Dashboard/patients.gender_male') : trans('Dashboard/patients.gender_female') }}</td>
                                    <td>{{ $Patient->Blood_Group }}</td>
                                    <td>{{ $Patient->Address }}</td>
                                    <td>
                                        <a href="{{ route('Patients.edit', $Patient->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i> {{ trans('Dashboard/patients.edit') }}
                                        </a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{ $Patient->id }}">
                                            <i class="fas fa-trash"></i> {{ trans('Dashboard/patients.delete') }}
                                        </button>
                                        <a href="{{route('Patients.show',$Patient->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                                @include('Dashboard.Patients.Deleted')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
