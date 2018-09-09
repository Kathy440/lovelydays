$(document).ready(function () {


    $('#book_author').autocompleter({
      url_list: '/location_search',
      url_get: '/location_get/'
  });

  
  }); 
    