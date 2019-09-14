function restructureGallery(){
    if(document.querySelectorAll('.gallery') && document.querySelectorAll('.gallery').length > 0 ){
        
        for (let i = 0; i < document.querySelectorAll('.gallery').length; i++) {
            const element = document.querySelectorAll('.gallery')[i];
            
            // `element` is the element you want to wrap
            var parent = element.parentNode;
            var wrapper = document.createElement('div');
            wrapper.setAttribute('class', 'gallery-wrapper');
            // set the wrapper as child (instead of the element)
            parent.replaceChild(wrapper, element);
            // set element as child of wrapper
            wrapper.appendChild(element);
            let arrows = '<div class="nf-slider-navigation"/> <a class="nf-slider-left" data-target="'+ element.id + '" onClick="scrollToLeft(this)"></a> <a class="nf-slider-right" data-target="'+ element.id + '" onClick="scrollToRight(this)"></a></div>';
            var allSlides = document.querySelectorAll(element.id + ' .gallery-item').length;
            let info = '<div class="nf-slider-info"/> <span class="nf-slider-count"><span class="current-slide">1</span> of ' + allSlides + '</span> <a class="nf-slider-show-link" data-target="'+ element.id + '" onClick="openGalleryModal(this)">Show all</a></div>';
            
            wrapper.innerHTML +=info;
            wrapper.innerHTML +=arrows;
        }
         
        
    } 
}
function scrollToLeft(value){
    document.getElementById(value.dataset.target).scrollLeft -= document.querySelector("#gallery-1 img").width;
}
function scrollToRight(value){
    document.getElementById(value.dataset.target).scrollLeft += document.querySelector("#gallery-1 img").width;
}
function openGalleryModal(v){  
    document.querySelector('.nf-gallery-modal').innerHTML = document.querySelector('#' + v.dataset.target).outerHTML;
    document.querySelector('.nf-gallery-modal').innerHTML += '<a class="nf-modal-cross" onClick="closeModal(this)" data-target="'+ v.dataset.target + '"></a>';
    document.querySelector('.nf-gallery-modal').classList.add('collapsing');
    setTimeout(() => {
        document.querySelector('.nf-gallery-modal').classList.add('in')      
        document.querySelector('.nf-gallery-modal').classList.remove('collapsing')      
    }, 0);

    document.scrollingElement.style.overflow = 'hidden'; 
}
function closeModal(el){
    document.querySelector('.nf-gallery-modal').classList.add('collapsing');
    setTimeout(() => {
        document.querySelector('.nf-gallery-modal').classList.remove('in');        
        document.querySelector('.nf-gallery-modal').classList.remove('collapsing');        
    }, 500);
    document.scrollingElement.style.overflow = 'auto';
}
window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    restructureGallery();
});



window.addEventListener('scroll', (event) => {
    let oldScroll = document.scrollingElement.scrollTop;
    window.addEventListener("scroll",function(){
        if(document.scrollingElement.scrollTop > 150){
            document.querySelector(".nf-header").classList.add('scrolled');
        }else{
            document.querySelector(".nf-header").classList.remove('scrolled');
        }

        if(oldScroll < document.scrollingElement.scrollTop){
            document.querySelector(".nf-header").classList.remove('slide');
        }
        else{
            document.querySelector(".nf-header").classList.add('slide');
        }
        
        oldScroll = document.scrollingElement.scrollTop;

    });
});
function toggleMenu(){
    document.querySelector('.menu-toggle').classList.toggle('active');
    document.querySelector('.main-navigation').classList.toggle('mobile-active');
}
