<div class="container-fluid" id="headerAdmin">
    <div class="row col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top d-flex justify-content-between">
            <a class="navbar-brand col-3 header__logo border-right border-dark " href="#">
                HarmonyBlog
            </a>
            <ul class="d-flex justify-content-end">
                <li class="nav-item header__notify mr-4">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <h3>{{session('success') }}</h3>
                        </div>
                    @endif
                </li>

                <li class="nav-item">
                    <i class="fas fa-user pt-1"></i>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anja Tomic
                    </a>
                    <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout_admin') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

</div>
