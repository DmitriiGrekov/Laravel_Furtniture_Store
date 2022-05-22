<!DOCTYPE html>
<html lang="ru">

<head>
    <title>@yield('title', 'Главная')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('storage/css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('storage/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('storage/css/owl.carousel.css')}}" />
    <script src="{{asset('storage/js/jquery.min.js')}}"></script>
    <script src="{{asset('storage/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('storage/js/scripts.js')}}"></script>
    <link rel="icon" type="image/vnd.microsoft.icon"  href="{{asset('storage/img/favicon.ico')}}">
    <link rel="shortcut icon" href="{{asset('storage/img/favicon.ico')}}">
   <!-- CSS only -->

<style>
.nav .menu > ul > li.main-page a:after {
    content: "";
    display: inline-block;
    vertical-align: middle;
    background-image: url({{asset("storage/img/spr.png")}});
    background-position: 0px -101px;
    width: 14px;
    height: 14px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -9px 0 0 -7px;
}


</style>

</head>




<body>
    <!-- wrap -->
    <div class="wrap">
        <!-- header -->
       @include('src.header')
        <!-- /header -->
        <!-- nav -->
        @include('src.nav')

        <!-- /nav -->
        <!-- page -->
        <div class="page">
            <!-- content box -->
            <div class="content-box">
                <!-- content -->

                @yield('content')

                <!-- /content -->
                <!-- side -->
                <div class="side">

                @yield('side_menu')


                    <!-- side anonse -->

                    @include('src.blocks.useful_information')

                    <!-- /side anonse -->
                    <!-- side wrap -->
                    <div class="side-wrap">
                       @include('src.blocks.stock')

                       <!-- footer rew slider box -->
                       @include('src.blocks.rew_block')

						<!-- / footer rew slider box -->
                    </div>
                    <!-- /side wrap -->
                </div>
                <!-- /side -->
            </div>
            <!-- /content box -->
        </div>
        <!-- /page -->
        <div class="empty"></div>
    </div>
    <!-- /wrap -->
    <!-- footer -->
    @include('src.footer')

    <!-- /footer -->
</body>

</html>
