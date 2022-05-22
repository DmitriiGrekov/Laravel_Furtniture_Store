@extends('base')

@section('title')
   Сброс пароля
@endsection


@section('content')

<div class="content">
    <div class="cnt">
        <h3>Сброс пароля</h3>
        <form action="{{route('password.email')}}" method="post">
            @csrf

            @if ($errors->any())

            @foreach ($errors->all() as $er)
            <li>{{$er}}</li>

            @endforeach

            @if (session('status'))

            <li>{{session('status')}}</li>

            @endif


            @endif

            <input type="email" name="email" id="" placeholder="Почта"><br><br>
            <input type="submit" value="Сбросить пароль">
        </form>
    </div>
</div>

@endsection
