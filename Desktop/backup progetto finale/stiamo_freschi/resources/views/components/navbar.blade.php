<nav class="navbar mobile ">
    <div class="container-navbar">
        <a href="/">
            <div class="container-logo">
                <img src="\img\logo.presto.scontornato.2.png" alt="logo" class="img-logo">
            </div>
        </a>
        <div class="container-menu">
            <button class="navbar-toggler" style="margin-right:30px" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" style="padding-left: 0px">
                    <a href="/">
                        <div class="container-logo">
                            <img src="\img\logo.presto.scontornato.2.png" alt="logo" class="img-logo">
                        </div>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                        style="padding-left: 0px"></button>
                </div>
                <div class="offcanvas-body" style="padding-top:0px">
                    <div class="DivOFF"
                        style="height: 30%; display: flex;flex-direction: column;justify-content: center;align-items: center;">
                        @auth
                            <div class="container-fluid">
                                <div class="btn-ann">
                                    <a href="{{ route('announcement.create') }}"><button
                                            class="btn-desk2">{{ __('ui.buttonInsertAds') }}</button></a>
                                </div>
                            </div>
                        @endauth

                        @if (Auth::check())
                            @if (Auth::user()->is_revisor)
                                <a href="{{ route('revisor.index') }}" class="btn-revisore"><button
                                        class="btn-desk2">{{ __('ui.auditorArea') }} <span style="margin-left:4px;"
                                            class="badge bg-white text-danger ">{{ App\Models\Announcement::toBeRevisionedCount() }}</span></button>
                                </a>
                            @endif

                        @endif
                        <div class="div-btn-desk">
                            @guest

                                <a href="/login" class="A3"><button
                                        class="btn-desk2">{{ __('ui.buttonLoginG') }}</button></a>
                                <a href="/register" class="A3"><button
                                        class="btn-desk2">{{ __('ui.buttonRegisterG') }}</button></a>

                            @endguest
                            @auth
                                {{-- <div style="margin: 10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                            <div style="margin: 10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                </svg>
                            </div>
                            <div style="margin: 20px; margin-left:5px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-bell" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                </svg>
                            </div> --}}
                                <div class="dropdown icon-btn" id="dropdownMenuNavDesktop" style="width: max-content;">
                                    <button class="btn dropdown-toggle icon-profile" style="width: max-content; "
                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        @if (!Auth::user()->image)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"
                                                style="margin-right:2px">
                                            @else
                                                <img class="imgProfileNav"
                                                    src="{{ asset('storage/profile_images/' . Auth::user()->image->path) }}"
                                                    alt="">
                                        @endif
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>
                                        {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard') }}">{{ __('ui.dropDwnDashboard') }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">Il mio profilo</a>
                                        </li>
                                        {{--                         <li><a class="dropdown-item" href="#">{{ __('ui.dropDwnBalance') }}</a></li>
                                    <li> --}}
                                        {{--                             <a class="dropdown-item" href="#">{{ __('ui.dropDwnAssistance') }}</a>
                                    </li> --}}
                                        {{--                       @if (Auth::check())
                                        @if (Auth::user()->is_revisor)
                                            <li><a class="dropdown-item" href="{{ route('revisor.index') }}">
                                                    {{ __('ui.dropDwnRevisor') }}
                                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                                </a>
                                            </li>
                                        @endif
                                    @endif --}}
                                        @if (!Auth::user()->is_revisor)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('become.revisor') }}">{{ __('ui.dropDwnMakeRevisor') }}
                                        @endif
                                        <li><a class="dropdown-item btn-log" href="#">
                                                <form action="/logout" method="post">
                                                    @csrf
                                                    <button class="btn-log logout">{{ __('ui.dropDwnLogout') }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" style="margin-left:5px; margin-top:0px"
                                                            fill="currentColor" class="bi bi-box-arrow-right"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                            <path fill-rule="evenodd"
                                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                            <div class="dropdown icon-btn  A6">
                                <button id="languageButton" class="btn dropdown-toggle icon-profile A3 A2"
                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ __('ui.changeLanguage') }}
                                </button>
                                <ul class="dropdown-menu  " aria-labelledby="dropdownMenuButton"
                                    style="margin-right: 10px">
                                    <li style="display: flex; margin:10px"><x-_locale lang='it'
                                            nation='it' />
                                    </li>
                                    <li style="display: flex;margin:10px"><x-_locale lang='en' nation='gb' />
                                    </li>
                                    <li style="display: flex;margin:10px"> <x-_locale lang='es'
                                            nation='es' />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar tablet">
    <div class="container-navbar">
        <a href="/">
            <div class="container-logo">
                <img src="\img\logo.presto.scontornato.2.png" alt="logo" class="img-logo">
            </div>
        </a>
        <div class="container-menu">
            <button class="navbar-toggler" style="margin-right:30px" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbarTablet" aria-controls="offcanvasNavbarTablet"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarTablet"
                aria-labelledby="offcanvasNavbarLabelTablet">
                <div class="offcanvas-header" style="padding-left: 0px">
                    <a href="/" class="DIVLOg">
                        <div class="container-logo">
                            <img src="\img\logo.presto.scontornato.2.png" alt="logo" class="img-logo">
                        </div>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                        style="padding-left: 0px"></button>
                </div>
                <div class="offcanvas-body" style="padding-top:0px">
                    <div class="DivOFF"
                        style="height: 30%; display: flex;flex-direction: column;justify-content: center;align-items: center;">
                        @auth
                            <div class="container-fluid">
                                <div class="btn-ann">
                                    <a href="{{ route('announcement.create') }}"><button
                                            class="btn-desk2">{{ __('ui.buttonInsertAds') }}</button></a>
                                </div>
                            </div>
                        @endauth

                        @if (Auth::check())
                            @if (Auth::user()->is_revisor)
                                <a href="{{ route('revisor.index') }}" class="btn-revisore"><button
                                        class="btn-desk2">{{ __('ui.auditorArea') }} <span style="margin-left:4px;"
                                            class="badge bg-white text-danger ">{{ App\Models\Announcement::toBeRevisionedCount() }}</span></button>
                                </a>
                            @endif

                        @endif
                        <div class="div-btn-desk">
                            @guest

                                <a href="/login"><button class="btn-desk2">{{ __('ui.buttonLoginG') }}</button></a>
                                <a href="/register"><button class="btn-desk2">{{ __('ui.buttonRegisterG') }}</button></a>

                            @endguest
                            @auth
                                {{-- <div style="margin: 10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                            <div style="margin: 10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                </svg>
                            </div>
                            <div style="margin: 20px; margin-left:5px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-bell" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                </svg>
                            </div> --}}
                                <div class="dropdown icon-btn" id="dropdownMenuNavDesktop" style="width: max-content;">
                                    <button class="btn dropdown-toggle icon-profile" style="width: max-content; "
                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        @if (!Auth::user()->image)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"
                                                style="margin-right:2px">
                                            @else
                                                <img class="imgProfileNav"
                                                    src="{{ asset('storage/profile_images/' . Auth::user()->image->path) }}"
                                                    alt="">
                                        @endif
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>
                                        {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard') }}">{{ __('ui.dropDwnDashboard') }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">Il mio profilo</a>
                                        </li>
                                        {{--                         <li><a class="dropdown-item" href="#">{{ __('ui.dropDwnBalance') }}</a></li>
                                    <li> --}}
                                        {{--                             <a class="dropdown-item" href="#">{{ __('ui.dropDwnAssistance') }}</a>
                                    </li> --}}
                                        {{--                       @if (Auth::check())
                                        @if (Auth::user()->is_revisor)
                                            <li><a class="dropdown-item" href="{{ route('revisor.index') }}">
                                                    {{ __('ui.dropDwnRevisor') }}
                                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                                </a>
                                            </li>
                                        @endif
                                    @endif --}}
                                        @if (!Auth::user()->is_revisor)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('become.revisor') }}">{{ __('ui.dropDwnMakeRevisor') }}
                                        @endif
                                        <li><a class="dropdown-item btn-log" href="#">
                                                <form action="/logout" method="post">
                                                    @csrf
                                                    <button class="btn-log logout">{{ __('ui.dropDwnLogout') }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" style="margin-left:5px; margin-top:0px"
                                                            fill="currentColor" class="bi bi-box-arrow-right"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                            <path fill-rule="evenodd"
                                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                            <div class="dropdown icon-btn" style="margin-right: 35px">
                                <button id="languageButton" class="btn dropdown-toggle icon-profile"
                                    style="width: 100px" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('ui.changeLanguage') }}
                                </button>
                                <ul class="dropdown-menu  " aria-labelledby="dropdownMenuButton"
                                    style="margin-right: 10px">
                                    <li style="display: flex; margin:10px"><x-_locale lang='it'
                                            nation='it' />
                                    </li>
                                    <li style="display: flex;margin:10px"><x-_locale lang='en' nation='gb' />
                                    </li>
                                    <li style="display: flex;margin:10px"> <x-_locale lang='es'
                                            nation='es' />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar desktop">
    <div class="container-navbar">
        <a href="/">
            <div class="container-logo">
                <img src="\img\logo.presto.scontornato.2.png" alt="logo" class="img-logo">
            </div>
        </a>
        @auth
            <div class="container-fluid">
                <form class="d-flex" role="search" action="{{ route('announcements.search') }}" method="GET">
                    @csrf
                    <input name="searched" class="form-control me-2" style="margin-top: 13px; height:35px"
                        type="search" placeholder="{{ __('ui.placeholderSearchA') }}" aria-label="Search">
                    <button class="btn btn-outline-secondary btn-search" style=""
                        type="submit">{{ __('ui.buttonSearchA') }}</button>
                </form>
                <div class="btn-ann" onclick="scrollFunction()" id="scrollToTopBtn">
                    <a href="{{ route('announcement.create') }}"><button
                            class="btn-desk2">{{ __('ui.buttonInsertAds') }}</button></a>
                </div>
            </div>
        @else
            <div class="container-fluid">
                <form class="d-flex" role="search" action="{{ route('announcements.search') }}" method="GET">
                    @csrf
                    <input name="searched" class="form-control me-2" style="margin-top: 13px; height:35px"
                        type="search" placeholder="{{ __('ui.placeholderSearchG') }}" aria-label="Search">
                    <button class="btn btn-outline-secondary btn-search"
                        type="submit">{{ __('ui.buttonSearchG') }}</button>
                </form>
            </div>
        @endauth

        @if (Auth::check())
            @if (Auth::user()->is_revisor)
                <a href="{{ route('revisor.index') }}" class="btn-revisore"><button
                        class="btn-desk2">{{ __('ui.auditorArea') }} <span style="margin-left:4px;"
                            class="badge bg-white text-danger ">{{ App\Models\Announcement::toBeRevisionedCount() }}</span></button>
                </a>
            @endif

        @endif




        <div class="div-btn-desk">
            @guest

                <a href="/login"><button class="btn-desk2">{{ __('ui.buttonLoginG') }}</button></a>
                <a href="/register"><button class="btn-desk2">{{ __('ui.buttonRegisterG') }}</button></a>

            @endguest
            @auth
                {{-- <div style="margin: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </div>
                <div style="margin: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-suit-heart" viewBox="0 0 16 16">
                        <path
                            d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                    </svg>
                </div>
                <div style="margin: 20px; margin-left:5px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-bell" viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                    </svg>
                </div> --}}
                <div class="dropdown icon-btn" id="dropdownMenuNavDesktop" style="width: max-content;">
                    <button class="btn dropdown-toggle icon-profile" style="width: max-content; " type="button"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (!Auth::user()->image)
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16" style="margin-right:2px">
                            @else
                                <img class="imgProfileNav"
                                    src="{{ asset('storage/profile_images/' . Auth::user()->image->path) }}"
                                    alt="">
                        @endif
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('ui.dropDwnDashboard') }}</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Il mio profilo</a>
                        </li>
                        {{--                         <li><a class="dropdown-item" href="#">{{ __('ui.dropDwnBalance') }}</a></li>
                        <li> --}}
                        {{--                             <a class="dropdown-item" href="#">{{ __('ui.dropDwnAssistance') }}</a>
                        </li> --}}
                        {{--                       @if (Auth::check())
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.index') }}">
                                        {{ __('ui.dropDwnRevisor') }}
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    </a>
                                </li>
                            @endif
                        @endif --}}
                        @if (!Auth::user()->is_revisor)
                            <li><a class="dropdown-item"
                                    href="{{ route('become.revisor') }}">{{ __('ui.dropDwnMakeRevisor') }}
                        @endif
                        <li><a class="dropdown-item btn-log" href="#">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn-log logout">{{ __('ui.dropDwnLogout') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            style="margin-left:5px; margin-top:0px" fill="currentColor"
                                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                        </svg>
                                    </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            @endauth
            <div class="dropdown icon-btn"
                style="display:flex;justify-content:center;align-items:center;margin-right:10px;height:100%;width:150px;padding-bottom:4px">
                <button id="languageButton" class="btn dropdown-toggle icon-profile" style="width: 100px"
                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('ui.changeLanguage') }}
                </button>
                <ul class="dropdown-menu  " aria-labelledby="dropdownMenuButton" style="margin-right: 10px">
                    <li style="display: flex; margin:10px"><x-_locale lang='it' nation='it' /></li>
                    <li style="display: flex;margin:10px"><x-_locale lang='en' nation='gb' /></li>
                    <li style="display: flex;margin:10px"> <x-_locale lang='es' nation='es' /></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container-cat" style="z-index: 200">
    <div class="container-fluid">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit"
                style="margin-top: 2px;padding:3px;width:60px;">Search</button>
        </form>
    </div>
</div>
