@extends('base')

@section('title', Auth::user()->name)

@section('content')
    <div class="content">

        <div class="cnt">
            {{Auth::user()->name}}
        </div>
    </div>

@endsection


@section('side_menu')
@include('src.blocks.side_menu')

@endsection
