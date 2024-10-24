const hamburger = document.querySelector("#hamburger");

hamburger.addEventListener('click', function(){
    document.querySelector("#sidebar").classList.toggle('expand')
})

const profil_btn = document.querySelector("#user_icon");

profil_btn.addEventListener('click', function(){
    document.querySelector("#userInfo").classList.toggle('d-none')
})
