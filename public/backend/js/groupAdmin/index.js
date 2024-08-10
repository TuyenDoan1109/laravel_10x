(function($) {
	"use strict";
	var DT = {}; 

    DT.getPerPage = () => {
        $(document).on('change', '#perPage', function(){
            let perPage = $(this).val();
            $('#perPageForm').submit();          
        });
    };

    DT.getStatus = () => {
        $(document).on('change', '#status', function(){
            let status = $(this).val();
            $('#statusForm').submit();          
        });
    };

    $(document).ready(function(){
        DT.getPerPage();
        DT.getStatus();
	});

})(jQuery);


