const sbtn = document.querySelector('.sort-button');
const list = document.querySelector('.list_sort_wrapper');
const cursort= document.querySelector('.current_sort');
sbtn.addEventListener("click" , () => {
    list.classList.toggle('visible');
})
const sortChoosed = document.querySelectorAll(".list_sort_item");

const oldw= location.href;

// sortChoosed.forEach( element => {
//     element.addEventListener("click", () => {
//         let name = element.textContent;
//         console.log(name);
//         sortChoosed.forEach( e=> {
//             e.classList.remove("active");
//         })
//         element.classList.add("active");
//         cursort.innerHTML = name;
//     })
// })

