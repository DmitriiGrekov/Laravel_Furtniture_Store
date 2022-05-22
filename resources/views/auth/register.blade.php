@extends('base')


@section('content')

<div class="content">

    <div class="cnt">

@if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $er )

                    <li style='color:red; list-style-type:disc'>{{$er}}</li>

                    @endforeach
                </ul>

            </div>


@endif

        <h3>Регистрация</h3><br>
        <form action="{{route('register.submit')}}" method='POST'>
            @csrf

            <input type="text" name='name' placeholder="Логин" value='{{old('name')}}'><br>
            <input type="text" name='first_name' placeholder="Имя" value='{{old('first_name')}}'><br>
            <input type="text" name='last_name' placeholder="Фамилия" value='{{old('last_name')}}'><br>
            <input type="email" name='email' placeholder="Почта" value='{{old('email')}}'><br>
            <input type="password" name="password" placeholder="Пароль" ><br>
            <input type="password" name='password_confirmation' placeholder="Повторите пароль"><br>
            <input type="submit" value='Зарегестрироваться'>

        </form>
    </div>
</div>

@endsection
