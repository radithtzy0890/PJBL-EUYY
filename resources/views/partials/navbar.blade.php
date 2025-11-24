<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top navbar-custom">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logotpl.png') }}" alt="Logo TPL" style="height: 60px;">

            <div class="ms-2 d-none d-sm-block text-white" style="line-height: 1.1; font-size: 0.9rem;">
                <strong style="font-size: 1.2em; display: block;">TPL SV IPB</strong>
                <small style="opacity: 0.8; display: block; font-weight: 500;">Teknologi Rekayasa Perangkat Lunak</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link nav-tpl-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-tpl-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                       href="{{ route('tentang') }}">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-tpl-link {{ request()->routeIs('homepage.dosen') ? 'active' : '' }}"
                       href="{{ route('homepage.dosen') }}">Dosen</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-tpl-link {{ request()->routeIs('matakuliah.user') ? 'active' : '' }}"
                       href="{{ route('matakuliah.user') }}">Mata Kuliah</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-tpl-link {{ request()->routeIs('faq') ? 'active' : '' }}"
                       href="{{ route('faq') }}">FAQ</a>
                </li>

                {{-- UNTUK USER LOGIN --}}
                @auth
                    
                    {{-- Jika admin atau superadmin, nama mengarah ke dashboard --}}
                    <li class="nav-item">
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                            <a class="nav-link nav-tpl-link fw-bold text"
                               href="{{ route('dashboard') }}">
                                {{ Auth::user()->name }}
                            </a>
                        @else
                            <a class="nav-link nav-tpl-link fw-bold">
                                {{ Auth::user()->name }}
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-tpl-link" href="{{ route('logout') }}">Logout</a>
                    </li>

                @else
                    {{-- USER BELUM LOGIN --}}
                    <li class="nav-item">
                        <a class="btn btn-light me-3 {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-outline-light {{ request()->routeIs('register') ? 'active' : '' }}"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>