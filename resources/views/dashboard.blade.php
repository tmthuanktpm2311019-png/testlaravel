{{-- DASHBOARD TVCINEMA --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị TVCinema</title>
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .sidebar-brand-text { font-weight: bold; font-size: 22px; color: #f6c23e; }
        .sidebar { background: linear-gradient(180deg,#1a223f 10%,#2c3e50 100%); }
        .sidebar .nav-link, .sidebar .sidebar-heading { color: #fff; }
        .sidebar .nav-link.active { background: #f6c23e; color: #1a223f; }
        .card { border-radius: 16px; }
        .dashboard-title { font-size: 2rem; font-weight: 700; color: #1a223f; margin-bottom: 24px; }
        .dashboard-stat { font-size: 1.2rem; color: #858796; }
        .dashboard-icon { font-size: 2.5rem; color: #f6c23e; }
        .topbar { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .avatar-img { width: 40px; height: 40px; border-radius: 50%; box-shadow: 0 2px 8px rgba(0,0,0,0.12); }
        .dropdown-menu { min-width: 160px; }
        .copyright { color: #858796; }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-film fa-lg" style="color:#f6c23e;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TVCinema Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active"><a class="nav-link" href="dashboard"><i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Quản lý</div>
            <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}"><i class="fa-solid fa-clapperboard"></i> <span>Phim</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('theaters.index') }}"><i class="fa-solid fa-building"></i> <span>Rạp</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('rooms.index') }}"><i class="fa-solid fa-chair"></i> <span>Phòng chiếu</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('showtimes.index') }}"><i class="fa-solid fa-clock"></i> <span>Suất chiếu</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('seats.index') }}"><i class="fa-solid fa-couch"></i> <span>Ghế</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}"><i class="fa-solid fa-ticket"></i> <span>Vé</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="fa-solid fa-users"></i> <span>Người dùng</span></a></li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                    <span class="dashboard-title">Quản trị hệ thống đặt vé TVCinema</span>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <img class="avatar-img" src="{{ Auth::user()->avatar ?? asset('assets/img/default-avatar.png') }}" alt="avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Hồ sơ</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất</button></form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End Topbar -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="dashboard-stat">Tổng số phim</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $movieCount ?? '120' }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-clapperboard dashboard-icon"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="dashboard-stat">Tổng số rạp</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $theaterCount ?? '8' }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-building dashboard-icon"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="dashboard-stat">Tổng suất chiếu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $showtimeCount ?? '45' }}</div>
                                        </div>
                                        <div class="col-.auto"><i class="fa-solid fa-clock dashboard-icon"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="dashboard-stat">Vé đã bán</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ticketSold ?? '2,350' }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-ticket dashboard-icon"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Doanh thu tháng này</h6>
                                    <span class="dashboard-stat">{{ $revenue ?? '120,000,000₫' }}</span>
                                </div>
                                <div class="card-body">
                                    <canvas id="revenueChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông báo hệ thống</h6>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>Hệ thống hoạt động ổn định.</li>
                                        <li>Đã cập nhật lịch chiếu mới.</li>
                                        <li>Thêm phim mới: "MƯA ĐỎ".</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; TVCinema {{ date('Y') }}</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- JS Chart Example -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                datasets: [{
                    label: 'Doanh thu (triệu đồng)',
                    data: [30, 35, 28, 27],
                    backgroundColor: 'rgba(246,194,62,0.2)',
                    borderColor: '#f6c23e',
                    borderWidth: 3,
                    pointBackgroundColor: '#1a223f',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
</body>
</html>