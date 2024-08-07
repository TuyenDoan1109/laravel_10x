(function($) {
	"use strict";
	var DT = {}; 

    DT.getDistrict = () => {
        $(document).on('change', '#province', function(){
            let provinceId = $(this).val();
            $.ajax({
                url: '/ajax/getDistrict/' + provinceId,
                type: 'get',
                dataType: 'json',
                success: function(res) {
                    $('#district').html(res.html);

                    let html = '<option value="">--Chọn Phường / Xã--</option>';
                    $('#ward').html(html);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });            
        });
    };

    DT.getWard = () => {
        $(document).on('change', '#district', function(){
            let districtId = $(this).val();
            $.ajax({
                url: '/ajax/getWard/' + districtId,
                type: 'get',
                dataType: 'json',
                success: function(res) {
                    $('#ward').html(res.html);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });            
        });
    };

    $(document).ready(function(){
        DT.getDistrict();
        DT.getWard();
	});

})(jQuery);


