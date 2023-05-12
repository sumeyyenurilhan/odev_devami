var icon = document.getElementById("icon");
icon.onclick = function() {
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        icon.src = "images/sun.png";
    } else {
        icon.src = "images/moon.png";
    }
};


const btns = document.querySelectorAll('.nav-btn');
const slides = document.querySelectorAll('.slider');
const contents = document.querySelectorAll('.content');
var sliderNav = function(index) {
    btns.forEach((btn) => {
        btn.classList.remove('active');
    });
    slides.forEach((slide) => {
        slide.classList.remove('active');
    });
    contents.forEach((content) => {
        content.classList.remove('active');
    });
    btns[index].classList.add('active');
    slides[index].classList.add('active');
    contents[index].classList.add('active');
}
btns.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        sliderNav(i);
    });
});



var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
});



var countDownDate = new Date("July 10, 2023 00:00:00").getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
    }

}, 1000);



AOS.init({
    duration: 3000,
    once: true,
});