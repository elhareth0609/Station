<ul class="navbar-nav bg-white shadow sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-between" >
        <a class="d-flex align-items-center text-black" href="{{ route('home') }}">
            <div class="sidebar-brand-icon">
                <i class="mdi mdi-home-outline"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Dashboard</div>
        </a>
        <button type="button" class="border-0 bg-transparent" id="mySidebarToggle">
            <span class="mdi mdi-radiobox-marked"></span>
        </button>
    </div>

    <div class="scrollable-content">
        @foreach($menu['sections'] as $section)

            @php
                $isActiveSection = Route::currentRouteName() == $section['name'];
                $isActiveSubmenu = false;

                if(isset($section['submenu'])) {
                    foreach ($section['submenu'] as $item) {
                        if (isset($item['name']) && Route::currentRouteName() == $item['name']) {
                            $isActiveSubmenu = true;
                            break;
                        }
                        if (isset($item['submenu'])) {
                            foreach ($item['submenu'] as $subItem) {
                                if (isset($subItem['name']) && Route::currentRouteName() == $subItem['name']) {
                                    $isActiveSubmenu = true;
                                    break;
                                }
                            }
                        }
                    }
                } else {
                    $isActiveSubmenu = false;
                }
            @endphp

            <li class="nav-item my-1 {{ $isActiveSection || $isActiveSubmenu ? 'active' : '' }}">
                <a class="nav-link d-flex align-items-center rounded {{ isset($section['submenu']) ? (($isActiveSection || $isActiveSubmenu) ? '' : 'collapsed') : '' }} mx-1"
                href="{{ route($section['name']) }}"

                @if(isset($section['submenu'])) data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="{{ $isActiveSection || $isActiveSubmenu ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->index }}" @endif>
                    <i class="{{ $section['icon'] }}"></i>
                    <span>{{ $section['title'] }}</span>
                    @isset($section['badge'])
                        <span class="{{ $section['badge']['class'] }} ms-auto my-fs-7">{{ $section['badge']['value'] }}</span>
                    @endisset
                </a>

                @if(isset($section['submenu']))
                    <div id="collapse{{ $loop->index }}" class="collapse {{ $isActiveSection || $isActiveSubmenu ? 'show' : '' }}" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionSidebar">
                        <div class="bg-white p-2 collapse-inner">
                            @foreach($section['submenu'] as $submenu)
                                <a class="nav-link d-flex align-items-center nav-link-1 collapse-item rounded {{ Route::currentRouteName() == $submenu['name'] ? 'active' : '' }} {{ isset($section['submenu']) ? (($isActiveSection || $isActiveSubmenu) ? '' : 'collapsed') : '' }}"
                                href="{{ isset($submenu['link']) ? route($submenu['name']) : '#' }}"
                                @if(isset($submenu['submenu'])) data-bs-toggle="collapse" data-bs-target="#subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" aria-expanded="{{ $isActiveSection || $isActiveSubmenu ? 'true' : 'false' }}" aria-controls="subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" @endif>
                                    {{ $submenu['title'] }}
                                </a>

                                    @if(isset($submenu['submenu']))
                                        <!-- Subsubmenu -->
                                        <div id="subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" class="collapse {{ $isActiveSection || $isActiveSubmenu ? 'show' : '' }}" aria-labelledby="subheading{{ $loop->parent->index }}-{{ $loop->index }}">
                                            <div class="bg-white py-2 collapse-inner">
                                                @foreach($submenu['submenu'] as $subsubmenu)
                                                    <a class="nav-link nav-link-1 d-flex align-items-center collapse-item rounded {{ Route::currentRouteName() == $subsubmenu['name'] ? 'active' : '' }}"
                                                        href="{{ route($subsubmenu['name']) }}">{{ $subsubmenu['title'] }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </li>
            {{-- <hr class="sidebar-divider"> --}}
        @endforeach

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex bg-white border mt-3">
            <img class="sidebar-card-illustration mb-2" src="{{ asset('assets/img/undraw_rocket.svg') }}" alt="...">
            <p class="text-center mb-2 text-secondary"><strong>Dashboard</strong> is packed with premium features, components, and more!</p>
            <a class="btn btn-secondary btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
        </div>
    </div>

</ul>
