<div id="collapse{{ $loop->index }}" class="collapse {{ $isActiveSection || $isActiveSubmenu ? 'show' : '' }}" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionSidebar">
    <div class="bg-white p-2 collapse-inner">
        @foreach($section['submenu'] as $submenu)
            <a class="nav-link d-flex align-items-center nav-link-1 collapse-item rounded {{ Route::currentRouteName() == $submenu['name'] ? 'active' : '' }} {{ isset($section['submenu']) ? (($isActiveSection || $isActiveSubmenu) ? '' : 'collapsed') : '' }}"
            href="{{ isset($submenu['link']) ? route($submenu['name']) : '#' }}"
            @if(isset($submenu['submenu'])) data-bs-toggle="collapse" data-bs-target="#subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" aria-expanded="{{ $isActiveSection || $isActiveSubmenu ? 'true' : 'false' }}" aria-controls="subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" @endif>
                {{ __($submenu['title']) }}
            </a>

                @if(isset($submenu['submenu']))
                    <!-- Subsubmenu -->
                    <div id="subcollapse{{ $loop->parent->index }}-{{ $loop->index }}" class="collapse {{ $isActiveSection || $isActiveSubmenu ? 'show' : '' }}" aria-labelledby="subheading{{ $loop->parent->index }}-{{ $loop->index }}">
                        <div class="bg-white py-2 collapse-inner">
                            @foreach($submenu['submenu'] as $subsubmenu)
                                <a class="nav-link nav-link-1 d-flex align-items-center collapse-item rounded {{ Route::currentRouteName() == $subsubmenu['name'] ? 'active' : '' }}"
                                    href="{{ route($subsubmenu['name']) }}">{{ __($subsubmenu['title']) }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
        @endforeach
    </div>
</div>
