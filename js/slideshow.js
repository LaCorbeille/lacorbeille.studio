createDots();
let slideIndex = 1;
let slideInterval;
showSlides(slideIndex);
startSlideShow();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "flex";
    dots[slideIndex - 1].className += " active";
}

function startSlideShow() {
    console.log("Starting slideshow");
    clearInterval(slideInterval);
    slideInterval = setInterval(() => plusSlides(1), 5000);
    document.getElementById("resume").style.display = "none";
    document.getElementById("pause").style.display = "flex";
}

function stopSlideShow() {
    console.log("Stopping slideshow");
    clearInterval(slideInterval);
    document.getElementById("resume").style.display = "flex";
    document.getElementById("pause").style.display = "none";
}

function createDots() {
    let slides = document.querySelectorAll(".slideshow-container .slide");
    let dotsContainer = document.querySelector(".dots");
    let existingDots = dotsContainer.querySelectorAll(".dot");
    existingDots.forEach(dot => dot.remove());
    slides.forEach((slide, index) => {
        let dot = document.createElement("span");
        dot.className = "dot";
        dot.setAttribute("onclick", `currentSlide(${index + 1})`);
        dotsContainer.appendChild(dot);
    });
}