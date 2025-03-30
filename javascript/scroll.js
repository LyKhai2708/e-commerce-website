window.addEventListener("load", function(){
    this.window.scrollTo(0,0);
    const scrollback = document.querySelector(".button-scroll-back");
    this.addEventListener("scroll", ()=> {
        if(document.documentElement.scrollTop > 300) {
            scrollback.classList.add("appear");
        }else{
            scrollback.classList.remove("appear");
        }
    })
    scrollback.addEventListener("click", () =>{
        this.window.scrollTo(0,0);
    })
})