@extends('layouts.app')

@section('history')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-offset-3">
                <div class="card">
                    <div class="card-header"><i class="fa fa-user"></i> Аккаунт</div>
                    <div class="card-profile-img text-center">
                        <br>
                        <img src="{{asset('storage')}}/{{Auth::user()->avatar}}" width="100px" height="100px">
                    </div>
                    <div class="card-header text-center">
                        <h6>{{Auth::user()->name}}</h6>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Разделы
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{url('/home')}}">Редактировать</a></li>
                            <li class="list-group-item"><a class="active-menu" href="{{url('/home')}}">История заказов</a></li>
                            <li class="list-group-item"><a href="{{url('/home')}}">Заказы</a></li>
                        </ul>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Панель пользователя</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Добро пожаловать, <b>{{ Auth::user()->name }}!</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
