let container = document.querySelector(".container");
let signUpAs = document.querySelector(".signUpAs");
let signUpAsElements = document.querySelectorAll(".signUpAs > div");
let tabBody = document.querySelector(".tabBody ");
let tabBodyElements = document.querySelectorAll(".tabBody > div");

for (let i = 0; i < signUpAsElements.length; i++) {
    signUpAsElements[i].addEventListener("click", function () {
        signUpAs.querySelector(".active").classList.remove("active");
        signUpAsElements[i].classList.add("active");
        tabBody.querySelector(".active").classList.remove("active");
        tabBodyElements[i].classList.add("active");
    });
}

let customer_form = document.querySelector(".customer_form");
let contractor_form = document.querySelector(".contractor_form");
let sign_customer = document.querySelector(".signUpAs .customer ");
let sign_contractor = document.querySelector(".signUpAs .contractor ");


sign_customer.addEventListener('click', function () {
    contractor_form.classList.add('hidden');
    customer_form.classList.add('show');
    customer_form.classList.remove('hidden');


});
sign_contractor.addEventListener('click', function () {
    customer_form.classList.add('hidden');
    contractor_form.classList.add('show');
    contractor_form.classList.remove('hidden');

});
