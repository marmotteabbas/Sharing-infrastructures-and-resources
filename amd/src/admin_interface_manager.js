define(['jquery'], function($) {
    function show_hide_additional_keywords() {
        if($("#fitem_id_aditionnalkeywords").is(":visible")) {
            $("#fitem_id_aditionnalkeywords").css("display","none");
        } else {
            $("#fitem_id_aditionnalkeywords").css("display","-webkit-box");
        }
    }

    return {
        init: function(){
            $("#addikeywords").click(function() {
                show_hide_additional_keywords();
              });
        }
    };
});