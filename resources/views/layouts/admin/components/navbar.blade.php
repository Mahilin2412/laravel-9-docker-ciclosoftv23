<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('welcome') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="" alt="" height="17">
                                </span>
                </a>

                <a href="{{ route('welcome') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ url('images/imagen1.png') }}" alt="" height="60">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">




            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ url('images/login.png') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1" key="t-henry">{{ Auth::user()->FirstName }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> <span key="t-settings">Settings</span></a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Cerrar sesion') }}
                            </x-jet-dropdown-link>
                        </form>
                    </a>
                </div>
            </div>


        </div>
    </div>
</header>
