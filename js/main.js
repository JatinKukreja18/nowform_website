// (function(){
//     const Http = new XMLHttpRequest();
//     const url='http://localhost:8888/nowformwebsite/wp-json/wp/v2/work?per_page=2';
//     Http.open("GET", url);
//     Http.send();

//     Http.onreadystatechange = (e) => {
//     console.log(JSON.parse(Http.responseText))
//     }
// }())
var $j = jQuery.noConflict();

$j(function(){

    $j("#sidebar li a").hover(function(){
    	$j(this).stop().animate({
    		paddingLeft: "20px&"
    	}, 400);
    }, function() {
    	$j(this).stop().animate({
    		paddingLeft: 0
    	}, 400);
    });

});
console.log($j);

var hasPassed = false;

$j(document).ready(function(){
    console.log(new Plyr('#player'));
    if(document.querySelectorAll('.wp-block-coblocks-gallery-carousel').length){
        var allCoblockGalleries = document.querySelectorAll('.wp-block-coblocks-gallery-carousel');
        console.log(allCoblockGalleries);
        
        for (let i = 0; i < allCoblockGalleries.length; i++) {
            const element = allCoblockGalleries[i];
            element.id="restructured-gallery-" + i;
            console.log(!$j('#' + element.id +" .flickity-page-dots"));
            
            // data-stuff='["some", "string", "here"]'
            // var images= [];
            // var allSlides = element.querySelectorAll('.coblocks-gallery--item');
            // for (let j = 0; j < allSlides.length; j++) {
            //     const el = allSlides[j];
            //     console.log(el.querySelector('img').src);
            //     images.push(el.querySelector('img').src);
            // }
            // console.log(this);
            if($j('#' + element.id +" .flickity-page-dots")){
                console.log($j('#' + element.id +" .flickity-page-dots").appendTo("#" + element.id));
                setTimeout(() => {
                    $j('#' + element.id +" .flickity-page-dots").appendTo("#" + element.id);
                }, 0);
            }
            $j( '<a class="gallery-showall" onClick="openGalleryModal('+ i +')">Show All</a>' ).insertAfter( "#" + element.id );
        }
    }
    
})
var activeReq = false;
function loadNextSet(value,isLoading,category){
    if(isLoading){
        $j('.nf-work-loadmore h2').html('Loading..');
        $j('.nf-work-loadmore h2').addClass('loading');
    }
    if(currentPage > lastPage && (document.querySelectorAll('.nf-work-card').length%4 == 0) && !activeReq){
        activeReq = true;
        const Http = new XMLHttpRequest();
        const url='https://www.nowform.co/wp-json/wp/v2/'+ category + '?per_page=' + 4 + '&page=' + currentPage +'&_embed&orderby=menu_order&order=asc';
        Http.open("GET", url);
        Http.send();
        Http.onload = (e) => {
            if(Http.responseText.length > 0){
                const dataArray = JSON.parse(Http.responseText);
                var dataItems = "";
     
                $j.each(dataArray, function(i,item){
                    var thumbnailimage;
                    var fullimage;
                    if(item._embedded["wp:featuredmedia"]){
                        // item._embedded["wp:featuredmedia"] = [{"source_url":''}];
                        if(item._embedded["wp:featuredmedia"]["0"].media_details.sizes.large){
                            fullimage = item._embedded["wp:featuredmedia"]["0"].media_details.sizes.large.source_url
                        }else{
                            fullimage = item._embedded["wp:featuredmedia"]["0"].source_url
                        }
                        if(item._embedded["wp:featuredmedia"]["0"].media_details.sizes.thumbnail){
                            thumbnailimage = item._embedded["wp:featuredmedia"]["0"].media_details.sizes.thumbnail.source_url
                        }else{
                            thumbnailimage = item._embedded["wp:featuredmedia"]["0"].source_url
                        }
                    }else{
                        thumbnailimage = '';
                        fullimage = '';
                    }
                    if(item.id){
                        dataItems += `<div class="col-md-6">
                                         <article id="post-${item.id}">
                                            <div class="nf-work-card">
                                                <div class="nf-work-hover-block">
    
                                                <a class="image-wrapper" href="${item.link}"?>
                                                <img class="work-image "
                                                    data-src="${thumbnailimage}"
                                                    src="${fullimage}" alt="" >
                                                </a>
                                                <div class="content-wrapper">
                                                    <span class="category">
                                                       ${item['_embedded']['wp:term'][0][0].name}
                                                    </span>
                                                    <a href="${item.link}"?>
                                                    <h1 class="work-title">
                                                    ${item.title.rendered}
                                                    </h1>
                                                    </a>
                                                    <div class="work-summary">${item.excerpt.rendered}</div>
                                                </div>	
        
                                            </div><!-- .entry-content -->
        
                                    <!-- <footer class="entry-footer"> -->
                                        <!-- <php nowform_elegance_entry_footer(); > -->
                                    <!-- </footer> -->
                                    <!-- .entry-footer -->
                                </article><!-- #post-<?php the_ID(); ?> -->
        
                            </div>`;
                    }
                    else if(item = 'rest_post_invalid_page_number'){
                        $j('.nf-work-loadmore').remove();
                    }
                    // setTimeout(() => {
                    //     $(`#post-${item.id} img.blurred`).on('load', function(){
                    //             $('[data-src]').each(function(){
                    //               var $this = $(this),
                    //                   src = $(this).data('src');
                    //                   if($this.attr('data-src') != $this.attr('src')){
                    //                       $this.attr('src', src);
                    //                     }
                    //                     else if($this.attr('data-src') == $this.attr('src')){
                    //                         $this.removeClass('blurred');
                    //                         $this.unbind();
                    //                   }
                    //             });
                    //       });;
                    // }, 1);
                    // setTimeout(() => {
                    //     console.log('in here');
                        
                    //     $(`#post-${item.id} img`).on('load', function(){
                    //             console.log($(this).addClass('lazyloaded'));
                                
                    //       });;
                    // }, 1);
                })
                $j('#add-here').append( dataItems );
                var checkLoad = setInterval(() => {
                    var postcontainer = document.querySelector('#add-here');
                    if(postcontainer.children.length > 0 ){
                        clearInterval(checkLoad);
                        console.log('child loaded');
                        for (let i = 0; i < postcontainer.children.length; i++) {
                            postcontainer.children[i].querySelector('img').classList.add('lazyloaded')
                        }
                    }
                }, 100);
                hasPassed = false;
                if(isLoading){
                    $j('.nf-work-loadmore h2').html('Load more');
                    $j('.nf-work-loadmore h2').removeClass('loading');
                }
                lastPage = currentPage;
                currentPage += 1;
                activeReq = false;
    
                if(Http.getResponseHeader("x-wp-totalpages") < currentPage){
                    $j('.nf-work-loadmore').addClass('end');
                }
            }
        }
    }
    
}

