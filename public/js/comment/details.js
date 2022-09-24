var stars = document.querySelectorAll('.fa-star');
var maincontract = document.querySelector('.maincontract');
const removeStars = () => {
    Array.from(stars).forEach((star) => star.classList.remove('active_icon'));

};
stars.forEach((star) => {
    star.addEventListener('click', function () {
        removeStars();
        star.classList.add("active_icon");
        maincontract.classList.add("show_contract");
    });
});