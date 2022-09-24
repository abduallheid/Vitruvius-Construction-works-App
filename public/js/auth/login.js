let landingImage=document.querySelector(".landing-page");
let imgArray=["937600.png","maxresdefault.jpg","Small-villas-designs-with-pictures.2.jpg","صورة-فيلا-باللون-الابيض.jpg"];
setInterval(function(){
    let randomNumber = Math.floor(Math.random() * imgArray.length);
    landingImage.style.backgroundImage='url("imgs/'+imgArray[randomNumber]+'")';

},10000);








