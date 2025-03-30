const oldpass= document.getElementById('user-old-pass');
const newpass= document.getElementById('user-new-pass');
const renewpass= document.getElementById('user-re-new-pass');
const changepassForm = document.forms['changepass_form'];
changepassForm.addEventListener('submit', checkPass);

function checkPass(event){
    let checkpass = minLength(oldpass,6);
    let checkConfirm = isConfirm(newpass,renewpass);
    if(!checkRequired || !checkpass || !checkConfirm){
        event.preventDefault();
    }
}