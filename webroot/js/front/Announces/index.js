// quick search regex

$( document ).ready(function() {
   var qsRegex;

   var $grid  = $('#isotope').imagesLoaded( function() {
      // images have loaded
      $('#isotope').isotope({
         // options
         itemSelector: '.col-md-3',
         layoutMode: 'masonry',
         filter: function() {
            return qsRegex ? $(this).text().match( qsRegex ) : true;
         }
      });
   });

   var $quicksearch = $('#keyword').keyup( debounce( function() {
     qsRegex = new RegExp( $quicksearch.val(), 'gi' );
     $grid.isotope();
   }, 200 ) );


});



// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}


function reloadIndex(state, cat){
   window.location="/"+cat+"/"+state;
}

function reloadIndexCity(city,state, cat){
   window.location="/"+cat+"/"+state+"/"+city;
}
