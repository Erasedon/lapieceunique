const navLinks = document.getElementById('testres')

window.addEventListener('resize', function(){
    if (window.innerWidth > 600){
        navLinks.style.display = "flex"
        navBar.style.borderBottomLeftRadius = "0px"
        navBar.style.borderBottomRightRadius = "0px"
        toggleButton.classList.remove('open-hamburger')
    }
    if (window.innerWidth < 600){
        navLinks.style.display = "none"
        toggleButton.classList.remove('open-hamburger')
    }
})