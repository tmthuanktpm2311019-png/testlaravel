 {{-- Create Movie Page --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Mới - TVCinema</title>
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .sidebar-brand-text { font-weight: bold; font-size: 22px; color: #f6c23e; }
        .sidebar { background: linear-gradient(180deg,#1a223f 10%,#2c3e50 100%); }
        .sidebar .nav-link, .sidebar .sidebar-heading { color: #fff; }
        .sidebar .nav-item.active .nav-link { background: #f6c23e; color: #1a223f; }
        .card { border-radius: 16px; }
        .topbar { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .avatar-img { width: 40px; height: 40px; border-radius: 50%; box-shadow: 0 2px 8px rgba(0,0,0,0.12); }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon"><i class="fa-solid fa-film fa-lg" style="color:#f6c23e;"></i></div>
                <div class="sidebar-brand-text mx-3">TVCinema Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Quản lý</div>
            <li class="nav-item active"><a class="nav-link" href="{{ route('movies.index') }}"><i class="fa-solid fa-clapperboard"></i> <span>Phim</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('theaters.index') }}"><i class="fa-solid fa-building"></i> <span>Rạp</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('rooms.index') }}"><i class="fa-solid fa-chair"></i> <span>Phòng chiếu</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('seats.index') }}"><i class="fa-solid fa-couch"></i> <span>Ghế</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('showtimes.index') }}"><i class="fa-solid fa-clock"></i> <span>Suất chiếu</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}"><i class="fa-solid fa-ticket"></i> <span>Vé</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="fa-solid fa-users"></i> <span>Người dùng</span></a></li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar, etc. -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Thêm Phim Mới</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="duration">Thời lượng (phút)</label>
                                        <input type="text" class="form-control" id="duration" name="duration" required placeholder="vd: 120p">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="release_date">Ngày phát hành</label>
                                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="poster_url">Poster</label>
                                        <input type="file" class="form-control-file" id="poster_url" name="poster_url">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bg_url">Background</label>
                                        <input type="file" class="form-control-file" id="bg_url" name="bg_url">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="status">Trạng thái</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="coming_soon">Sắp chiếu</option>
                                            <option value="now_showing">Đang chiếu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="category">Thể loại</label>
                                        <input type="text" class="form-control" id="category" name="category" required placeholder="Hành động, Hài, ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="actor">Diễn viên</label>
                                    <input type="text" class="form-control" id="actor" name="actor" required>
                                </div>
                                <div class="form-group">
                                    <label for="director">Đạo diễn</label>
                                    <input type="text" class="form-control" id="director" name="director" required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Quốc gia</label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                                <div class="form-group">
                                    <label for="trailer_url">Trailer URL</label>
                                    <input type="url" class="form-control" id="trailer_url" name="trailer_url">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Giới hạn tuổi</label>
                                    <input type="number" class="form-control" id="age" name="age">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm Phim</button>
                                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
