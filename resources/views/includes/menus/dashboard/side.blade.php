<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class=" text-center p-2 border-bottom ">
            <a href="{{ route('student.home')}}">
                <img  src="/images/logo.jpg" alt="logo" width="64" height="64">
                <div>BUNTOG ELEMENTARY SCHOOL LEARNING SYSTEM</div>
            </a>
        </div>
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <div class="text-center">
                <div class="border-bottom">
                    <div class="row g-0">
                      <div class="col-3 p-1">
                        <img src="{{ Auth::user()->thumbnailUrl() }}" class="img-fluid" alt="...">
                      </div>
                      <div class="col-9 text-start p-1">
                        <div>
                            <div>{{ Auth::user()->full_name }}</div>
                        </div>
                        <div>{{ Auth::user()->username }}</div>
                      </div>
                    </div>
                </div>    
            </div>
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
