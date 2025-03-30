const listImg = document.querySelectorAll(".img-pro");
listImg[0].classList.add("at");
const source = listImg.forEach(element => {
    console.log(element.firstElementChild.getAttribute('src'));
})
const imgfeature = document.querySelector(".img-feature");
const main = document.querySelector('.slider-main');
const control = document.querySelectorAll(".slider-main .control");
const back = document.querySelector(".slider-main .prev");
const go = document.querySelector(".slider-main .next");
let curIndex = 0;

main.addEventListener('mouseover', () => {
    control.forEach(e => {
        e.classList.toggle('m-hidden');
    })
})
main.addEventListener('mouseout', () => {
    control.forEach(e => {
        e.classList.toggle('m-hidden');
    })
})
listImg.forEach((element,index) => {
    element.addEventListener('click', e=> { 
        curIndex = index;   
        handleSlide(curIndex);
    })
})
function getSource(index) {
    return listImg[index].firstElementChild.getAttribute('src');
}
function handleSlide(index){
    if(index < 0){
        curIndex = listImg.length - 1;
    }else if(index >= listImg.length ) curIndex = 0;
    imgfeature.setAttribute('src', getSource(curIndex));
    listImg.forEach( element => {
        element.classList.remove('at');
    })
    listImg[curIndex].classList.toggle('at');
}
function prevSlide() {
    curIndex--;
    handleSlide(curIndex);
}
function nextSlide() {
    curIndex++;
    handleSlide(curIndex);
}
back.addEventListener('click',prevSlide);
go.addEventListener('click',nextSlide);