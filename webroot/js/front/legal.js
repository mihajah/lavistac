$(document).ready(function(){
	$('#legal').modal({
		backdrop : 'static',
		keyboard : false
	})
});

function accept(){
	$.ajax({
      type:'post',
      dataType:'json',
      url:'/legal'  ,
      success: function(data){
      }
   })
}

function refuse(){
	window.location.href = "https://google.com";
}
