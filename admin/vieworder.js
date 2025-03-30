const btnview = document.querySelectorAll('.button-view');
btnview.forEach(e => e.addEventListener("click",() => modal.classList.toggle("m-hidden")));

const orderdetail = document.getElementById("detail_order");
function Loadorder(id) {
   let req = new XMLHttpRequest();
     req.onreadystatechange = function() {
     if(req.readyState==4 && req.status==200) {
        orderdetail.innerHTML = req.responseText ;
      }
   }
   req.open("GET","getdetail.php?id=" +id,true);
   req.send();
}
const closeb = document.querySelector('.modal .modal_close');
closeb.addEventListener("click",() => modal.classList.toggle("m-hidden"));
