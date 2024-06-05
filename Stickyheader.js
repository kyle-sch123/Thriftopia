window.onscroll = function(){myFunction()};

var header = document.getElementById("MyHeader");

var sticky = header.offsetTop;

function myFunction(){
    if (window.pageYOffset > sticky){
        header.classList.add("sticky");
        document.getElementById("MyHeader").style.opacity= 80;
    }
    else{
        header.classList.remove("sticky");
        header.style.cssText ='background-color: #EEE0BA;opacity: 75%;display: flex;justify-content: space-between;align-items: center;'
    }
}