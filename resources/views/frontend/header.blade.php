<header id="header">
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ url('/') }}">
                <img class="header-logo" src="{{ asset('assets/img/TVCinema-logo.webp') }}" alt="TVCinema-logo">
            </a>
            <span class="logo-text">TVCinema</span>
        </div>
        <!-- Menu -->
        <nav id="menu">
            <a href="{{ route('booking') }}" class="btn-ticket">🎟 Mua Vé</a>
            <ul>
                <li><a href="{{ url('/') }}">Trang chủ</a></li>
                <li>
                    <a href="#">Phim</a>
                    <ul>
                        <li><a href="">Phim đang chiếu</a></li>
                        <li><a href="">Phim sắp chiếu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Rạp chiếu</a>
                    <ul>
                        <li><a href="">CGV</a></li>
                        <li><a href="">Galaxy Cinema</a></li>
                        <li><a href="">Lotte Cinema</a></li>
                        <li><a href="">BHD Star</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
            </ul>
        </nav>
        <!-- Right -->
        <div class="right">
            <button class="search"><i class="bx bx-search"></i></button>
            @if (Auth::check())
                <div class="user-dropdown">
                    <button class="avatar-btn">
                        <img src="{{ Auth::user()->avatar ?? asset('assets/img/default-avatar.png') }}" alt="avatar"
                            class="avatar-img">
                    </button>
                    <div class="dropdown-content">
                        <div class="dropdown-user-info">
                            <img src="{{ Auth::user()->avatar ?? asset('assets/img/default-avatar.png') }}"
                                alt="avatar" class="dropdown-avatar">
                            <div class="dropdown-name">{{ Auth::user()->name }}</div>
                        </div>
                        <hr class="dropdown-divider">
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="manage-btn"><i class="fa-solid fa-gauge-high"></i>
                                Quản Lý Hệ Thống</a>
                        @else
                            <a href="{{ url('/tai-khoan') }}" class="account-btn"><i class="fa-solid fa-user"></i> Tài
                                khoản</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i>
                                Đăng xuất</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ url('/login') }}" class="login">Đăng Nhập</a>
            @endif
        </div>
    </div>
</header>
