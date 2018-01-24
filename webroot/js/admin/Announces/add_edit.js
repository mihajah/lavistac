$("#user-id").select2({
  ajax: {
    url: "/admin/users/auto-complete",
    dataType: 'json',
    data: function (params) {
      return {
        q: params.term, // search term
      };
    },
    processResults: function (data) {
      if(data){
        return {
          results: data.users
        };
      }else{
        return false;
      }

   },
    cache: false
  },
  minimumInputLength: 1,
});

$("#contract-id").select2({
  ajax: {
    url: "/admin/contracts/auto-complete",
    dataType: 'json',
    data: function (params) {
      return {
        q: params.term, // search term
      };
    },
    processResults: function (data) {
      if(data){
        return {
          results: data.contracts
        };
      }else{
        return false;
      }

   },
    cache: false
  },
  minimumInputLength: 1,
});

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

});
