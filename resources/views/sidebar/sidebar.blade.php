<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="sidebar-left">
                    <a href="{{ route('home') }}">
                        <div class="image">
                            <img src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="avatar-sidebar" loading="lazy" style="right: 5px;">
                            @if (Auth::user()->isOnline())
                                <span class="status online"></span>
                            @else
                                <span class="status offline"></span>
                            @endif
                        </div>
                        <span class="text">{{ Session::get('name') }}</span>
                    </a>
                    <div class="line"></div>
                </li>
                <li class="{{ set_active(['home']) }}">
                    <a href="{{ route('home') }}" class="{{ set_active(['home']) ? 'noti-dot' : '' }}">
                        <i class="fa-solid fa-building-columns"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                @if (Auth::user()->role_name == 'Admin')
                    <li class="{{set_active(['manajemen/pengguna','riwayat/aktivitas','riwayat/aktivitas/otentikasi'])}} submenu">
                        <a href="#" class="{{ set_active(['manajemen/pengguna','riwayat/aktivitas','riwayat/aktivitas/otentikasi']) ? 'noti-dot' : '' }}">
                            <i class="la la-server"></i>
                            <span> Manajemen Sistem</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                            <li>
                                <a class="{{set_active(['manajemen/pengguna','manajemen/pengguna'])}}" href="{{ route('manajemen-pengguna') }}"> <span>Daftar Pengguna</span></a>
                            </li>
                            <li>
                                <a class="{{set_active(['riwayat/aktivitas','riwayat/aktivitas'])}}" href="{{ route('riwayat-aktivitas') }}"> <span>Riwayat Aktivitas</span></a>
                            </li>
                            <li>
                                <a class="{{set_active(['riwayat/aktivitas/otentikasi','riwayat/aktivitas/otentikasi'])}}" href="{{ route('riwayat-aktivitas-otentikasi') }}"> <span>Aktivitas Pengguna</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Manajemen Tugas</span> </li>
                    @php
                        $isActive = Route::is('showTeams') || Route::is('searchTeam') || Route::is('viewTeam') || Route::is('searchBoard') || Route::is('board');
                        $classes = $isActive ? ' noti-dot' : '';
                        $classes .= set_active(['user/tim']) ? ' noti-dot' : '';
                    @endphp
                    <li @if (Route::is('showTeams') || Route::is('searchTeam') || Route::is('viewTeam') || Route::is('searchBoard') || Route::is('board')) class="active" @endif>
                        <a href="{{ route('showTeams') }}" class="{{ $classes }}">
                            <i class="fa-solid fa-cube"></i>
                            <span>Tim</span>
                        </a>
                    </li>
                    @if (Route::is('showTeams') || Route::is('searchTeam'))
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0">
                            <a href="#" data-toggle="modal" data-target="#createTeam">
                                <i class="fa-solid fa-cubes" style="font-size: 20px"></i>
                                <span>Buat Tim</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::is('viewTeam') || Route::is('searchBoard'))
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0">
                            <a href="#" data-toggle="modal" data-target="#updateTeam">
                                <i class="fa-solid fa-pencil" style="font-size: 20px"></i>
                                <span>Perbaharui Tim</span>
                            </a>
                        </li>
                        @if ($statusTeams->contains('Member'))
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 5px">
                            <a href="#" data-toggle="modal" data-target="#manageMember">
                                <i class="fa-solid fa-user-gear" style="font-size: 20px"></i>
                                <span>Anggota Tim</span>
                            </a>
                        </li>
                        @endif
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 10px">
                            <a href="#" data-toggle="modal" data-target="#inviteMember">
                                <i class="fa-solid fa-user-plus" style="font-size: 20px"></i>
                                <span>Undang Anggota</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 15px">
                            <a href="#" data-toggle="modal" data-target="#createBoard">
                                <i class="fa-solid fa-table-columns" style="font-size: 20px"></i>
                                <span>Buat Papan</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 20px">
                            <a href="#" data-toggle="modal" data-target="#deleteTeam">
                                <i class="fa-solid fa-trash" style="font-size: 20px"></i>
                                <span>Hapus Papan</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 25px; margin-bottom: 25px;">
                            <a href="{{ route('showTeams') }}">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180" style="font-size: 20px"></i>
                                <span>Kembali ke Tim</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::is('board'))
                        <a href="#">
                            <div class="btn btn-outline-warning" style="border-radius: 10px; width: 70%; margin-left: 24px;">
                                <span><h4>Papan:</h4></span>
                                <span><h5>{{ $board->name }}</h5></span>
                            </div>
                        </a>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 10px">
                            <a href="#" data-toggle="modal" data-target="#updateBoard">
                                <i class="fa-solid fa-pencil" style="font-size: 20px"></i>
                                <span>Perbaharui Papan</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 20px">
                            <a href="#" data-toggle="modal" data-target="#deleteBoard">
                                <i class="fa-solid fa-trash" style="font-size: 20px"></i>
                                <span>Hapus Papan</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; top: 30px; margin-bottom: 30px;">
                            <a href="{{ route('viewTeam', ['team_id' => $team->id]) }}">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180" style="font-size: 20px"></i>
                                <span>Kembali ke Papan</span>
                            </a>
                        </li>
                    @endif
                    <li class="menu-title"> <span>Pengaturan</span> </li>
                    <li class="{{ set_active(['admin/profile']) }}">
                        <a href="{{ route('admin-profile') }}" class="{{ set_active(['admin/profile']) ? 'noti-dot' : '' }}">
                            <i class="la la-user"></i>
                            <span> Profil</span>
                        </a>
                    </li>
                    <li class="{{ set_active(['admin/kata-sandi']) }}">
                        <a href="{{ route('admin-kata-sandi') }}" class="{{ set_active(['admin/kata-sandi']) ? 'noti-dot' : '' }}">
                            <i class="la la-key"></i>
                            <span> Ubah Kata Sandi</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_name == 'User')
                    <li class="menu-title"> <span>Manajemen Tugas</span> </li>
                    @php
                        $isActive = Route::is('showTeams2') || Route::is('searchTeam2') || Route::is('viewTeam2') || Route::is('searchBoard2') || Route::is('board2');
                        $classes = $isActive ? ' noti-dot' : '';
                        $classes .= set_active(['user/tim']) ? ' noti-dot' : '';
                    @endphp
                    <li @if (Route::is('showTeams2') || Route::is('searchTeam2') || Route::is('viewTeam2') || Route::is('searchBoard2') || Route::is('board2')) class="active" @endif>
                        <a href="{{ route('showTeams2') }}" class="{{ $classes }}">
                            <i class="fa-solid fa-cube"></i>
                            <span>Tim</span>
                        </a>
                    </li>
                    @if (Route::is('viewTeam2') || Route::is('searchBoard2'))
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0; margin-bottom: 10px">
                            <a href="#" data-toggle="modal" data-target="#leaveTeam">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180" style="font-size: 20px"></i>
                                <span>Keluar dari Tim</span>
                            </a>
                        </li>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0">
                            <a href="{{ route('showTeams2') }}">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180" style="font-size: 20px"></i>
                                <span>Kembali ke Tim</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::is('board2'))
                        <a href="#">
                            <div class="btn btn-outline-warning" style="border-radius: 10px; width: 70%; margin-left: 24px; margin-bottom: 10px">
                                <span><h4>Papan:</h4></span>
                                <span><h5>{{ $board->name }}</h5></span>
                            </div>
                        </a>
                        <li class="btn btn-outline-warning" style="left: 10%; border-radius: 10px; padding: 0">
                            <a href="{{ route('viewTeam2', ['team_id' => $team->id]) }}">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180" style="font-size: 20px"></i>
                                <span>Kembali ke Papan</span>
                            </a>
                        </li>
                    @endif
                    <li class="menu-title"> <span>Pengaturan</span> </li>
                    <li class="{{ set_active(['user/profile']) }}">
                        <a href="{{ route('user-profile') }}" class="{{ set_active(['user/profile']) ? 'noti-dot' : '' }}">
                            <i class="la la-user"></i>
                            <span> Profil</span>
                        </a>
                    </li>
                    <li class="{{ set_active(['user/kata-sandi']) }}">
                        <a href="{{ route('user-kata-sandi') }}" class="{{ set_active(['user/kata-sandi']) ? 'noti-dot' : '' }}">
                            <i class="la la-key"></i>
                            <span> Ubah Kata Sandi</span>
                        </a>
                    </li>
                @endif

                <div class="latensi-koneksi" id="network-info">
                    <div class="icon-latensi">
                        <i class="fa-solid fa-wifi" id="wifi-icon"></i>
                    </div>
                    <div class="item-latensi">
                        <p class="text-latensi">Koneksi: <span id="rtt"></span> ms</p>
                    </div>
                </div>
                <script src="{{ asset('assets/js/checking-latensi-connection.js') }}"></script>
                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->