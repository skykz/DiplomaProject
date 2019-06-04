<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
            background: #F1F3FA;
        }

        /* Profile container */
        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 20%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }


        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}" style="color: #f38229">
        <img src="{{asset('images/temza_images/temzalogo.png')}}" height="40px">
        <a  class="navbar-brand" href="{{ url('/') }}" style="color: #f38229" >Temza.kz</a>
    </a>

</nav>
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.13);">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    @if (!Auth::user()->avatar)
                        <img src="{{asset('storage/users/default.png')}}" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" class="img-responsive">
                    @else
                        <img src="{{asset('storage')}}/{{Auth::user()->avatar}}" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" class="img-responsive">
                    @endif
                </div>

                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="profile-usertitle-job">
                        Наш классный клиент
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a href="{{url('/')}}" class="btn btn-success btn-sm" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"> <i class="glyphicon glyphicon-adjust"></i>  Магазин</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-log-out"></i> Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="{{url('/home')}}">
                                <i class="glyphicon glyphicon-home"></i>
                                Обзор </a>
                        </li>
                        <li >
                            <a href="{{url('/home/profile')}}">
                                <i class="glyphicon glyphicon-user"></i>
                                Настройки профиля</a>
                        </li>
                        <li>
                            <a href="{{url('/history/order/')}}" >
                                <i class="glyphicon glyphicon-bookmark"></i>
                                Мой адрес</a>
                        </li>
                        <li class="active">
                            <a href="{{url('/home/support')}}">
                                <i class="glyphicon glyphicon-flag"></i>
                                Служба поддержки </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <h3><i class="glyphicon glyphicon-wrench"> </i>  Служба поддержки</h3>
                <br>
                <hr>
                <label>Наши телефонные номера</label>
                <br>
                <p> Телефон: 8 (778) 446 7834</p>
                <p> Телефон: 8 (747) 345 3225</p>

                <hr>
                <label>Служебная почта</label><br>
                <p> Почта: temza_center@temza.kz</p>
            </div>
        </div>
    </div>
</div>
<center>
    <strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">TimeApp LLC</a></strong>
</center>
<br>
<br>
</body>
