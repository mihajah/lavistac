$( document ).ready(function() {
   $('#isotope').imagesLoaded( function() {
      // images have loaded
      $('#isotope').isotope({
         // options
         itemSelector: '.col-sm-2',
         layoutMode: 'masonry'
      });
   });
});
