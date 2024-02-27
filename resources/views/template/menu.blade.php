<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    @if (auth()->user()->foto_profil)
                        <img src="assets/images/{{ auth()->user()->foto_profil }}" width="20" alt="" />
                    @else
                        <img src="{{ asset('') }}assets/images/avatar/1.png" width="20">
                    @endif
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>{{ auth()->user()->username }}</b></span>
                        <small class="text-end font-w400">{{ auth()->user()->name }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="/profil/{{ auth()->user()->id }}" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="/profil/{{ auth()->user()->id }}/edit" class="dropdown-item ai-icon">
                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        </svg>
                        <span class="ms-2">Edit Password </span>
                    </a>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span class="ms-2">Logout </span>
                        </button>
                    </form>
                </div>
            </li>

            {{-- @can('isRsKelurahan') --}}
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-basket3-fill"></i>
                    <span class="nav-text">Data Kelahiran</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/kelahiran/create">Tambah</a></li>
                    <li><a href='/kelahiran/'>Data</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-bookmark-dash-fill"></i>
                    <span class="nav-text">Data Kematian</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/kematian/index">Tambah</a></li>
                    <li><a href='/kematian/dash?prov=71'>Data</a></li>
                </ul>
            </li>

            @can('isAdmin')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="bi bi-people"></i>
                        <span class="nav-text">Stakoholder</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/pengguna/create">Tambah</a></li>
                        <li><a href='/pengguna'>Data</a></li>
                    </ul>
                </li>
            @endcan

    </div>
</div>
