@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/doctors_trans.Doctors')}}
@stop
@section('css')
<link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>

    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/doctors_trans.Doctors')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('Dashboard/main-sidebar_trans.Show ALl Sections')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{route('doctors.create')}}" class="btn btn-primary" role="button"
                    aria-pressed="true">{{trans('Dashboard/doctors_trans.add_doctor')}}</a>
                 <button type="button" class="btn btn-danger"
                         id="btn_delete_all">{{trans('Dashboard/doctors_trans.select')}}</button>



                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input name="select_all"  id="example-select-all"  type="checkbox"/></th>
                                <th >{{trans('Dashboard/doctors_trans.name')}}</th>

                                <th>{{trans('Dashboard/doctors_trans.img')}}</th>
                                <th >{{trans('Dashboard/doctors_trans.email')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.section')}}</th>
                          <th>{{trans('Dashboard/doctors_trans.phone')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.Status')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.created_at')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="checkbox" name="delete_select" value="{{$doctor->id}}" class="delete_select">
                                    </td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>
                                        @if($doctor->image)
                                            <img src="{{Url::asset('Dashboard/img/doctors/'.$doctor->image->filename)}}"
                                                 height="50px" width="50px" alt="">

                                        @else
                                            <img src="{{Url::asset('Dashboard/img/doctor_default.png')}}" height="50px"
                                                 width="50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->section->name}}</td>
                                    <td>{{ $doctor->phone}}</td>

                                    <td class="d-flex">

                                        {{$doctor->status == 1 ? trans('Dashboard/doctors_trans.Enabled'):trans('Dashboard/doctors_trans.Not_enabled')}}
                                        <div
                                            class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}}"  style="position: relative; bottom:-3px;"></div>
                                    </td>

                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('Dashboard/doctors_trans.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>{{trans('Dashboard/doctors_trans.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>{{trans('Dashboard/doctors_trans.editStatus')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>{{trans('Dashboard/doctors_trans.delete')}}</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('Dashboard.Doctors.delete')
                                @include('Dashboard.Doctors.delete_select')
                                @include('Dashboard.Doctors.update_password')
                                @include('Dashboard.Doctors.update_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')


    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
