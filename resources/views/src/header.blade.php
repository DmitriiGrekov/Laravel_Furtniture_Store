



<header class="header">

            <div class="inner-wrap">
                <div class="logo-block"><a href="" class="logo">Мебельный магазин</a>
                </div>
                <div class="main-phone-block">
                    <a href="tel:84952128506" class="phone">8 (495) 212-85-06</a>
                    <div class="shedule">время работы с 9-00 до 18-00</div>
                </div>
                <div class="actions-block">
                    <form action="/" class="main-frm-search">
                        <input type="text" placeholder="Поиск">
                        <button type="submit"></button>
                    </form>

                    @if (Auth::user())
 <nav class="menu-block">
                        <ul>
                            <li>
                                <a href="{{route('profile')}}" >{{Auth::user()->first_name}} {{Auth::user()->last_name}} [{{Auth::user()->name}}]</a>
                            </li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <input type="submit" value='Выйти'>
                            </form>

                        </ul>
                    </nav>

                    @else
<nav class="menu-block">
                        <ul>
                            <li class="att popup-wrap">
                                <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>
                                <form action="{{route('login')}}" method='POST' class="frm-login popup-block">
                                    @csrf
                                    <div class="frm-title">Войти на сайт</div>
                                    <a href="" class="btn-close">Закрыть</a>
                                    <div class="frm-row"><input type="email" name='email' placeholder="Почта"></div>
                                    <div class="frm-row"><input type="password" name='password' placeholder="Пароль"></div>
                                    <div class="frm-row"><a href="{{route('password.request')}}" class="btn-forgot">Забыли пароль</a></div>
                                    <div class="frm-row">
                                        <div class="frm-chk">
                                            <input type="checkbox" name='remember' id="login">
                                            <label for="login">Запомнить меня</label>
                                        </div>
                                    </div>
                                    <div class="frm-row"><input type="submit" value="Войти"></div>
                                </form>
                            </li>
                            <li><a href="{{route("register")}}">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </nav>
                    @endif


                </div>
            </div>
        </header>
