
function myNav() {
    let bar = document.getElementById("bar");
    let nav = document.querySelector(".navigation");

    bar.onclick = () => {
        if (nav.style.right == "0%") {
            nav.style.right = "-50%";
            bar.classList = "fas fa-bars";
            header.classList.add("active")
            bar.style.cssText = "margin-left:12px";
            bar.style.cssText = "transform: rotate(180deg)";



        } else {
            nav.style.right = "0%";
            bar.classList = "fa-solid fa-xmark";
            bar.style.cssText = "margin-left:16px";
        }
    }
} myNav();

function sayHeader() {
    let header = document.getElementById("header");
    window.addEventListener("scroll", function () {
        if (this.window.scrollY > 0) {
            header.classList.add("active")
        }
        else {
            header.classList.remove("active")
        }
    })
} sayHeader();

// Set Active Link
const links = document.querySelectorAll(".navigation  a");
const removeLine = () => {
    Array.from(links).forEach((link) => link.classList.remove('accept'));
};

links.forEach((link) => {

    const val = link.getAttribute("value");
    if (val == document.title) {
        removeLine();
        link.classList.add("accept");
    }

});

// ======================  Notification  ===========================

var notify_icon_2 = document.querySelector('.notify_icon_2');
var pop_up_notify_2 = document.querySelector('.pop_up_notify_2');

notify_icon_2.addEventListener('click', function () {
    pop_up_notify_2.classList.toggle("show");
});
