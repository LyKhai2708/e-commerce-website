
//slider
const imgs = document.querySelectorAll('.list-image img');
const itemindex = document.querySelectorAll('.index-image .index-item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');

let currentIndex = 0;
let myInterval = null;

next.addEventListener('click', nextSlide);
prev.addEventListener('click', preSlide);
document.addEventListener('DOMContentLoaded',initialSlider());


function initialSlider() {
    if(imgs.length > 0){
        imgs[currentIndex].classList.add('activeimg');
        itemindex[currentIndex].classList.add('active-item');
        
    }
}
function startInterval(){
    myInterval = setInterval(nextSlide,5000);
}
startInterval();
function showSlide(index) {
    if(index < 0){
        currentIndex = imgs.length - 1;
    }else if(index >= imgs.length ) currentIndex = 0;

    imgs.forEach(img => {
        img.classList.remove('activeimg')
    });
    itemindex.forEach(it => {
        it.classList.remove('active-item');
    })
    imgs[currentIndex].classList.add('activeimg');
    itemindex[currentIndex].classList.add('active-item');
}

function nextSlide() {
    currentIndex++;
    showSlide(currentIndex);
}

function preSlide() {
    currentIndex--;
    showSlide(currentIndex);
}

//handle interval
let slider = document.getElementById('slider');
slider.addEventListener('mouseover',()=>{
    clearInterval(myInterval)});
slider.addEventListener('mouseout',()=>{
    startInterval();});
