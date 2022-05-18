define(['jquery'], function($) {
    var selected_items = { "Keywords" : [] };
    return {
        init: function(){ /* eslint-disable no-console  */
            $(".cellule_research").click(function(e) {
                if (!e) {e = window.event;}

                if (e.ctrlKey) {
                    if ($(this).attr("box") == "Keywords") {

                        if (selected_items.Keywords.includes($(this).html())) {
                            var myIndex = selected_items.Keywords.indexOf($(this).html());
                            if (myIndex !== -1) {
                                selected_items.Keywords.splice(myIndex, 1);
                            }
                        } else {
                            selected_items.Keywords.push($(this).html());
                        }
                    }

                } else {
                    if ($(this).attr("box") == "Keywords") {
                        if (selected_items.Keywords.includes($(this).html()) && selected_items.Keywords.length ==1) {
                            selected_items.Keywords = [];
                            selected_items.Keywords.length = 0;
                        } else {
                            selected_items.Keywords = [$(this).html()];
                        }
                       // selected_items.Keywords = [$(this).html()];
                    }
                }


              //  console.log(selected_items);

                if ($(this).attr("box") == "Keywords") {
                    if (!e.ctrlKey) {
                        $(".cellule_keyword").css("background-color", "rgb(68, 162, 272)");
                    }

                    if (selected_items.Keywords.length == 0) {
                        $(".cellule_keyword").css("background-color","#4472c4");
                    } else {
                        if ($(this).css("background-color") == "rgb(68, 114, 196)") {
                            $(this).css("background-color", "rgb(68, 162, 272)");
                        } else {
                            $(this).css("background-color","#4472c4");
                        }
                    }
                }

                var datas  = selected_items;//$(this).html();

                $.ajax({
                    method: "POST",
                    url: "ajax_call.php",
                    data: {/* box: box,*/ datas: datas }
                })
                .done(function( msg ) {
                    $("#table_data").empty();
                    /* eslint-disable no-console */
                        var obj = JSON.parse(msg);

                        for (var rec in obj) {
                         /*   console.log(obj[rec]);
                            console.log(obj[rec]['researchinfrastructure']);*/
                            $("#table_data").html($("#table_data").html()+"<tr>"+
                            "<td><a href='"+obj[rec]['researchinfrastructure']+"'.>"
                            +obj[rec]['researchinfrastructure'].substr(
                            obj[rec]['researchinfrastructure'].lastIndexOf("/")+1,
                            obj[rec]['researchinfrastructure'].lastIndexOf(".jpg")-
                            obj[rec]['researchinfrastructure'].lastIndexOf("/")-1)+
                            "</td>" +
                            "<td>"+obj[rec]['applicationthemes']+"</td>"+
                            "<td>"+obj[rec]['keywords']+"</td>"+
                            "<td>"+obj[rec]['homepartnerinstitution']+"</td>");
                         }

                      //  console.log(obj);
                 // alert( "Data Saved: " + msg );
                });
            });
        }
    };
});