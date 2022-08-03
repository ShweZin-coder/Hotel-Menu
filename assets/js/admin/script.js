const sideMenu = document.querySelector("aside");
const palette = document.querySelector(".palette");
const menuBtn = document.querySelector("#menu-item");
const closeBtn = document.querySelector("#close-btn");
const themeBtn = document.querySelector("#theme-btn");
const themeToggler = document.querySelector(".theme-toggler");
const themePalette = document.querySelector(".theme-palette");
const firsttheme = document.querySelector(".firsttheme");
const secondtheme = document.querySelector(".secondtheme");
const thirdtheme = document.querySelector(".thirdtheme");

// show Menu
menuBtn.addEventListener('click',() => 
{
    sideMenu.classList.remove("hideNav");
    sideMenu.style.display= 'block';
})
// show Palette
themePalette.addEventListener('click',() => 
{
    palette.classList.remove("hideNav");
    palette.style.display= 'block';
})
//hide Menu
closeBtn.addEventListener('click',() =>{
    sideMenu.classList.add("hideNav");
})
//hide Palette
themeBtn.addEventListener('click',() =>{
    palette.classList.add("hideNav");
})
//change Theme
themeToggler.addEventListener('click',() =>{
    document.body.classList.toggle('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})
//change  First Theme
firsttheme.addEventListener('click',() =>{
    document.body.classList.add('first-theme');
    document.body.classList.remove('second-theme');
    document.body.classList.remove('third-theme');
})
//change  Second Theme
secondtheme.addEventListener('click',() =>{
    document.body.classList.remove('first-theme');
    document.body.classList.add('second-theme');
    document.body.classList.remove('third-theme');
})
//change  Third Theme
thirdtheme.addEventListener('click',() =>{
    document.body.classList.remove('first-theme');
    document.body.classList.remove('second-theme');
    document.body.classList.add('third-theme');
})