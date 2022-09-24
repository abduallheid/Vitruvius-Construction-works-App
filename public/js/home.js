
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




document.querySelectorAll("li a").forEach(function (l) {
    l.addEventListener("click", function () {
        document.querySelector(".accept").classList.remove("accept");
        l.classList.add("accept");
    })
})

let lis = document.querySelectorAll(".colors ul li");


lis.forEach((e) => {
    e.addEventListener("click", (ele) => {
        document.documentElement.style.setProperty("--main-color", ele.target.dataset.color);
        localStorage.setItem("color-option", ele.target.dataset.color);
        document.querySelector(".set").classList.remove("set");
        e.classList.add("set");

    })

})
let mainColor = localStorage.getItem("color-option");
if (mainColor !== null) {
    document.documentElement.style.setProperty("--main-color", mainColor);
}

let acceptClass = document.querySelectorAll(".navigation .ul li.accept");
acceptClass.forEach(element => {
    element.classList.remove("accept");
    element.addEventListener("click", (e) => {
        e.target.classList.add("accept");
    })
});



let mysection = document.querySelector(".section .container .text");
window.addEventListener("scroll", function () {
    if (this.scrollY >= 200) {
        mysection.style.cssText = "margin-top:0px";

    } else {
        mysection.style.cssText = "margin-top:200px";
    }
});

let i = 0, text;
text = "Welcome To Vitruvius ";
function typing() {
    if (i < text.length) {
        document.getElementById("text").innerHTML += text.charAt(i);
        i++;
        setTimeout(typing, 200);
    }

}
typing();

let btn1 = document.getElementById("btn1");
window.onscroll = function () {
    if (scrollY >= 200) {
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

// start about
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

    })
    document.addEventListener("click", (eleme) => {
        if (eleme.target.className == "span") {
            eleme.target.parentNode.remove();
            document.querySelector(".overlay").remove();
        };
    });

});
let mood = document.querySelector("header .mode i");

mood.addEventListener("click", (eo) => {
    document.body.classList.toggle("dark");
    if (document.body.classList.contains("dark")) {
        mood.classList = "fa-solid fa-sun";

    } else {
        mood.classList = "fa-solid fa-moon";

    }
})
