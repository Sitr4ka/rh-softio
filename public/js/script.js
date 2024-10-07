const hamburger = document.querySelector("#hamburger");

hamburger.addEventListener('click', function(){
    document.querySelector("#sidebar").classList.toggle('expand')
})