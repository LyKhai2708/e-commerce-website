const username = document.querySelector("#register-cus-name");
const email = document.querySelector("#register-cus-email");
const phone = document.querySelector("#register-cus-phone");
const password = document.querySelector("#register-cus-pass");
const repassword = document.querySelector("#register-cus-re-pass");

const form = document.forms['create-cus'];

function showError(input,message){
    let parentElement = input.parentElement;
    let errorElement = parentElement.querySelector('.form-message');
    parentElement.classList.add("invalid");
    errorElement.innerText = message;
}
function Success(input){
    let parentElement = input.parentElement;
    let errorElement = parentElement.querySelector('.form-message');
    parentElement.classList.remove("invalid");
    errorElement.innerText = "";
}

function isrequired(input){
    let isRe = true;
    
    input.forEach(e => {
        if(!e.value.trim()){
            isRe =  false;
            showError(e,"Vui lòng nhập đầy đủ thông tin");
        }else{
            Success(e);
        }
    });
    return isRe;
}
function isrequireOnce(input){
    if(!input.value.trim()){
        showError(input,"Vui lòng nhập đầy đủ thông tin");
        return false;
    }else{
        Success(input);
        return true;
    }
}
function isEmail(input){
    let regex =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!regex.test(input.value)){
        showError(input,"Vui lòng nhập đúng cú pháp Email");
        return false;
    }else {
        Success(input);
        return true;
    }
}
function minLength(input, min){
    if(input.value.trim().length < min){
        showError(input,`mật khẩu phải có ít nhất ${min} ký tự`);
        return false;
    }else {
        Success(input);
        return true;
    }
}
function isConfirm(input1 , input2){
    if(input1.value.trim() === input2.value.trim()){
        Success(input2);
        return true;
    }else{
        showError(input2,`Mật khẩu nhập lại không đúng`);
        return false;
    }
}

function formsubmit() {
    form.submit();
}
form.addEventListener('submit',lastCheck);

function lastCheck(event){
    let checkRequired = isrequired([username,email,phone,password,repassword]);
    let checkEmail = isEmail(email);
    let checkpasslength = minLength(password,6);
    let checkPassConfirm = isConfirm(password,repassword);
    if(!checkRequired || !checkEmail || !checkpasslength || !checkPassConfirm){
        event.preventDefault();
    }
}


