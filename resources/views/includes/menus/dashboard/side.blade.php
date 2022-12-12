<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding ">
            <a class="app-logo" href="{{ route('student.home')}}">
                <img class="me-3" src="/images/logo.jpg" alt="logo" width="45" height="45">
                <span class="logo-text text-success">BUNTOG - LS</span>
            </a>
        </div>
        <br>
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                 @if(Auth::user()->type == "student") 
                        @foreach(config('menu.student-menu') as $menu)
                            <li class="nav-item @if (count($menu['sub-links']['items'])) has-submenu @endif">
                                @if (count($menu['sub-links']['items']))
                                    <a class="nav-link submenu-toggle collapsed {{ activeMainMenu($menu['active-segments'], 'active') }}"
                                        href="#" data-bs-toggle="collapse" data-bs-target="#menu{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="submenu-2">
                                    @else
                                        <a class="nav-link {{ activeMainMenu($menu['active-segments'], 'active') }}"
                                            href="{{ $menu['link'] }}">
                                @endif

                                <span class="nav-icon">
                                    {!! $menu['icon'] !!}
                                </span>
                                <span class="nav-link-text">{{ $menu['label'] }}</span>
                                @if (count($menu['sub-links']['items']))
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                @endif
                                </a>
                                @if (count($menu['sub-links']['items']))
                                    <div id="menu{{ $loop->iteration }}"
                                        class="collapse submenu  {{ activeMenu($menu['sub-links']['active-segments']) }}"
                                        data-bs-parent="#menu-accordion">
                                        <ul class="submenu-list list-unstyled">
                                            @foreach ($menu['sub-links']['items'] as $sublink)
                                                <li class="submenu-item">
                                                    <a class="submenu-link"
                                                        href="{{ $sublink['link'] }}">{{ $sublink['label'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                @else
                    @foreach(config('menu.main-menu') as $menu)
                        <li class="nav-item @if (count($menu['sub-links']['items'])) has-submenu @endif">
                            @if (count($menu['sub-links']['items']))
                                <a class="nav-link submenu-toggle collapsed {{ activeMainMenu($menu['active-segments'], 'active') }}"
                                    href="#" data-bs-toggle="collapse" data-bs-target="#menu{{ $loop->iteration }}"
                                    aria-expanded="false" aria-controls="submenu-2">
                                @else
                                    <a class="nav-link {{ activeMainMenu($menu['active-segments'], 'active') }}"
                                        href="{{ $menu['link'] }}">
                            @endif

                            <span class="nav-icon">
                                {!! $menu['icon'] !!}
                            </span>
                            <span class="nav-link-text">{{ $menu['label'] }}</span>
                            @if (count($menu['sub-links']['items']))
                                <span class="submenu-arrow">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </span>
                            @endif
                            </a>
                            @if (count($menu['sub-links']['items']))
                                <div id="menu{{ $loop->iteration }}"
                                    class="collapse submenu  {{ activeMenu($menu['sub-links']['active-segments']) }}"
                                    data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        @foreach ($menu['sub-links']['items'] as $sublink)
                                            <li class="submenu-item">
                                                <a class="submenu-link"
                                                    href="{{ $sublink['link'] }}">{{ $sublink['label'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
              
            </ul>
        </nav>
    </div>
</div>
