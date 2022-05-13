define(['jquery'], function($) {
    return {
        init: function(){
            $(".cellule_research").click(function() {
                var content_html  = $(this).html();
                var box  = $(this).attr("box");
                $.ajax({
                    method: "POST",
                    url: "ajax_call.php",
                    data: { box: box, content_html: content_html }
                })
                .done(function( msg ) {
                    alert( "Data Saved: " + msg );
                });
            });
        }
    };
});