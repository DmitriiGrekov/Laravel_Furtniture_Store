@extends('base')

@section('title')
   Подтверждение email
@endsection


@section('content')

<div class="content">
    <div class="cnt">
        <h3><b>Вы успешно зарегестрированы</b></h3>
        <p>Для дальнейшей работы, вам необходимо подтвердить email</p>

        <form method='post' action="{{route('verification.send')}}">
            @csrf

            <button type='submit'>Отправить повторно</button>
        </form>

    </div>
</div>

@endsection
