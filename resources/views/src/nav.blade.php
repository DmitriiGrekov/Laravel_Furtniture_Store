<nav class="nav">
            <div class="inner-wrap">
                <div class="menu-block popup-wrap">
                    <a href="" class="btn-menu btn-toggle"></a>
                    <div class="menu popup-block">
                        <ul class="">

                            <li class="main-page"><a href="{{route('main.index')}}">Главная</a>
                            </li>
                                <li><a href="">Новости</a>
                                    <ul>
                                        @foreach ($news_category as $news)

                                        <li><a href="{{$news->slug}}">{{$news->name}}</a></li>

                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="">Каталог</a>
                                    <ul>

                                        @foreach ($catalog_categories as $cat)
                                        <li><a href="{{$cat->slug}}">{{$cat->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="">О компании</a>
                                </li>
                                <li><a href="">Фотогалерея</a>
                                </li>
                                <li><a href="">Контакты</a>
                                </li>
                                <li><a href="">Партнерам</a>
                                </li>
                        </ul>
                        <a href="" class="btn-close"></a>
                    </div>
                    <div class="menu-overlay"></div>
                </div>
            </div>
        </nav>
