<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top header__navbar header">
    <a href="index.html" class="header__logo ml-4"><h2>HarmonyBlog</h2></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end pr-5" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @foreach ($menu as $link)
                @if(session()->has("user") && $link->role_id === null && $link->name != 'Login' && $link->name != 'Register')
                    <li class="nav-item
                        @if(request()-> routeIs($link->url))
                        active
                        @endif ">
                        <a class="nav-link" href="{{ route($link->url) }}">{{ $link->name }}</a>
                    </li>
                @elseif(!session()->has("user") && $link->role_id === null)
                    <li class="nav-item
                        @if(request()-> routeIs($link->url))
                        active
                        @endif ">
                        <a class="nav-link" href="{{ route($link->url) }}">{{ $link->name }}</a>
                    </li>
                @endif
            @endforeach
                @if(session()->has("user"))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout_user') }}">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('blogs.index') }}">List All Blogs</a>
                            <a class="dropdown-item" href="{{ route('blogs.create') }}">Create New Blog</a>
                        </div>
                    </li>
                @endif
        </ul>
    </div>
</nav>
