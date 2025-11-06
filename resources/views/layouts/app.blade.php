<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'TVCinema')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    @stack('styles')

    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body>
    {{-- Header --}}
    @include('frontend.header')

    {{-- Nội dung chính --}}
    <main class="content-wrapper">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script riêng từng trang --}}
    @stack('scripts')
</body>

</html>
