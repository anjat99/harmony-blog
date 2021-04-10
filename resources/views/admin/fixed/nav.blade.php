<div class="col-12 col-lg-3 pl-0" id="sidebarAdmin">
    <nav class="border-right border-bottom border-dark p-0 pt-3 text-center bg-secondary">
        <ul class="nav d-flex flex-column justify-content-around">
            @foreach ($menu as $link)
                @if(session()->has("user") && $link->role_id === 1)
                    <li class="nav-item
                         @if(request()-> routeIs($link->url))
                         active
                            @endif ">
                        <a class="nav-link border-bottom border-dark" href="{{ route($link->url) }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-titl text-white">{{ $link->name }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
