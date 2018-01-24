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
