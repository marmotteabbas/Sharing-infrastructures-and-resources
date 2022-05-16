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
                    $("#table_data").empty();
                    /* eslint-disable no-console */
                        var obj = JSON.parse(msg);

                        for (var rec in obj) {
                            console.log(obj[rec]);
                            console.log(obj[rec]['researchinfrastructure']);
                            $("#table_data").html($("#table_data").html()+"<tr>"+
                            "<td>"+obj[rec]['researchinfrastructure']+"</td>"+
                            "<td>"+obj[rec]['applicationthemes']+"</td>"+
                            "<td>"+obj[rec]['keywords']+"</td>"+
                            "<td>"+obj[rec]['homepartnerinstitution']+"</td>");
                         }

                        console.log(obj);
                 //   alert( "Data Saved: " + msg );
                });
            });
        }
    };
});