function getHours(hrs){
    if((hrs % 12 ) >0){
        return hrs % 12
    }else{
        return 12
    }
}
function getMinutes(min){
    if(min.length != 2){
        return "0" + min
    }else{
        return min
    }
}
// function loadPage(){
//     document.querySelector('.nf-logo').classList.add('loading')
// }
// function restructureGallery(){

//     if($('.swiper-pagination-bullet')){
//         const allSlideshows = $('.swiper-pagination-bullet');

//         for (let i = 0; i < allSlideshows.length; i++) {
//             const element = allSlideshows[i];
//             console.log(
//             element.querySelectorAll('button'));
//         }
//     }
//     const allGallery = document.querySelectorAll('.gallery');
//     const allBlockGallery = document.querySelectorAll('.wp-block-gallery');
//     if(allGallery && allGallery.length > 0 ){
        
//         for (let i = 0; i < allGallery.length; i++) {
//             const element = allGallery[i];
            
//             // `element` is the element you want to wrap
//             var parent = element.parentNode;
//             var wrapper = document.createElement('div');
//             wrapper.setAttribute('class', 'gallery-wrapper');
//             // set the wrapper as child (instead of the element)
//             parent.replaceChild(wrapper, element);
//             // set element as child of wrapper
//             wrapper.appendChild(element);
//             let arrows = '<div class="nf-slider-navigation"/> <a class="nf-slider-left" data-target="'+ element.id + '" onClick="scrollToLeft(this)"></a> <a class="nf-slider-right" data-target="'+ element.id + '" onClick="scrollToRight(this)"></a></div>';
//             var allSlides = document.querySelectorAll(element.id + ' .gallery-item').length;
//             let info = '<div class="nf-slider-info"/> <span class="nf-slider-count"><span class="current-slide">1</span> of ' + allSlides + '</span> <a class="nf-slider-show-link" data-target="'+ element.id + '" onClick="openGalleryModal(this)">Show all</a></div>';
            
//             wrapper.innerHTML +=info;
//             wrapper.innerHTML +=arrows;
//         }
         
        
//     } 

//     if(allBlockGallery && allBlockGallery.length > 0 ){
//         for (let i = 0; i < allBlockGallery.length; i++) {
//             const element = allBlockGallery[i];
            
