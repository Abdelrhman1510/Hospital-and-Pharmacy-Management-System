<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/user.jpg')}}"
                                                              class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/logo-white.png')}}"
                                                              class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"
                                                              class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"
                                                              class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">
            <ul class="nav">

            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-search"><circle cx="11" cy="11"
                                                                                            r="8"></circle><line x1="21"
                                                                                                                 y1="21"
                                                                                                                 x2="16.65"
                                                                                                                 y2="16.65"></line></svg>
											</button>
										</span>
                        </div>
                    </form>
                </div>

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class=" pulse"></span></a>
                    <div class="dropdown-menu dropdown-notifications">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifactions</h6>

                            </div>
                            <p data-count="{{App\Models\Notification::CountNotification(auth()->user()->id)->count()}}" class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 notif-count">{{App\Models\Notification::CountNotification(auth()->user()->id)->count()}}</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">

                            <div class="new_message">
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h4 class="notification-label mb-1"></h4>
                                    <div class="notification-subtext"></div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                            </div>

                            @foreach(App\Models\Notification::where('user_id',auth()->user()->id)->where('reader_status',0)->get() as $notification )
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">{{$notification->message}}</h5>
                                    <div class="notification-subtext">{{$notification->created_at}}</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                                                                src="{{ asset('Website/images/user.jpg') }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{ asset('Website/images/user.jpg') }}"
                                                                class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{auth()->user()->name}}</h6><span>{{auth()->user()->email}}</span>
                                </div>
                            </div>
                        </div>

                        @if(auth('web')->check())
                            <form method="POST" action="{{ route('logout.user') }}">
                                @elseif(auth('admin')->check())
                                    <form method="POST" action="{{ route('logout.admin') }}">
                                        @elseif(auth('doctor')->check())
                                            <form method="POST" action="{{ route('logout.doctor') }}">
                                                @elseif(auth('ray_employee')->check())
                                                    <form method="POST" action="{{ route('logout.ray_employee') }}">
                                                        @elseif(auth('laboratorie_employee')->check())
                                                            <form method="POST"
                                                                  action="{{ route('logout.laboratorie_employee') }}">
                                                                  @elseif(auth('pharmacy_employee')->check())
                                                            <form method="POST"
                                                                    action="{{ route('logout.pharmacy_employee') }}">
                                                              
                                                                @else
                                                                    <form method="POST"
                                                                          action="{{ route('logout.patient') }}">
                                                                        @endif
                                                                        @csrf
                                                                        <a class="dropdown-item" href="#"
                                                                           onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="bx bx-log-out"></i>Log Out</a>
                                                                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@vite('resources/js/app.js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>





<script type="module">

    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsCountElem = notificationsWrapper.find('p[data-count]');
    var notificationsCount  = parseInt(notificationsCountElem.data('count'));

    var notifications = notificationsWrapper.find('h4.notification-label');
    var new_message = notificationsWrapper.find('.new_message');

    new_message.hide();

    Echo.private('create-invoice.{{ auth()->user()->id }}').listen('.create-event', (data) => {

        var newNotificationHtml = `
       <h4 class="notification-label mb-1">`+data.message+data.patient+`</h4>
       <div class="notification-subtext">`+data.created_at+`</div>`;
        new_message.show();
        notifications.html(newNotificationHtml);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });


</script>




<!-- /main-header -->
