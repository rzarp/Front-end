<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BERNITEK">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- vendor css -->
    <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/select2-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }} " rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.dashboard.css') }}">
</head>

<body>

    <aside class="aside aside-fixed">
        <div class="aside-header">
            <a href="{{ url('dashboard') }}" class="aside-logo">Comic<span>Valley</span></a>
            <a href="" class="aside-menu-link">
                <i data-feather="menu"></i>
                <i data-feather="x"></i>
            </a>
        </div>
        <div class="aside-body">
            <div class="aside-loggedin">
                <div class="d-flex align-items-center justify-content-start">
                    <a href="" class="avatar"><img
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}?format=svg?bold=true?rounded=true"
                            class="rounded-circle" alt=""></a>
                    <div class="aside-alert-link d-md-none">
                        <a href="#" data-toggle="modal" data-target="#changePasswordModal"
                        class="nav-link"><i data-feather="lock"></i></a>
                        <a href="#logout-modal" title="Click here to logout" data-toggle="modal"
                            data-animation="effect-super-scaled"><i data-feather="log-out"></i></a>
                    </div>
                </div>
                <div class="aside-loggedin-user">
                    <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                        data-toggle="collapse">
                        <h6 class="tx-semibold mg-b-0">{{ auth()->user()->name }}</h6>
                        <i data-feather="chevron-down"></i>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0">{{ auth()->user()->groups[0]['description'] }}</p>
                </div>
                <div class="collapse" id="loggedinMenu">
                    <ul class="nav nav-aside mg-b-0">
                        <li class="nav-item"><a href="#" data-toggle="modal" data-target="#changePasswordModal"
                                class="nav-link"><i data-feather="lock"></i> <span>Ganti Password</span></a></li>
                        <li class="nav-item"><a href="#logout-modal" title="Sign out" data-toggle="modal"
                                data-animation="effect-super-scaled" class="nav-link"><i data-feather="log-out"></i>
                                <span>Sign Out</span></a></li>
                    </ul>
                </div>
            </div><!-- aside-loggedin -->
            <ul class="nav nav-aside">
                <li class="nav-label">Dashboard</li>
                <li class="nav-item"><a href="{{ url('dashboard') }}" class="nav-link"><i data-feather="shopping-bag"></i>
                        <span>Monitoring Pelaporan</span></a></li>
                <li class="nav-label mg-t-25">Main</li>
                <li class="nav-item"><a href="{{ url('products') }}" class="nav-link"><i data-feather="shopping-bag"></i>
                        <span>Product</span></a></li>
            </ul>
        </div>
    </aside>

    <div class="content ht-100v pd-0">
        <div class="content-header">
            <div class="content-search">
            </div>
            <nav class="nav">
                <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
            </nav>
        </div><!-- content-header -->

        <div class="content-body">
            <div class="container pd-x-0">
                @yield('content')
            </div><!-- container -->
        </div>
        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form" action="{{ url('user/change-password/'.auth()->user()->id) }}">
                            <div class="form-group">
                                <label for="">Password Lama</label>
                                <input type="password" name="old_password" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirmation" class="form-control"
                                    autocomplete="off">
                            </div>
                            <button class="btn btn-primary submit float-right" type="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="modal-logout"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-logout">Ready to Leave?</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mg-b-0">Select "Logout" below if you are ready to end your current session.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-primary tx-13">Logout</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('lib/select2/select2.min.js') }}"></script>
    <script src="{{ asset('lib/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

    <script src="{{ asset('assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.aside.js') }}"></script>

    <!-- append theme customizer -->
    <script src="{{ asset('lib/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.settings.js') }}"></script>

    {{-- core js --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @stack('js')

</body>

</html>