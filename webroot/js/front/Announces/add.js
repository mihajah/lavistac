$('#state-id').change(function(){
   var state_id=$(this).val();
   $('#cities-ids').empty();
   $.ajax({
      type:'get',
      dataType:'json',
      url:'/getCities/'+state_id  ,
      async:false,
      success: function(data){
         for( var i in data.cities)
         {
            $("<option value='" + i + "'>" + data.cities[i] + "</option>").appendTo('#cities-ids');
         }
      }
   })
});

$("#cities-ids").select2({
   maximumSelectionLength: 5
});
