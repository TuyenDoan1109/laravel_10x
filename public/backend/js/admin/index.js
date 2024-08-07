(function($) {
	"use strict";
	var DT = {}; 

    DT.getPerPage = () => {
        $(document).on('change', '#perPage', function(){
            // console.log(5555555);
            let perPage = $(this).val();
            $('#perPageForm').submit();          
        });
    };

    DT.getAdminGroup = () => {
        $(document).on('change', '#adminGroup', function(){
            // console.log(5555555);
            let adminGroup = $(this).val();
            $('#adminGroupForm').submit();          
        });
    };

    DT.getStatus = () => {
        $(document).on('change', '#status', function(){
            // console.log(5555555);
            let status = $(this).val();
            $('#statusForm').submit();          
        });
    };

    $(document).ready(function(){
        DT.getPerPage();
        DT.getAdminGroup();
        DT.getStatus();
	});

})(jQuery);


