<footer class="footer container-fluid p-4">
    <div class="row footer__content  d-flex justify-content-around flex-wrap">
        <div class="footer__section about col-12 col-md-6 col-lg-4 d-flex flex-column">
            <div class="text-justify">
                <h2 class="text-center mb-2 footer__title">About</h2>
                <p class="footer__about__desc">
                    <span class="footer__logo">HarmonyBlog</span> is a blog where users writes truly inspiring stuff including things that are connected to real world like fashion stories, stories about food, traveling, generally stories about lifestyle.
                </p>
            </div>

            <ul class="footer__socials d-flex justify-content-around w-25">
                @foreach ($socialMedias as $social)
                    <li>
                        <a href="{{ $social->path }}"><i class="{{ $social->icon }}"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="footer__section links col-12 col-md-6 col-lg-4 d-flex flex-column">
            <h2 class="footer__title text-center mb-2">Navigation links</h2>
            <ul class="d-flex flex-column">
                @foreach ($menu as $link)
                    @if(session()->has("user") && $link->role_id === null && $link->name != 'Login' && $link->name != 'Register')
                        <li><a href="{{ route($link->url) }}">{{ $link->name }}</a></li>
                    @elseif(!session()->has("user") && $link->role_id === null)
                        <li><a href="{{ route($link->url) }}">{{ $link->name }}</a></li>
                    @endif
                @endforeach
                    @if(session()->has("user"))
                        <li> <a href="{{ route('logout_user') }}">Logout</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkFooter" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkFooter">
                                <a class="dropdown-item" href="{{ route('blogs.index') }}">List All Blogs</a>
                                <a class="dropdown-item" href="{{ route('blogs.create') }}">Create New Blog</a>
                            </div>
                        </li>
                    @endif
            </ul>
        </div>
        <div class="footer__section navLinks col-12 col-md-6 col-lg-4 d-flex flex-column">
            <h2 class="footer__title text-center mb-2">Quick Links</h2>
            <ul class="d-flex flex-column">
                <li> <a href="{{ asset('sitemap.xml') }}">Sitemap</a></li>
                <li> <a href="#">RSS</a></li>
            </ul>
        </div>
    </div>

</footer>
<div class="container-fluid">
    <div class="row">
        <div class="footer__bottom text-center bg-dark p-2 col-12 text-light">
            &copy; <span class="current_year"> </span> All rights reserved.| Designed by <a href="http://tomicanja.com/">Anja Tomić</a>
        </div>
    </div>
</div>
