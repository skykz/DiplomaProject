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

    <style>
        html,
        body {
            margin: 0;
            background:#fafafa;
            z-index:-1;
            position:relative;
        }
        .all {

        }

        .shadow-1:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: inherit;
            height: inherit;
            z-index: -2;
            box-sizing: border-box;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.13);
        }

        .shadow-1:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: inherit;
            height: inherit;
            z-index: -2;
            box-sizing: border-box;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.08);
        }

        .card-content {
            position: relative;
            height: 80px;
            cursor: pointer;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            background: #fcf3c9;
            margin: 10px 40px;
            transition: 0.4s all;
        }

        .card-content.open {
            height: 100px;
            cursor: pointer;
            background: #ffd1a1;
        }

        @media only screen and (min-width: 600px) {
            .card-content {

                margin-top:20px;
                margin-bottom:20px;
                margin-left:10px;
                margin-right:auto;
            }
        }

        @media only screen and (max-device-width: 800px) and (orientation: portrait) {
            .card-content {
                margin: 12px 10px;
            }
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
                        <img src="{{asset('storage/users/default.png')}}" class="img-responsive">
                    @else
                        <img src="{{asset('storage')}}/{{Auth::user()->avatar}}" class="img-responsive">
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
                    <a href="{{url('/')}}" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-adjust"></i>  Магазин</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-log-out"></i> Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{url('/home')}}">
                                <i class="glyphicon glyphicon-home"></i>
                                Обзор </a>
                        </li>
                        <li>
                            <a href="{{url('/home/profile')}}">
                                <i class="glyphicon glyphicon-user"></i>
                                Настройки профиля</a>
                        </li>
                        <li>
                            <a href="{{url('/history/order/')}}" >
                                <i class="glyphicon glyphicon-bookmark"></i>
                                Мой адрес</a>
                        </li>
                        <li>
                            <a  href="{{url('/home/support')}}">
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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="all">
                    <div class="cards">
                        @foreach($data as $dat)
                        <div class="card-content shadow-1">
                            <img  style="float: left" src="{{asset('storage')}}/{{$dat->image}}" width="85" height="80">
                            <h4 style="float: left;margin-left: 10px">{{$dat->title}}</h4>
                            <p style="float: left;font-size: 15px;margin-top:10px;margin-left: 10px;font-weight: bold">-  {{$dat->price}} тг</p>
                            <p style="float: left;font-size: 15px;margin-left: 10px;margin-top: 10px">Цвет: <strong>{{$dat->color}}</strong></p>
                            @if($dat->status == 'PENDING')
                                <br><span style="background-color: #ff9945;color: white;padding: 7px;border-radius:7px;float: right;margin-right: 10px"><i class="glyphicon glyphicon-time"></i> Ожидается</span>
                            @elseif($dat->status == 'PUBLISHED')
                                <br><span style="background-color: #0fad46;color: white;padding: 7px;border-radius:7px;float: right;margin-right: 10px"><i class="glyphicon glyphicon-check"></i> Доставлено</span>
                            @elseif($dat->status == 'PROCESS')
                                <br><span style="background-color: #538dd5;color: white;padding: 7px;border-radius:7px;float: right;margin-right: 10px"><i class="glyphicon glyphicon-refresh"></i> В процессе</span>
                            @endif
                        </div>
                            @endforeach

                        <?php
                            if ($data ?? '')
                                echo $data->render();
                            ?>
                    </div>
                </div>
                <!-- END .all -->
            </div>
        </div>
    </div>
</div>
<center>
    <strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">TimeApp LLC</a></strong>
</center>
<br>
<br>
<script>
    $('.card-content').on('click', function() {
        if ($(this).hasClass('open')) {
            $('.card-content').removeClass('open');
            $('.card-content').removeClass('shadow-2');
            $(this).addClass('shadow-1');
            return false;
        } else {
            $('.card-content').removeClass('open');
            $('.card-content').removeClass('shadow-2');
            $(this).addClass('open');
            $(this).addClass('shadow-2');
        }
    });
</script>
</body>
