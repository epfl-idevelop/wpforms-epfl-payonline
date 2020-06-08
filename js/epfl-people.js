// console.log("epfl-people.js");
// 




function callMyAction(searchNeedle) {
  var data = {
      'action': 'my_action',
      'searchNeedle': searchNeedle,
      'id': 123
  };

  // This does the ajax request
  jQuery.ajax({
    method: 'POST',
    url: ajaxurl,
    data: {
      'action': 'my_action',
      'searchNeedle': searchNeedle,
    },
    success: function(response) {
      // This outputs the result of the ajax request
      console.log(response.data.displayname[0]);
      jQuery( '#epfl-people-response' ).html("<pre>" + response.data.displayname[0] + " &lt;" + response.data.mail[0] + "&gt; #" + response.data.uniqueidentifier[0] + "<pre>")
    },
    error: function(errorThrown){
      console.error(errorThrown);
    }
  });
}

jQuery( "#epfl-people-check" ).click(function() {
  searchNeedle = jQuery( '.wpforms-epfl-payonline-people').val();
  callMyAction(searchNeedle);
  return false;
});
// jQuery(document).ready(function($) {
// 
//     // We'll pass this variable to the PHP function example_ajax_request
//     var fruit = 'Banana';
// 
//     // This does the ajax request
//     $.ajax({
//         method: 'POST',
//         url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
//         data: {
//             'action': 'my_action',
//             'fruit' : fruit
//         },
//         success:function(data) {
//             // This outputs the result of the ajax request
//             console.log(data);
//         },
//         error: function(errorThrown){
//             console.log(errorThrown);
//         }
//     });  
// });