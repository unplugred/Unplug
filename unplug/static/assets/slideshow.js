var slides = document.getElementsByClassName("slide");
var slideIndex = 0;
slides[0].style.display = "block";
function nextSlide() {
	slides[slideIndex++].style.display = null;
	slideIndex %= slides.length;
	slides[slideIndex].style.display = "block";
}
