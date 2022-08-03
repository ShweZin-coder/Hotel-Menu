AOS.init();

let searchBtn = document.querySelector("#search-btn");
let searchForm = document.querySelector(".header .search-form");
let menuToggle = document.querySelector(".menutoggle");
let filterClose = document.querySelector("#filterclose");
let filter = document.querySelector("#filter");
let menuBtn = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header .navbar");
menuBtn.onclick = () =>{
    menuBtn.classList.toggle("fa-times");
    navbar.classList.toggle("active");
    searchBtn.classList.remove("fa-times");
    searchForm.classList.remove("active");
}

window.onscroll = () => {
    searchBtn.classList.remove("fa-times");
    searchForm.classList.remove("active");
    menuBtn.classList.remove("fa-times");
    navbar.classList.remove("active");
}
/* menu detail js */
document.querySelectorAll('.viewmenu').forEach(img =>
    {
       img.onclick = () =>{
          document.querySelector('#detailedimg').src = img.getAttribute('src');
       }
      
    
    });
searchBtn.onclick = () =>{
    searchBtn.classList.toggle("fa-times");
    searchForm.classList.toggle("active");
    menuBtn.classList.remove("fa-times");
    navbar.classList.remove("active");
}
// Popup product
document.querySelectorAll('.cartbtn').forEach(cartbtn =>
    {
       cartbtn.onclick = () =>{
          document.querySelector('.popup-menu').style.display = 'block';
          document.querySelector('.popup-menu img').src = cartbtn.getAttribute('menu-image');
          document.querySelector('.popup-menu p .name').innerHTML = cartbtn.getAttribute('menu-name');
          document.querySelector('.popup-menu p .price').innerHTML= cartbtn.getAttribute('menu-price');
       }
      
    
    });
    document.querySelector('.popup-menu span').onclick = () => {
       document.querySelector('.popup-menu').style.display = 'none';
    }
 
menuToggle.onclick = () =>{
    filter.style.display = "block";
}
filterClose.onclick = () =>{
    filter.style.display = "none";
}