//             // `element` is the element you want to wrap
//             var parent = element.parentNode;
//             var wrapper = document.createElement('div');
//             wrapper.setAttribute('class', 'gallery-wrapper');
//             // set the wrapper as child (instead of the element)
//             parent.replaceChild(wrapper, element);
//             // set element as child of wrapper
//             wrapper.appendChild(element);
//             let arrows = '<div class="nf-slider-navigation"/> <a class="nf-slider-left" data-target="'+ element.id + '" onClick="scrollToLeft(this)"></a> <a class="nf-slider-right" data-target="'+ element.id + '" onClick="scrollToRight(this)"></a></div>';
//             var allSlides = document.querySelectorAll(element.id + ' .gallery-item').length;
//             let info = '<div class="nf-slider-info"/> <span class="nf-slider-count"><span class="current-slide">1</span> of ' + allSlides + '</span> <a class="nf-slider-show-link" data-target="'+ element.id + '" onClick="openGalleryModal(this)">Show all</a></div>';
            
//             wrapper.innerHTML +=info;
//             wrapper.innerHTML +=arrows;
//         }
//     }
// }
function scrollToLeft(value){
    document.getElementById(value.dataset.target).scrollLeft -= document.querySelector("#gallery-1 img").width;
}
function scrollToRight(value){
    document.getElementById(value.dataset.target).scrollLeft += document.querySelector("#gallery-1 img").width;
}
function openGalleryModal(v){  
    console.log(v);
    
    var images= [];
    document.querySelector('.nf-gallery-modal-body').innerHTML = '';
    var allImages = document.querySelector('#restructured-gallery-' + v).querySelectorAll('img');
    for (let j = 0; j < allImages.length; j++) {
    //     const el = allSlides[j];
    //     console.log(el.querySelector('img').src);
        console.log(allImages[j]);
        document.querySelector('.nf-gallery-modal-body').innerHTML += '<img class="gallery-item" src="'+ allImages[j].src + '"/>';

    }
    // console.log(this);
    // if(!)
    // document.querySelector('.nf-gallery-modal').innerHTML += '<a class="nf-modal-cross" onClick="closeModal(this)"></a>';
    document.querySelector('.nf-gallery-modal').classList.add('collapsing');
    document.querySelector('body').style.overflow = 'hidden';
    setTimeout(() => {
        document.querySelector('.nf-gallery-modal').classList.add('in')      
        document.querySelector('.nf-gallery-modal').classList.remove('collapsing')      
    }, 0);

    document.scrollingElement.style.overflow = 'hidden'; 
}
function closeModal(el){

    document.querySelector('body').style.overflow = 'auto';
    document.querySelector('.nf-gallery-modal').classList.add('collapsing');
    setTimeout(() => {
        document.querySelector('.nf-gallery-modal').classList.remove('in');        
        document.querySelector('.nf-gallery-modal').classList.remove('collapsing');        
    }, 500);
    document.scrollingElement.style.overflow = 'auto';
}
function isWorkPage(){
    loadNextSet(currentPage,true,'work');
    $j(window).scroll(function(event) {
        if(document.scrollingElement.scrollTop > (document.querySelector('.nf-footer').offsetTop - window.innerHeight - 200)){
            loadNextSet(currentPage,true,'work');      
        }
    });
}
function isHomePage(){
    $j(window).scroll(function(event) {
        if(!hasPassed && document.scrollingElement.scrollTop > (document.querySelector('.nf-footer').offsetTop - window.innerHeight - 400)){
            console.log(event);
            loadNextSet(currentPage,true,'posts');     
            hasPassed = true 
        }
    });
}
function isJournalPage(){
    loadNextSet(currentPage,true,'journal');
    $j(window).scroll(function(event) {
        if(document.scrollingElement.scrollTop > (document.querySelector('.nf-footer').offsetTop - window.innerHeight - 200)){
            loadNextSet(currentPage,true,'journal');      
        }
    });
}
var currentPage = 2;
var lastPage = 0;
window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
        // var currentPath = window.location.pathname;
        // if(currentPath.slice(currentPath.length - 6 , currentPath.length).indexOf('work') > -1){
        //     loadNextSet(currentPage,true,'work');
        // }
        // if(currentPath.slice(currentPath.length - 8 , currentPath.length).indexOf('journal') > -1){
        //     loadNextSet(currentPage,true,'journal');
        // }

    if(document.querySelector('#india-time')){
        function startTime() {
            var date = new Date();
            var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
            var am_pm = date.getHours() >= 12 ? "PM" : "AM";
            hours = hours < 10 ? "0" + hours : hours;
            hours = hours == "00" ? "12":hours;
            var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
            var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
            timeString = hours + ":" + minutes  + " " + am_pm;
    
            document.querySelector('#india-time').innerHTML = timeString;
            setTimeout(startTime, 500);
        }
       startTime();
    }
    
      function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
      }
    // for about page
            if(document.querySelector('.about')){
                document.querySelector('.about-arrow').classList.add('active')
            }

    // for work page
    // restructureGallery();
});


