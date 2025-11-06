@extends('layouts.app')

@section('title', 'Đặt vé - TVCinema')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dat-ve.css') }}">
@endpush

@section('content')
    <div class="container booking-detail-container">
        <h1 class="booking-title">🎬 Đặt vé: {{ $movie->title }}</h1>
        <div class="booking-info">
            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" class="booking-poster">
            <div class="booking-meta">
                <p><strong>🎞 Thể loại:</strong> {{ $movie->category }}</p>
                <p><strong>🕒 Thời lượng:</strong> {{ $movie->duration }} phút</p>
                <p><strong>📅 Khởi chiếu:</strong> {{ $movie->release_date }}</p>
                <p><strong>📝 Mô tả:</strong> {{ $movie->description }}</p>
                <a href="{{ $movie->trailer_url }}" class="btn-trailer mt-3" target="_blank">
                    <i class='bx bx-play-circle'></i> Xem Trailer
                </a>
            </div>
        </div>
    </div>
@endsection
