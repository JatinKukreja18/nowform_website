window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    if(document.querySelector('.gallery')){
        let arrows = '<div class="nf-slider-navigation"/> <a class="nf-slider-left"></a> <a class="nf-slider-right"></a></div>';
        document.querySelector('.gallery').innerHTML +=arrows;
    }
});
function toggleMenu(){
    document.querySelector('.menu-toggle').classList.toggle('active');
    document.querySelector('.main-navigation').classList.toggle('mobile-active');
}
