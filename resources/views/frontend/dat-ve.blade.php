{{-- filepath: resources/views/frontend/dat-ve.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt vé - TVCinema</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movie-content.css') }}">
  </head>
  <body>
    @include('frontend.header')

    <div class="booking-detail-container">
        <h1 class="booking-title">Đặt vé: {{ $movie->title }}</h1>
        <div class="booking-info">
            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" class="booking-poster">
            <div class="booking-meta">
                <p><strong>Thể loại:</strong> {{ $movie->category }}</p>
                <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
                <p><strong>Khởi chiếu:</strong> {{ $movie->release_date }}</p>
                <p><strong>Mô tả:</strong> {{ $movie->description }}</p>
                <a href="{{ $movie->trailer_url }}" class="btn btn-trailer" target="_blank"><i class="bx bx-play-circle"></i> Trailer</a>
            </div>
        </div>
        {{-- Thêm form chọn suất chiếu, ghế, ... ở đây nếu muốn --}}
    </div>
    @include('frontend.uu-dai')
  </body>
</html>