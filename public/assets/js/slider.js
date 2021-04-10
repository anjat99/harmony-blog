$(document).ready(function () {
     let slideNumber = 1;
     showSlide(slideNumber);
 
     const s = selektor => document.querySelector(selektor);
     EventTarget.prototype.on = EventTarget.prototype.addEventListener;

     function giveClickEventToCircles(id, value){
         s(`#${id}`).addEventListener("click", ()=>{
             showSlide(slideNumber = `${value}`);
         })
     }

     giveClickEventToCircles("dot1", 1);
     giveClickEventToCircles("dot2", 2);
     giveClickEventToCircles("dot3", 3);
     giveClickEventToCircles("dot4", 4);
     giveClickEventToCircles("dot5", 5);
 
    
 
     function showSlide(n){
         let i;
         let slides = document.getElementsByClassName("slider__item");
         let circles = document.getElementsByClassName("circle");
 
         if(n > slides.length){
             slideNumber = 1;
         }
         if(n < 1){
             slideNumber = slides.length ;
         }
         for(i = 0; i < slides.length; i++){
             slides[i].style.display = "none";
         }
         for (i = 0; i < circles.length; i++) { 
             circles[i].className = circles[i].className. 
                                 replace(" active", ""); 
         } 
        let slideToShow = slides[slideNumber - 1];
        $(slideToShow).css({
            'display': 'flex',
            'flex-direction': 'column',
            'align-items': 'center'
         });
         circles[slideNumber - 1].className += " active"; 
     }

})