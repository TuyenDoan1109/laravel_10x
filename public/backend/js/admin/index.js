(function($) {
	"use strict";
	var DT = {}; 

    DT.getPerPage = () => {
        $(document).on('change', '#perPage', function(){
            $('#perPageForm').submit();          
        });
    };

    DT.getGroupAdmin = () => {
        $(document).on('change', '#groupAdmin', function(){
            $('#groupAdminForm').submit();          
        });
    };

    DT.getStatus = () => {
        $(document).on('change', '#status', function(){
            $('#statusForm').submit();          
        });
    };

    $(document).ready(function(){
        DT.getPerPage();
        DT.getGroupAdmin();
        DT.getStatus();
	});

})(jQuery);


