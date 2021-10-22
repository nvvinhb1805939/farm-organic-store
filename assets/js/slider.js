/*==============================VARIABLES==============================*/
const sliderItems = document.querySelectorAll('.slider__item'),
  sliderLength = sliderItems.length,
  nextBtn = document.querySelector('.slider__btn--next'),
  prevBtn = document.querySelector('.slider__btn--prev'),
  backgroundStyle = "background-image: url('./assets/img/slider1.jpg');";
let currentSlider = 1;

/*==============================EVENT LISTENERS & FUNCTIONS==============================*/
/*-------------Swipe Slider-------------*/
prevBtn.onclick = () => {
  toPreSlide();
};
nextBtn.onclick = () => {
  toNextSlide();
};
function toNextSlide() {
  currentSlider++;
  if (currentSlider === 2) {
    document.querySelector('.slider__btn.disable').classList.remove('disable');
  } else if (currentSlider >= sliderLength) {
    nextBtn.classList.add('disable');
    currentSlider = sliderLength;
  }
  sliderItems[0].style = `
    margin-left: -${currentSlider - 1}00%;
    ${backgroundStyle}`;
}
function toPreSlide() {
  currentSlider--;
  sliderItems[0].style = `
    margin-left: -${currentSlider - 1}00%;
    ${backgroundStyle}`;
  if (currentSlider === sliderLength - 1) {
    document.querySelector('.slider__btn.disable').classList.remove('disable');
  } else if (currentSlider <= 1) {
    prevBtn.classList.add('disable');
    currentSlider = 1;
  }
}