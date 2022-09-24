
// start accept class
document.querySelectorAll("li a").forEach(function (l) {
    l.addEventListener("click", function () {
        document.querySelector(".accept").classList.remove("accept");
        l.classList.add("accept");

    })
});
// start header
function myNav() {
    let bar = document.getElementById("bar");
    let nav = document.querySelector(".navigation");

    bar.onclick = () => {
        if (nav.style.right == "0%") {
            nav.style.right = "-100%";
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

// start dark mode
let check = document.getElementById("check");
let road = document.querySelector(".road-map");
if (localStorage.getItem("darkMode") === null) {
    localStorage.setItem("darkMode", "false");
}
checkstatus();
function checkstatus() {
    if (localStorage.getItem("darkMode") === "true") {
        check.checked = true;
        document.body.style.cssText = "color:white;background-color:#212121e6";
        check.classList = "fa-solid fa-sun";
        document.querySelector(".gog").style.color = "color:var(--bg-color)";
    } else {
        check.checked = false;
        document.body.style.cssText = "color:black; background-color:#fff";
        check.classList = "fa-solid fa-moon";
        document.querySelector(".gog").style.color = "color:var( --tex-color)";
    };
};

// start btn1 icon
let btn1 = document.getElementById("btn1");
window.onscroll = function () {
    if (scrollY >= 400) {
        btn1.style.display = "flex";
    } else {
        btn1.style.display = "none";

    }
}
btn1.addEventListener("click", function () {
    scroll({
        top: 0,
        left: 0,
        behavior: "smooth"
    })
});
function changeStatus() {
    if (localStorage.getItem("darkMode") === "true") {
        localStorage.setItem("darkMode", "false");
        document.body.style.cssText = "color:black; background-color:#fff";
        check.classList = "fa-solid fa-moon";
        document.querySelector(".gog").style.color = "color:var(--bg-color)";


    } else {
        localStorage.setItem("darkMode", "true");
        document.body.style.cssText = "color:#fff;background-color:#212121e6";
        check.classList = "fa-solid fa-sun";
        document.querySelector(".gog").style.color = "color:var( --tex-color)";




    };
};
// start video
function myVideo() {
    let links = document.querySelector(".link");
    let overs = document.querySelector(".bg-show .overlay");
    let exit = document.querySelector(".ico .fa-x");
    let videos = document.getElementById("video");
    links.onclick = (ed) => {
        ed.preventDefault();
        overs.style.display = "block";
    }
    exit.onclick = () => {
        overs.style.display = "none";
        videos.pause();
    }
}
myVideo();

// start about us
let imgs = document.querySelectorAll(".about-us .container .img img");
imgs.forEach((e) => {
    e.addEventListener("click", function (ele) {
        let overlay = document.createElement("div");
        overlay.className = "overlay";
        document.body.appendChild(overlay);
        let poupop = document.createElement("div");
        poupop.className = "pop";
        let button = document.createElement("span");
        button.className = "span";
        let textButton = document.createTextNode("x");
        button.appendChild(textButton);
        poupop.appendChild(button);
        let imgp = document.createElement("img");
        imgp.className = "imgo";
        poupop.appendChild(imgp);
        imgp.src = e.src;
        document.body.appendChild(poupop);
    });
    document.addEventListener("click", (eleme) => {
        if (eleme.target.className == "span") {
            eleme.target.parentNode.remove();
            document.querySelector(".overlay").remove();
        };
    });

});

// start change imgs as color

let myimg = document.querySelector(".landing .container .text img ");
let imgMobile = document.querySelector(".app .container img ");
let main = document.getElementById("main");
let second2 = document.getElementById("second2");
let three3 = document.getElementById("three3");
let four4 = document.getElementById("four4");
let five5 = document.getElementById("five5");
let sex6 = document.getElementById("sex6");
window.onload = function () {
    localStorage.picture ? myimg.src = localStorage.picture : "";
};
window.addEventListener("load", () => {
    localStorage.app ? imgMobile.src = localStorage.app : "";
});

main.addEventListener("click", () => {
    myimg.src = "image-home/myon.svg";
    localStorage.setItem("picture", "image-home/myon.svg");
    imgMobile.src = "image-home/mainapp.svg";
    localStorage.setItem("app", "image-home/mainapp.svg");
});
second2.addEventListener("click", () => {
    myimg.src = "image-home/second2.svg";
    localStorage.setItem("picture", "image-home/second2.svg");
    imgMobile.src = "image-home/mobile2.svg";
    localStorage.setItem("app", "image-home/mobile2.svg");
});
three3.addEventListener("click", () => {
    myimg.src = " image-home/three3.svg";
    localStorage.setItem("picture", " image-home/three3.svg");
    imgMobile.src = " image-home/mobile3.svg";
    localStorage.setItem("app", " image-home/mobile3.svg");
});
four4.addEventListener("click", () => {
    myimg.src = " image-home/four4.svg";
    localStorage.setItem("picture", " image-home/four4.svg");
    imgMobile.src = " image-home/mobile4.svg";
    localStorage.setItem("app", " image-home/mobile4.svg");
});
five5.addEventListener("click", () => {
    myimg.src = " image-home/fiveim.svg";
    localStorage.setItem("picture", " image-home/fiveim.svg");
    imgMobile.src = " image-home/mobile5.svg";
    localStorage.setItem("app", " image-home/mobile5.svg");
});
sex6.addEventListener("click", () => {
    myimg.src = " image-home/sex6.svg";
    localStorage.setItem("picture", " image-home/sex6.svg");
    imgMobile.src = " image-home/mobile6.svg";
    localStorage.setItem("app", " image-home/mobile6.svg");
});

// start color
let lis = document.querySelectorAll(" header .mode .color li");
lis.forEach((e) => {
    e.addEventListener("click", (ele) => {
        document.documentElement.style.setProperty("--main-color", ele.target.dataset.color);
        localStorage.setItem("color-option", ele.target.dataset.color);
        document.querySelector(".set").classList.remove("set");
        e.classList.add("set");
    });
});
document.querySelectorAll(" header .mode .color li").forEach((ele) => {
    ele.addEventListener("click", (imgColor) => {
        imgColor = ele.target.dataset.color;
    });
});
let mainColor = localStorage.getItem("color-option");
if (mainColor !== null) {
    document.documentElement.style.setProperty("--main-color", mainColor);
};
//  start icon  for drop down

