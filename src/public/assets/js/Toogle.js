const bars = document.getElementById("menu-toogle");
const divToogle = document.getElementById("toogle-div");
const ulToogle = document.getElementById("list-ul");
const xis = document.getElementById("x-mark");

bars.addEventListener("click", function () {
    ulToogle.style.display = "block";
    xis.style.display = "block";
    divToogle.style.display = "none";
})

xis.addEventListener("click", function () {
    ulToogle.style.display = "none";
    divToogle.style.display = "block";
    xis.style.display = "none";

})