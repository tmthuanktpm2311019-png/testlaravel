{{-- Nội dung phim được tách từ home.blade.php --}}
<div class="movie-list-container">
  <h1><span style="color: #EECC51">|</span>PHIM</h1>
  <div class="movie-nav" id="movieNav">
    <a href="#" class="nav-link active" id="nowShowingTab">Đang chiếu</a>
    <a href="#" class="nav-link" id="comingSoonTab">Sắp chiếu</a>
  </div>

  <div class="movie-grid" id="movieGrid">
    {{-- Nội dung phim sẽ được render bằng JS --}}
  </div>
</div>

<script>
  // Đưa dữ liệu ra window để JS file sử dụng
  window.nowShowingMovies = @json($nowShowingMovies);
  window.comingSoonMovies = @json($comingSoonMovies ?? []);
  window.assetPrefix = '{{ asset('') }}';
</script>
<script src="{{ asset('js/movie-tabs.js') }}"></script>
