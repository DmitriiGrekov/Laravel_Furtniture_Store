@extends('base')


@section('title')
Вход

@endsection


@section('content')

<div class="content">
    <div class="cnt">
        <h3>Авторизация</h3><br>

 @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $er )

                    <li style='color:red;'>{{$er}}</li>

                    @endforeach
                </ul>

            </div>


@endif
        <form action="{{route('login')}}" method='POST'>
            @csrf

            <input type="email" name='email' value='{{old('email')}}' placeholder="Почта"> <br><br>
            <input type="password" name='password' placeholder="Пароль"> <br><br>
            <input type="checkbox" id='remember' name='remember' value='Запомнить меня'>
            <label for="remember">Запомнить меня</label><br><br>
            <input type="submit" value='Войти'>

        </form>
    </div>
</div>

@endsection
