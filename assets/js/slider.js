const sliderItems = document.querySelectorAll('.slider-item'),
  sliderLength = sliderItems.length,
  nextBtn = document.querySelector('.slider-btn--next'),
  prevBtn = document.querySelector('.slider-btn--prev');
let currentSlider = 1;
/*-------------Swipe Slider-------------*/
prevBtn.onclick = e => {
  swipeSlider(false);
};
nextBtn.onclick = e => {
  swipeSlider(true);
};
function swipeSlider(isNext) {
  if(isNext) {
    sliderItems[0].style = `margin-left: -${currentSlider}00%;`;
    currentSlider++;
    console.log(currentSlider);
    if(currentSlider === 2) {
      document.querySelector('.slider-btn.disable').classList.remove('disable');
    }
    if(currentSlider >= sliderLength) {
      event.target.classList.add('disable');
      currentSlider = sliderLength;
      return;
    } 
  } else {
    currentSlider--;
    console.log(currentSlider);
    sliderItems[0].style = `margin-left: -${currentSlider - 1}00%;`;
    if(currentSlider === sliderLength - 1) {
      document.querySelector('.slider-btn.disable').classList.remove('disable');
    }
    if(currentSlider <= 1) {
      event.target.classList.add('disable');
      currentSlider = 1;
      return;
    } 
  }
}
function enableButton() {
  
}