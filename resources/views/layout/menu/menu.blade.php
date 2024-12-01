<ul class="navbar-nav bg-white shadow sidebar sidebar-dark accordion position-fixed top-0  {{ app()->getLocale() == 'ar' ? 'end-0 sidebar-rtl' : 'start-0' }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}" id="accordionSidebar">

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
                    <span>{{ __($section['title']) }}</span>
                    @isset($section['badge'])
                        <span class="{{ $section['badge']['class'] }} {{ app()->getLocale() == 'ar' ? 'me-auto' : 'ms-auto' }} my-fs-7">{{ $section['badge']['value'] }}</span>
                    @endisset
                </a>

                @if (isset($section['submenu']) && is_array($section['submenu']))
                    @include('layout.menu.submenu', ['submenu' => $section['submenu']])
                @endif
            </li>
            {{-- <hr class="sidebar-divider"> --}}
        @endforeach

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex bg-white border mt-3">
            <img class="sidebar-card-illustration mb-2" src="{{ asset('assets/img/undraw_rocket.svg') }}" alt="...">
            <p class="text-center mb-2 text-secondary"><strong>Dashboard</strong> is packed with premium features, components, and more!</p>
            <a class="btn btn-secondary btn-sm" href="{{ route('home') }}">Upgrade to Pro!</a>
        </div>
    </div>

</ul>
