<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TVCinema</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

  </head>
  <body>
    <!-----------------
    START HEADER 
    ------------------>
    <header id="header">
      <div class="header-container">
        <!-- Logo -->
        <div class="logo">
          <a href="{{ url('/') }}">
            <img class="header-logo" src="{{ asset('assets/img/TVCinema-logo.webp') }}" alt="TVCinema-logo">

          </a>
          <span class="logo-text">TVCinema</span>
        </div>

        <!-------------
          START Menu
        -------------->
        <nav id="menu">
          <a href="#" class="btn-ticket">🎟 Mua Vé</a>
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
        <!-------------
          END Menu
        -------------->

        <!-------------
          START RIGHT 
        -------------->
        <div class="right">
          <button class="search"><i class="bx bx-search"></i></button>
          <a href="#" class="login">Đăng Nhập</a>
        </div>
        <!-------------
          END RIGHT 
        -------------->
      </div>
    </header>
    <!-----------------
       END HEADER 
    ------------------>

    <!-- Slider Section -->

    <div id="main-home">
      <div class="slider">
        <div class="slides">
          @foreach ($slides as $slide)
            <div class="slide" style="background-image: url('{{ asset($slide['image']) }}')">
              {{-- Nếu muốn, có thể thêm tiêu đề, mô tả, nút... ở đây --}}
              {{-- <div class="slide-caption">{{ $slide['title'] ?? '' }}</div> --}}
            </div>
          @endforeach
        </div>

        <!-- Nút điều hướng -->
        <button class="prev">❮</button>
        <button class="next">❯</button>
      </div>

      <!-- Thanh đặt vé nhanh -->
      <div class="quick-booking">
        <div class="step step-movie"><span class="num">1</span> <span class="step-label">Chọn Phim</span>
          <div class="dropdown dropdown-movie">
            <div class="dropdown-item">THE CONJURING: NGHI LỄ CUỐI CÙNG</div>
            <div class="dropdown-item">MƯA ĐỎ</div>
            <div class="dropdown-item">LÀM GIÀU VỚI MA: CUỘC CHIỆN HỘT XOÀN</div>
          </div>
        </div>
        <div class="step step-cinema"><span class="num">2</span> <span class="step-label">Chọn Rạp</span>
          <div class="dropdown dropdown-cinema">
            <div class="dropdown-item">CGV</div>
            <div class="dropdown-item">GALAXY CINEMA</div>
            <div class="dropdown-item">LOTTE CINEMA</div>
            <div class="dropdown-item">BHD STAR</div>
          </div>
        </div>
        <div class="step step-date"><span class="num">3</span> <span class="step-label">Chọn Ngày</span>
          <div class="dropdown dropdown-date">
            <div class="dropdown-item">17/09/2025</div>
            <div class="dropdown-item">18/09/2025</div>
            <div class="dropdown-item">19/09/2025</div>
          </div>
        </div>
        <div class="step step-session"><span class="num">4</span> <span class="step-label">Chọn Suất</span>
          <div class="dropdown dropdown-session">
            <div class="dropdown-item">09:00</div>
            <div class="dropdown-item">13:30</div>
            <div class="dropdown-item">19:00</div>
          </div>
        </div>
        <button class="btn-book">Mua vé nhanh</button>
      </div>
    </div>

    {{----------------- SCRIPT ------------------------}}
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
