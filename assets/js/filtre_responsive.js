const filtredesktop = document.getElementById('filtredesktop')
const filtretel = document.getElementById('filtretel')

window.addEventListener('resize', function(){
    if (window.innerWidth > 600){
        filtredesktop.style.display = "flex"
        filtretel.style.display = "none"
    }
    if (window.innerWidth < 600){
        filtredesktop.style.display = "none"
        filtretel.style.display = "flex"
    }
})