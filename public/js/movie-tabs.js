// movie-tabs.js - Chuyển đổi phim đang chiếu/sắp chiếu trên trang home

document.addEventListener("DOMContentLoaded", function () {
    const nowShowingMovies = window.nowShowingMovies || [];
    const comingSoonMovies = window.comingSoonMovies || [];

    const movieGrid = document.getElementById("movieGrid");
    const nowTab = document.getElementById("nowShowingTab");
    const soonTab = document.getElementById("comingSoonTab");
    const navLinks = document.querySelectorAll(".movie-nav .nav-link");

    function asset(path) {
        // Đảm bảo đường dẫn asset đúng
        if (path.startsWith("http")) return path;
        if (path.startsWith("/")) return path;
        return window.assetPrefix ? window.assetPrefix + path : "/" + path;
    }

    function renderMovies(movies) {
        let html = "";
        movies.forEach((movie) => {
            const slug = movie.slug
                ? movie.slug
                : (movie.title || "")
                      .toLowerCase()
                      .normalize("NFD")
                      .replace(/\s+/g, "-")
                      .replace(/[^\w-]+/g, "");
            // Đảm bảo poster_url luôn là /storage/posters/xxx.jpg
            let posterPath = movie.poster_url;
            if (!posterPath.startsWith("http") && !posterPath.startsWith("/")) {
                posterPath = "/storage/" + posterPath;
            }
            html += `<div class="movie-card">
        <div style="position: relative; width: 100%;">
          <img src="${posterPath}" alt="${movie.title}" width="300" height="500" style="width:300px;height:500px;object-fit:cover;border-radius:8px 8px 0 0;">
          <div class="overlay">
            <a href="/dat-ve/${slug}/" class="btn btn-booking"><span style="display:inline-flex;align-items:center;gap:6px;"><i class="bx bx-ticket"></i> Mua vé</span></a>
            <a href="${movie.trailer_url}" class="btn btn-trailer" target="_blank"><span style="display:inline-flex;align-items:center;gap:6px;"><i class="bx bx-play-circle"></i> Trailer</span></a>
          </div>
        </div>
        <h3 class="movie-title">${movie.title}</h3>
      </div>`;
        });
        movieGrid.innerHTML = html;
    }
    // ...existing code...

    nowTab.addEventListener("click", function (e) {
        e.preventDefault();
        navLinks.forEach((l) => l.classList.remove("active"));
        nowTab.classList.add("active");
        renderMovies(nowShowingMovies);
    });
    soonTab.addEventListener("click", function (e) {
        e.preventDefault();
        navLinks.forEach((l) => l.classList.remove("active"));
        soonTab.classList.add("active");
        renderMovies(comingSoonMovies);
    });

    // Khởi tạo lần đầu
    renderMovies(nowShowingMovies);
});
