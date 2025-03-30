const btn = document.querySelector('.content-lg-dropdown');
const lgdropdown= document.querySelector('.login-register-dropdown')
const n = document.querySelectorAll('.btn-action'); 
const login =document.querySelector('.btn-login');
const loginf = document.querySelector('.login-footer');
const res = document.querySelector('.btn-register');
const resf = document.querySelector('.register-footer');
const modaltitle = document.querySelector('.modal_title');
const closebtn = document.querySelector('.modal_close');
const modal = document.querySelector('.modal-register');
const resform = document.querySelector('.register-form');
const logform = document.querySelector('.login-form');
const registertrigger= document.querySelector(".register-trigger");
const logintrigger= document.querySelector(".login-trigger");
const chooselogincheckout = document.querySelector(".choose-login");
function toggledropdown() {
    lgdropdown.classList.toggle('m-hidden');
}
btn.addEventListener("click",  toggledropdown);



// not logged in
n.forEach(item => item.addEventListener("click", toggledropdown));
function togglemodallog(){
    modal.classList.toggle('m-hidden');
    logform.classList.toggle('m-hidden');
    loginf.classList.toggle('m-hidden');
}
function togglemodalregister(){
    modal.classList.toggle('m-hidden');
    resform.classList.toggle('m-hidden');
    resf.classList.toggle('m-hidden');
}

login.addEventListener('click',() => {
    modaltitle.innerHTML = "Đăng nhập";
    togglemodallog();
})
res.addEventListener('click',() => {
    modaltitle.innerHTML = "Đăng ký";
    togglemodalregister();
})
closebtn.addEventListener('click', () => {
    if(modaltitle.innerHTML == "Đăng nhập"){
        togglemodallog();
    }else if(modaltitle.innerHTML == "Đăng ký"){
        togglemodalregister();
    }
    modaltitle.innerHTML="";
})
// modal.addEventListener('click', (e) => {
//     if(e.target ==e.currentTarget){
//         if(modaltitle.innerHTML == "Đăng nhập"){
//             togglemodallog();
//         }else if(modaltitle.innerHTML == "Đăng ký"){
//             togglemodalregister();
//         }
//         modaltitle.innerHTML="";
//     }
// })
logintrigger.addEventListener('click', () => {
    modaltitle.innerHTML = "Đăng nhập"
    togglemodallog();
    togglemodalregister();
})
registertrigger.addEventListener('click', () => {
    modaltitle.innerHTML = "Đăng ký";
    togglemodallog();
    togglemodalregister();
})
chooselogincheckout.addEventListener('click', () => {
    modaltitle.innerHTML = "Đăng nhập";
    togglemodallog();
})
// logged in 