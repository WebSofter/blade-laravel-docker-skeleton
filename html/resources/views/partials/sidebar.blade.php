<!-- Sidebar Start -->
<div class="offcanvas offcanvas-start bg-dark text-white side-bar" data-bs-scroll="true" tabindex="-1" id="offcanvas"
    aria-labelledby="offcanvas">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">Core</div>
                </li>
                <li>
                    <a href="/" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-wrench-adjustable-circle"></i>
                        </span>
                        <span class="fw-bold">Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">Энергия</div>
                </li>
                {{-- <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2"><i class="bi bi-layout-text-window-reverse"></i></span>
                        <span class="fw-bold">Layouts</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-layout-text-window-reverse"></i></span>
                                        <span class="fw-bold">Nested Link</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <li class="{{ Request::is('energy/consumpt') ? 'active' : '' }}">
                    <a href="{{url('energy/consumpt')}}" class="nav-link px-3">
                        <span class="me-2">
                            <i class="bi bi-battery-charging"></i>
                        </span>
                        <span class="fw-bold">
                            Текущие параметры
                        </span>
                    </a>
                </li>
                <li class="{{ Request::is('energy/diff') ? 'active' : '' }}">
                    <a href="{{url('energy/diff')}}" class="nav-link px-3">
                        <span class="me-2">
                            <i class="bi bi-plus-slash-minus"></i> </span>
                        <span class="fw-bold">
                            Разница расхода
                        </span>
                    </a>
                </li>
                <li class="{{ Request::is('energy/hall') ? 'active' : '' }}">
                    <a href="{{url('energy/hall')}}" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-file-earmark-easel"></i> </span>
                        <span class="fw-bold">
                            Конференц зал
                        </span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <div class="custom-control custom-switch px-3">
                    <label class="custom-control-label" for="darkSwitch">
                        <span class="fw-bold">
                            <i class="bi bi-moon me-2"></i>Темная тема</span>
                    </label>
                    <input type="checkbox" class="custom-control-input checkbox ms-auto" id="darkSwitch">
                </div>
                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="#" class="nav-link px-3">
                        <span class="me-2">
                            <i class="bi bi-info-circle"></i>
                        </span>
                        Provided by
                        <span class="fw-bold">@websofter</span>
                    </a>
                </li>
                </li>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Sidebar End -->
