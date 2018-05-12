/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.8.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.8/admin/
*/


var handleJqueryAutocomplete = function() {
     $.ajax({
        url : "author/get_authors",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
             var availableTags = [data];
        $('#jquery-autocomplete').autocomplete({
            source: availableTags
        });

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
               
            }
        });

   
};


var FormPlugins = function () {
	"use strict";
    return {
        //main function
        init: function () {
			
			handleJqueryAutocomplete();
		
        }
    };
}();