(function($) {

    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *     the user visible viewport of a web browser.
     *     only accounts for vertical position, not horizontal.
     */
  
    $.fn.visible = function(partial) {
      
        var $t            = $j(this),
            $w            = $j(window),
            viewTop       = $w.scrollTop(),
            viewBottom    = viewTop + $w.height(),
            _top          = $t.offset().top,
            _bottom       = _top + $t.height(),
            compareTop    = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;
      
      return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
  
    };
      
  })(jQuery);
  
 $j(window).scroll(function(event) {
    
   $j("img").each(function(i, el) {
      var el =$j(el);
      if (el.visible(true)) {
        el.addClass("fadeIn"); 
      } 
    //   else {
    //     el.removeClass("fadeIn");
    //   }
    });
    // if(document.scrollingElement.scrollTop > (document.querySelector('.nf-footer').offsetTop - window.innerHeight - 200)){
    //     var currentPath = window.location.pathname;
    //     if(currentPath.slice(currentPath.length - 6 , currentPath.length).indexOf('work') > -1){
    //         loadNextSet(currentPage,true,'work');
    //         // currentPage +=1;
    //     }
    //     if(currentPath.slice(currentPath.length - 8 , currentPath.length).indexOf('journal') > -1){
    //         loadNextSet(currentPage,true,'journal');
    //         // currentPage +=1;
    //     }
    // }
  });
let oldScroll = document.scrollingElement.scrollTop;
window.addEventListener('scroll', (event) => {
    // window.addEventListener("scroll",function(){
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

    // });
    if(document.querySelector('#project-title-block')){
        let projectTitle = document.querySelector('#project-title-block');
                if(document.scrollingElement.scrollTop > (document.querySelector('.work-wrapper').offsetHeight + document.querySelector('.work-wrapper').offsetTop - window.innerHeight)){
                    if(!projectTitle.classList.contains('absolute')){
                        const bottomValue = window.innerHeight - (document.querySelector('#project-title-block').offsetTop + document.querySelector('#project-title-block').offsetHeight);
                        projectTitle.style.bottom = bottomValue + 'px';
                        projectTitle.classList.add('absolute');
                        
                        console.log(window.innerHeight - (document.querySelector('#project-title-block').offsetTop + document.querySelector('#project-title-block').offsetHeight));
                
            }
        }
        else{
            projectTitle.classList.remove('absolute');
            projectTitle.style.bottom = 'unset';
        }
    }

    if(document.querySelector('#fixed-title-block')&& window.innerHeight >767){
        let projectTitle = document.querySelector('#fixed-title-block');
        if(document.scrollingElement.scrollTop > (document.querySelector('#why-nowform').offsetTop )){
            if(!projectTitle.classList.contains('absolute')){
                projectTitle.classList.add('is-fixed');
                document.querySelector('#unfixed-content-block').classList.add('is-fixed');
                console.log(document.querySelector('#why-nowform').offsetHeight - window.innerHeight);
                
                // projectTitle.classList.add('absolute');
                
                // console.log(window.innerHeight - (document.querySelector('#fixed-title-block').offsetTop + document.querySelector('#fixed-title-block').offsetHeight));
        
            }
        }
        else{
            projectTitle.classList.remove('is-fixed');
            document.querySelector('#unfixed-content-block').classList.remove('is-fixed');
        }
    }
});
function toggleMenu(){
    document.querySelector('.menu-toggle').classList.toggle('active');
    document.querySelector('.main-navigation').classList.toggle('mobile-active');
    document.querySelector('body').classList.toggle('noScroll');
}
function validateSub(el,event,bool){
    event.preventDefault();
    console.log(validateEmail(el.value));
    
    if(bool && validateEmail(el.value)){
        // document.querySelector('.subscription-error').innerHTML = 'Please Enter valid email';
        document.querySelector('.subscription-error').classList.remove('active')
    }else{
        document.querySelector('.subscription-error').innerHTML = 'Please Enter valid email';
        document.querySelector('.subscription-error').classList.add('active')
        // console.log(el.setCustomValidity('Please Enter valid email'));
        // this.setCustomValidity('Please Enter valid email')
    }
}
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }