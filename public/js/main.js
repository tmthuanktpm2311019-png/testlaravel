const slides = document.querySelector(".slides");
const slideCount = document.querySelectorAll(".slides > div").length;
let index = 0;

function showSlide(i) {
    if (i < 0) {
        index = slideCount - 1;
    } else if (i >= slideCount) {
        index = 0;
    } else {
        index = i;
    }
    slides.style.transform = `translateX(-${index * 100}%)`;
}

document.querySelector(".prev").addEventListener("click", () => {
    showSlide(index - 1);
    resetAutoSlide();
});

document.querySelector(".next").addEventListener("click", () => {
    showSlide(index + 1);
    resetAutoSlide();
});

// Auto slide mỗi 3 giây
let autoSlide = setInterval(() => {
    showSlide(index + 1);
}, 3000);

// Reset auto slide khi click nút
function resetAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(() => {
        showSlide(index + 1);
    }, 3000);
}

// Dropdown quick-booking
const steps = document.querySelectorAll(".quick-booking .step");
steps.forEach((step) => {
    step.addEventListener("click", function (e) {
        // Đóng tất cả dropdown khác
        steps.forEach((s) => {
            if (s !== step) s.classList.remove("active");
        });
        // Toggle dropdown hiện tại
        step.classList.toggle("active");
        e.stopPropagation();
    });
});
// Đóng dropdown khi click ra ngoài
window.addEventListener("click", function () {
    steps.forEach((s) => s.classList.remove("active"));
});

// Dropdown quick-booking chọn và thay đổi label
const quickSteps = document.querySelectorAll(".quick-booking .step");
quickSteps.forEach((step) => {
    const label = step.querySelector(".step-label");
    const dropdown = step.querySelector(".dropdown");
    if (!dropdown) return;
    dropdown.querySelectorAll(".dropdown-item").forEach((item) => {
        item.addEventListener("click", function (e) {
            let text = this.textContent.trim();
            if (text.length > 18) text = text.slice(0, 15) + "...";
            label.textContent = text;
            step.classList.remove("active");
            e.stopPropagation();
        });
    });
});
