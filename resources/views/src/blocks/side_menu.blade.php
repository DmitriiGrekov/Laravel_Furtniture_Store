<div class="side-block side-menu">
                        <div class="title-block">Навигация</div>
                        <div class="menu-block">
                            <ul>

                                <li class="@if(strpos(Request::url(), 'main') !== false) selected @endif">
                                    <a href="">Профиль</a>
                                </li>
                               @if (Auth::user()->is_admin)
                                   <li class="@if(strpos(Request::url(), 'add_category') !== false) selected @endif">
                                    <a href="" >Добавить пункты меню первого уровня</a>
                                </li>
                                <li class="@if(strpos(Request::url(), 'add_sub_category') !== false) selected @endif" >
                                    <a href="">Добавить пункты меню второго уровня</a>
                                </li>

                                <li>
                                    <a href="">Добавить новости</a>
                                </li>
                               @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /side menu -->
