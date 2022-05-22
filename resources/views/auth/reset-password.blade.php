@extends('base')

@section('title')

Подтверждение сброса пароля

@endsection


@section('content')

<div class="content">
    <div class="cnt">
        <h3>Введите новый пароль</h3>

        @if ($errors->any())

            @foreach ($errors->all() as $error )
                <li style='color: red;'>{{$error}}</li>

            @endforeach

        @endif

        <form action="{{route('password.update')}}" method="post">
            @csrf
            <input type="hidden" name="token" value='{{$token}}'><br><br>
            <input type="email" name='email' placeholder="Почта"><br><br>
            <input type="password" name='password' placeholder="Пароль"><br><br>
            <input type="password" name="password_confirmation" placeholder="Потверждение пароля" id=""><br><br>
            <input type="submit" value='Сменить пароль'>



        </form>
    </div>
</div>

@endsection
