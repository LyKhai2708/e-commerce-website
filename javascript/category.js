window.addEventListener("load", function() {
    //category
    const btnCat = document.getElementById('button-cat');
    const dropdowns = document.querySelector('.dropdown-category');
    const categorymain = document.querySelectorAll('.category-content .main');
    const category = document.querySelector('.category-content');
    const wrapdropdowncontent = document.querySelector('.dropdown-content')
    const dropdowncontent = [...document.getElementsByClassName('cat')];
    btnCat.addEventListener('click', function(){
        dropdowns.classList.toggle('visible');
    });
    dropdowncontent.forEach(item => {item.addEventListener("mouseover",display)})
    function display(event) {
        let i = dropdowncontent.indexOf(event.target);
        if(i != -1) {
            categorymain.forEach(e => {
                e.classList.remove('activesubcategory');
            })
            categorymain[i].classList.toggle('activesubcategory');  
        }
        category.classList.add('activesubcatwrap');
        wrapdropdowncontent.classList.add('activesub');
    }
    dropdowns.addEventListener('mouseleave', () => {
        categorymain.forEach(e => {
            e.classList.remove('activesubcategory');
        })
        category.classList.remove('activesubcatwrap');
        wrapdropdowncontent.classList.remove('activesub');
    })
    // let x1 = dropdowns.getBoundingClientRect();
    // let x2 = category.getBoundingClientRect();
    // console.log(x1);
    /*this.document.addEventListener('mousemove', (event) => {
        
        
        if(event.clientX > x1.x || event.clientY > x1.y  && event.clientX > x2.x || event.clientY > x2.y){
            categorymain.forEach(e => {
                e.classList.remove('activesubcategory');
                category.classList.remove('activesubcatwrap');
            })
        }

    })*/
})
    