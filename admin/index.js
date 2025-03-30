//product
const cells = document.querySelectorAll('.truncanted');
    
    for (const cell of cells) {
        console.log(cell.clientWidth);
      if (cell.scrollWidth = cell.clientWidth) {
        const maxLength = 10; // Define your desired truncation length (excluding ellipsis)
        cell.textContent = cell.textContent.substring(0, maxLength) + '...';
      }
    }


//toggle modal 
const btnadd= document.querySelector(".btn-add");
const modal = document.querySelector(".modal");
const closebtn = document.querySelector('.modal_close');

btnadd.addEventListener("click", () => modal.classList.toggle("m-hidden"));
closebtn.addEventListener("click",() => modal.classList.toggle("m-hidden"));

function Sure(){
  let text = "Việc xóa sản phẩm có thể dẫn tới mất dữ liệu ở phía khách , bạn chắc chứ?";
  if(confirm(text) == true){
    return true;
  }else {
    return false;
  }
}

btncat = document.getElementById("category_sort");

btncat.addEventListener("click", () => {
    document.getElementById("category_sort_list").classList.toggle("show");
})



//xóa đơn hàng 
function sureOd() {
  let text = "Bạn có chắc hủy đơn hàng này chứ ?";
  if(confirm(text) == true){
    return true;
  }else{
    return false;
  }
}
