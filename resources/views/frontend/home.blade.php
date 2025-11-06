<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TVCinema</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movie-content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uu-dai.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body>
    @include('frontend.header')

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
                    <div class="dropdown-item">TVC Đồng Khởi</div>
                    <div class="dropdown-item">TVC Nguyễn Huệ</div>
                    <div class="dropdown-item">TVC Phú Mỹ Hưng</div>
                    <div class="dropdown-item">TVC Gò Vấp</div>
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

    <!-- MOVIE CONTENT -->
    @include('frontend.movie-content')
    @include ('frontend.uu-dai')
    @include('frontend.footer')


    {{-- --------------- SCRIPT ---------------------- --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
