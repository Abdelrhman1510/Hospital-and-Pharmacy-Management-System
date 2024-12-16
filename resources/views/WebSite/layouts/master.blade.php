<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    @include('Website.layouts.style')
    @livewireStyles

</head>

<body>


    <!-- Page Wrapper -->
    <div class="page-wrapper {{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'rtl' : '' }}">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Header -->
        <header class="main-header header-style-three">

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="inner-container clearfix">

                    <!-- Logo -->
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('Website/images/hospital.png') }}" alt="{{ __('Logo') }}" width="50" height="50" title="{{ __('Logo') }}">
                            </a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    @include('Website.layouts.header')

                </div>
            </div>
            <!-- End Header Upper -->

            <!-- Sticky Header -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!-- Logo -->
                    <div class="logo pull-left">
                        <a href="#">
                            <img src="{{ asset('Website/images/hospital.png') }}" alt="{{ __('Small Logo') }}" width="30" height="30"  title="{{ __('Small Logo') }}">
                        </a>
                    </div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <!-- Dynamic menu items -->
                           
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Sticky Header -->

            <!-- Mobile Menu -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn">
                    <span class="icon far fa-window-close"></span>
                </div>
                <nav class="menu-box">
                    <div class="nav-logo">
                        <a href="#">
                            <img src="{{ asset('Website/images/hospital.png') }}" width="50" height="50" alt="{{ __('Navigation Logo') }}">
                        </a>
                    </div>
                    <ul class="navigation clearfix"></ul>
                </nav>
            </div>
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->

        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        @include('Website.layouts.footer')
    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll to Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>

    <!-- Search Popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn">
            <span class="fas fa-window-close"></span>
        </div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="#">
                    @csrf
                    <div class="form-group">
                        <input type="search" class="form-control" name="search-input" placeholder="{{ __('Search Here') }}" required>
                        <button type="submit" class="theme-btn">{{ __('Search Now!') }}</button>
                    </div>
                </form>

                <h3>{{ __('Recent Search Keywords') }}</h3>
                <ul class="recent-searches">
                    <li><a href="#">{{ __('Business') }}</a></li>
                    <li><a href="#">{{ __('Web Development') }}</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sidebar Widget -->


    <!-- Scripts -->
    @include('Website.layouts.scripts')
    @livewireScripts

</body>
</html>
