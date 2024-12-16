<!-- Title -->
<title>Hospital</title>

@yield('css')
@livewireStyles

<!-- DataTable Styles -->
<link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@if(App::getLocale() =='ar')
    <!-- Favicon and CSS for RTL -->
    <link rel="icon" href="{{URL::asset('Dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <link href="{{URL::asset('Dashboard/css/icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css-rtl/sidemenu.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else
    <!-- Favicon and CSS for LTR -->
    <link rel="icon" href="{{URL::asset('Dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <link href="{{URL::asset('Dashboard/css/icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/sidemenu.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/skin-modes.css')}}" rel="stylesheet">
@endif
