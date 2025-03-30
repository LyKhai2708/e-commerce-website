const cartbutton = document.querySelector("#cart .button");
const cartdrop = document.querySelector("#cart .cart-dropdown-wrapper");
cartbutton.addEventListener("click", () => {
    cartdrop.classList.toggle('acti');
})

const minus = document.querySelector(".button-minus");
const plus = document.querySelector(".button-plus");
const quantity = document.querySelector(".button-quantity input");
const idprohid = document.querySelector(".idprohidden");
// minus.addEventListener('click', ()=> {
//     if(quantity.value > 1){
//         quantity.value--;
//     }
// })
// plus.addEventListener('click', ()=> {
//     quantity.value++;
// })

