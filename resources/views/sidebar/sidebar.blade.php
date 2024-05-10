<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="sidebar-left">
                    <a href="{{ route('home') }}">
                        <div class="image">
                            <img src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" loading="lazy">
                            <span class="status online"></span>
                        </div>
                        <span class="text">{{ Session::get('name') }}</span>
                    </a>
                    <div class="line"></div>
                </li>
                <li class="{{ set_active(['home']) }}">
                    <a href="{{ route('home') }}" class="{{ set_active(['home']) ? 'noti-dot' : '' }}">
                        <i class="fa fa-building-columns fa-2xs"></i>
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
                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->