<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Vé Xem Phim - TVCinema</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>
<body>

@include('frontend.header')

<div class="booking-container">
    <!-- Stepper -->
    <div class="stepper">
        <div class="step active" data-step="1">
            <div class="step-number">1</div>
            <div class="step-title">Chọn Suất</div>
        </div>
        <div class="step-divider"></div>
        <div class="step" data-step="2">
            <div class="step-number">2</div>
            <div class="step-title">Chọn Ghế</div>
        </div>
        <div class="step-divider"></div>
        <div class="step" data-step="3">
            <div class="step-number">3</div>
            <div class="step-title">Thanh Toán</div>
        </div>
    </div>

    <div class="booking-body">
        <!-- Cột trái: Nội dung các bước -->
        <div class="booking-content">
            <!-- BƯỚC 1: CHỌN RẠP, PHIM, SUẤT -->
            <div class="booking-step-content active" data-content="1">
                <h2 class="step-content-title">Chọn suất chiếu</h2>
                <div class="selection-grid">
                    <div class="form-group">
                        <label for="theater-select">1. Chọn Rạp/Vị trí</label>
                        <select id="theater-select" class="form-control">
                            <option value="" disabled selected>-- Vui lòng chọn rạp --</option>
                            <option value="tvc-cantho">TVC Cần Thơ</option>
                            <option value="tvc-saigon">TVC Sài Gòn</option>
                            <option value="tvc-danang">TVC Đà Nẵng</option>
                        </select>
                    </div>

                    <div class="form-group" id="movie-selection" style="display: none;">
                        <label for="movie-select">2. Chọn Phim</label>
                        <select id="movie-select" class="form-control">
                            <!-- Các phim sẽ được load bằng JS -->
                        </select>
                    </div>

                    <div class="form-group" id="showtime-selection" style="display: none;">
                        <label>3. Chọn Suất Chiếu</label>
                        <div class="date-tabs">
                            <button class="date-tab active" data-date="2025-10-22">Thứ Tư, 22/10</button>
                            <button class="date-tab" data-date="2025-10-23">Thứ Năm, 23/10</button>
                            <button class="date-tab" data-date="2025-10-24">Thứ Sáu, 24/10</button>
                        </div>
                        <div class="time-slots">
                            <!-- Các suất chiếu theo giờ sẽ được load bằng JS -->
                            <button class="time-slot" data-time="09:45">09:45</button>
                            <button class="time-slot" data-time="12:00">12:00</button>
                            <button class="time-slot" data-time="15:30">15:30</button>
                            <button class="time-slot" data-time="19:00">19:00</button>
                            <button class="time-slot" data-time="21:15">21:15</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BƯỚC 2: CHỌN GHẾ -->
            <div class="booking-step-content" data-content="2">
                <div class="seat-selection-header">
                    <h2 class="step-content-title">Chọn ghế</h2>
                    <button class="change-showtime-btn">Đổi suất chiếu</button>
                </div>
                <div class="seat-map-container">
                    <div class="screen">MÀN HÌNH</div>
                    <div class="seat-map">
                        <!-- Ghế sẽ được render bằng JS -->
                    </div>
                    <div class="seat-legend">
                        <div class="legend-item"><div class="seat-example seat-regular"></div> Ghế thường</div>
                        <div class="legend-item"><div class="seat-example seat-vip"></div> Ghế VIP</div>
                        <div class="legend-item"><div class="seat-example seat-selected"></div> Ghế bạn chọn</div>
                        <div class="legend-item"><div class="seat-example seat-occupied"></div> Ghế đã bán</div>
                    </div>
                </div>
            </div>

            <!-- BƯỚC 3: THANH TOÁN -->
            <div class="booking-step-content" data-content="3">
                <h2 class="step-content-title">Xác nhận và Thanh toán</h2>
                <div class="payment-summary">
                    <h3>Thông tin đặt vé</h3>
                    <p><strong>Phim:</strong> <span id="payment-movie-title"></span></p>
                    <p><strong>Rạp:</strong> <span id="payment-theater"></span></p>
                    <p><strong>Suất chiếu:</strong> <span id="payment-showtime"></span></p>
                    <p><strong>Ghế:</strong> <span id="payment-seats"></span></p>
                    <p><strong>Tổng cộng:</strong> <span id="payment-total" class="total-price"></span></p>
                    <hr>
                    <h3>Phương thức thanh toán</h3>
                    <div class="payment-methods">
                        <label><input type="radio" name="payment" checked> Thanh toán tại quầy</label>
                        <label><input type="radio" name="payment"> Ví MoMo</label>
                        <label><input type="radio" name="payment"> Thẻ ngân hàng</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột phải: Tóm tắt thông tin -->
        <div class="booking-summary">
            <h3 class="summary-title">Thông Tin Vé</h3>
            <div class="summary-content">
                <img src="https://via.placeholder.com/200x300" alt="Poster phim" id="summary-poster" class="summary-poster">
                <h4 id="summary-movie-title">Vui lòng chọn phim</h4>
                <p><i class='bx bx-location-plus'></i> <span id="summary-theater">...</span></p>
                <p><i class='bx bx-calendar'></i> <span id="summary-date">...</span></p>
                <p><i class='bx bx-time'></i> <span id="summary-time">...</span></p>
                
                <div class="summary-details" id="summary-seat-info" style="display: none;">
                    <hr>
                    <p><i class='bx bx-chair'></i> Ghế: <span id="summary-seats"></span></p>
                    <p>Tổng cộng: <span id="summary-total" class="total-price">0đ</span></p>
                </div>
            </div>
            <div class="summary-actions">
                <button class="btn-secondary" id="back-btn" style="display: none;">Quay Lại</button>
                <button class="btn-primary" id="next-btn" disabled>Tiếp Tục</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- TOÀN BỘ LOGIC JAVASCRIPT SẼ NẰM Ở ĐÂY ---

    // --- BIẾN LƯU TRẠNG THÁI ---
    let currentStep = 1;
    const bookingData = {
        theater: null,
        movie: null,
        date: null,
        time: null,
        seats: [],
        total: 0
    };

    // --- DOM ELEMENTS ---
    const steps = document.querySelectorAll('.step');
    const stepContents = document.querySelectorAll('.booking-step-content');
    const nextBtn = document.getElementById('next-btn');
    const backBtn = document.getElementById('back-btn');
    const theaterSelect = document.getElementById('theater-select');
    const movieSelection = document.getElementById('movie-selection');
    const showtimeSelection = document.getElementById('showtime-selection');
    const changeShowtimeBtn = document.querySelector('.change-showtime-btn');

    // --- FUNCTIONS ---

    // Hàm cập nhật giao diện dựa trên bước hiện tại
    function updateUI() {
        // Cập nhật stepper
        steps.forEach(step => {
            const stepNumber = parseInt(step.dataset.step);
            if (stepNumber === currentStep) {
                step.classList.add('active');
            } else if (stepNumber < currentStep) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else {
                step.classList.remove('active', 'completed');
            }
        });

        // Hiển thị nội dung của bước hiện tại
        stepContents.forEach(content => {
            content.classList.toggle('active', parseInt(content.dataset.content) === currentStep);
        });

        // Cập nhật nút bấm
        backBtn.style.display = currentStep > 1 ? 'inline-block' : 'none';
        nextBtn.textContent = currentStep === 3 ? 'Xác Nhận Thanh Toán' : 'Tiếp Tục';
        // Logic disable nút "Tiếp tục"
        updateNextButtonState();
    }

    // Hàm cập nhật trạng thái của nút "Tiếp tục"
    function updateNextButtonState() {
        let enabled = false;
        if (currentStep === 1 && bookingData.theater && bookingData.movie && bookingData.date && bookingData.time) {
            enabled = true;
        } else if (currentStep === 2 && bookingData.seats.length > 0) {
            enabled = true;
        } else if (currentStep === 3) {
            enabled = true; // Luôn bật ở bước thanh toán
        }
        nextBtn.disabled = !enabled;
    }
    
    // Hàm cập nhật tóm tắt
    function updateSummary() {
        // Cập nhật thông tin phim, rạp, suất chiếu...
        // document.getElementById('summary-movie-title').textContent = bookingData.movie || '...';
        // ...
    }

    // --- LOGIC CHO CÁC BƯỚC ---

    // BƯỚC 1: CHỌN RẠP/PHIM/SUẤT
    theaterSelect.addEventListener('change', function() {
        if (this.value) {
            bookingData.theater = this.options[this.selectedIndex].text;
            // **AJAX call**: Dựa vào this.value, gọi API để lấy danh sách phim
            // Giả lập: hiển thị mục chọn phim
            movieSelection.style.display = 'block';
            // Giả lập: thêm phim vào select
            document.getElementById('movie-select').innerHTML = `
                <option disabled selected>-- Vui lòng chọn phim --</option>
                <option value="conjuring">THE CONJURING: NGHI LỄ CUỐI CÙNG</option>
                <option value="mua-do">MƯA ĐỎ</option>
            `;
            updateNextButtonState();
            updateSummary();
        }
    });
    
    // Tương tự, thêm event listener cho movie-select, date-tabs, time-slots...
    // Mỗi lần chọn sẽ cập nhật `bookingData` và gọi `updateNextButtonState()` và `updateSummary()`

    // BƯỚC 2: CHỌN GHẾ
    function renderSeatMap() {
        const seatMap = document.querySelector('.seat-map');
        seatMap.innerHTML = '';
        const totalSeats = 50;
        const vipRows = 2; // 2 hàng đầu là VIP
        const seatsPerRow = 10;

        for (let i = 0; i < totalSeats; i++) {
            const seat = document.createElement('div');
            const row = Math.floor(i / seatsPerRow);
            const seatNumber = (i % seatsPerRow) + 1;
            const seatId = String.fromCharCode(65 + row) + seatNumber; // A1, A2...
            
            seat.classList.add('seat');
            seat.dataset.id = seatId;

            if (row < vipRows) {
                seat.classList.add('seat-vip');
                seat.dataset.price = 100000; // Giá ghế VIP
            } else {
                seat.classList.add('seat-regular');
                seat.dataset.price = 75000; // Giá ghế thường
            }

            // Giả lập ghế đã bán
            if (Math.random() > 0.8) {
                seat.classList.add('seat-occupied');
            }

            seat.textContent = seatNumber;
            seatMap.appendChild(seat);
        }
    }

    document.querySelector('.seat-map').addEventListener('click', function(e) {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('seat-occupied')) {
            e.target.classList.toggle('seat-selected');
            // Cập nhật lại mảng bookingData.seats và tổng tiền
            // ...
            updateNextButtonState();
            updateSummary();
        }
    });

    changeShowtimeBtn.addEventListener('click', function() {
        currentStep = 1;
        updateUI();
    });


    // --- EVENT LISTENERS CHO NÚT BẤM CHÍNH ---
    nextBtn.addEventListener('click', function() {
        if (currentStep < 3) {
            currentStep++;
            if (currentStep === 2) {
                renderSeatMap(); // Render ghế khi chuyển sang bước 2
            }
            updateUI();
        } else {
            // Xử lý logic thanh toán
            alert('Thanh toán thành công! Cảm ơn bạn đã đặt vé tại TVCinema.');
            // Redirect hoặc hiển thị thông tin vé
            window.location.href = "{{ route('home') }}";
        }
    });

    backBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
        }
    });

    // --- KHỞI TẠO ---
    updateUI();
});
</script>

</body>
</html>