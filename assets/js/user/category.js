/*==============================VARIABLES==============================*/
const sortBtn = document.querySelector('.product-sort__btn'),
  sortLabel = document.querySelector('.product-sort__label'),
  downIcon = document.querySelector('.product-sort__icon'),
  sortList = document.querySelector('.product-sort__list'),
  sortItems = document.querySelectorAll('.product-sort__item');

/*==============================EVENT LISTENERS & FUNCTIONS==============================*/
/*-------------Toggle Rotate Icon-------------*/
sortBtn.onclick = e => {
  e.stopPropagation();
}
sortBtn.addEventListener('click', rotateIcon);
function rotateIcon() {
  downIcon.classList.toggle('rotate');
}
/*-------------Toggle Show Sort List-------------*/
sortBtn.addEventListener('click', showSortList);
function showSortList() {
  sortList.classList.toggle('show');
}
/*-------------Remove Rotate Icon & Hide Sort List-------------*/
window.onclick = () => {
  downIcon.classList.remove('rotate');
  sortList.classList.remove('show');
}
/*-------------Select Items From Sort List-------------*/
sortItems.forEach(sortItem => {
  sortItem.onclick = () => {
    sortLabel.innerText = sortItem.innerText;
    document.querySelector('.product-sort__item.active').classList.remove('active');
    sortItem.classList.add('active');
  }
})
