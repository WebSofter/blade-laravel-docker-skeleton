<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- Sidebar Trigger Start -->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
            aria-controls="offcanvas"><span class="navbar-toggler-icon"></span></button>
        <!-- Sidebar Trigger End -->
        <a class="navbar-brand fw-bold me-auto" href="#">DASHBOARD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto">
                <div class="input-group my-3 my-lg-0">
                    {{-- <input type="text" class="form-control" placeholder="поиск"
                        aria-label="поиск" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="bi bi-search"></i></button> --}}
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-square"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">{{auth()->user()->name}} ({{auth()->user()->email}})</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item btn-danger" href="{{url('logout')}}">Выход</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->
