define(['jquery'], function($) {
    var selected_items = { "Keywords" : [], "applicationthemes" : [], "homepartnerinstitution" : [] };
    return {
        init: function(){ /* eslint-disable no-console  */
            $(".cellule_research").click(function(e) {
                if (!e) {e = window.event;}

                if (e.ctrlKey) { // click + touche ctrl
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

                    if ($(this).attr("box") == "applicationthemes") {
                        if (selected_items.applicationthemes.includes($(this).html())) {
                            var myIndex = selected_items.applicationthemes.indexOf($(this).html());
                            if (myIndex !== -1) {
                                selected_items.applicationthemes.splice(myIndex, 1);
                            }
                        } else {
                            selected_items.applicationthemes.push($(this).html());
                        }
                    }

                    if ($(this).attr("box") == "institution") {
                        if (selected_items.homepartnerinstitution.includes($(this).html())) {
                            var myIndex = selected_items.homepartnerinstitution.indexOf($(this).html());
                            if (myIndex !== -1) {
                                selected_items.homepartnerinstitution.splice(myIndex, 1);
                            }
                        } else {
                            selected_items.homepartnerinstitution.push($(this).html());
                        }
                    }

                } else { //simple click
                    if ($(this).attr("box") == "Keywords") {

                        selected_items.homepartnerinstitution = [];
                        selected_items.homepartnerinstitution.length = 0;

                        selected_items.applicationthemes = [];
                        selected_items.applicationthemes.length = 0;

                        if (selected_items.Keywords.includes($(this).html()) && selected_items.Keywords.length ==1) {
                            selected_items.Keywords = [];
                            selected_items.Keywords.length = 0;
                        } else {
                            selected_items.Keywords = [$(this).html()];
                        }
                    }

                    if ($(this).attr("box") == "institution") {

                        selected_items.applicationthemes = [];
                        selected_items.applicationthemes.length = 0;

                        selected_items.Keywords = [];
                        selected_items.Keywords.length = 0;

                        if (selected_items.homepartnerinstitution.includes($(this).html())
                        && selected_items.homepartnerinstitution.length ==1) {
                            selected_items.homepartnerinstitution = [];
                            selected_items.homepartnerinstitution.length = 0;
                        } else {
                            selected_items.homepartnerinstitution = [$(this).html()];
                        }
                    }

                    if ($(this).attr("box") == "applicationthemes") {

                        selected_items.Keywords = [];
                        selected_items.Keywords.length = 0;

                        selected_items.homepartnerinstitution = [];
                        selected_items.homepartnerinstitution.length = 0;

                        if (selected_items.applicationthemes.includes($(this).html())
                        && selected_items.applicationthemes.length ==1) {
                            selected_items.applicationthemes = [];
                            selected_items.applicationthemes.length = 0;
                        } else {
                            selected_items.applicationthemes = [$(this).html()];
                        }
                    }
                }


              //console.log(selected_items);

              // if ($(this).attr("box") == "Keywords") {
                    if (!e.ctrlKey) {
                        $(".cellule_research"/*".cellule_keyword"*/).css("background-color", "rgb(68, 162, 272)");

                        if ($(this).attr("box") == "applicationthemes") {
                            $(".cellule_homepartnerinstitution").css("background-color","rgb(68, 114, 196)");
                            $(".cellule_keyword").css("background-color","rgb(68, 114, 196)");
                        }

                        if ($(this).attr("box") == "institution") {
                            $(".cellule_keyword").css("background-color","rgb(68, 114, 196)");
                            $(".cellule_applicationthemes").css("background-color","rgb(68, 114, 196)");
                        }

                        if ($(this).attr("box") == "Keywords") {
                            $(".cellule_homepartnerinstitution").css("background-color","rgb(68, 114, 196)");
                            $(".cellule_applicationthemes").css("background-color","rgb(68, 114, 196)");
                        }

                        //--//
                        if (selected_items.applicationthemes.length == 0) {
                            $(".cellule_applicationthemes").css("background-color","#4472c4");
                        } else {
                            if ($(this).css("background-color") == "rgb(68, 114, 196)") {
                                $(this).css("background-color", "rgb(68, 162, 272)");
                            } else {
                                $(this).css("background-color","#4472c4");
                            }
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

                        if (selected_items.homepartnerinstitution.length == 0) {
                            $(".cellule_homepartnerinstitution").css("background-color","#4472c4");
                        } else {
                            if ($(this).css("background-color") == "rgb(68, 114, 196)") {
                                $(this).css("background-color", "rgb(68, 162, 272)");
                            } else {
                                $(this).css("background-color","#4472c4");
                            }
                        }

                    } else {
                        var box = "";
                        if ($(this).attr("box") == "Keywords") {
                            box = "keyword";
                        }

                        if ($(this).attr("box") == "applicationthemes") {
                            box = "applicationthemes";
                        }

                        if ($(this).attr("box") == "institution") {
                            box = "homepartnerinstitution";
                        }

                        // I know ... that's shit
                        if (box == "keyword") {
                            var box_selected_items = "Keywords";
                        } else {
                            var box_selected_items = box;
                        }

                        if (selected_items[box_selected_items].length == 0) {
                            $(".cellule_"+box).css("background-color", "rgb(68, 114, 196)");
                        } else {
                            $(".cellule_"+box).css("background-color", "rgb(68, 162, 272)");
                            $(".cellule_"+box).each(function( /*index*/ ) {

                                var html = $( this ).html();
                                var elemeuh = $(this);

                                if (box == "keyword") {
                                    box = "Keywords";
                                }

                                if (box == "institution") {
                                    box = "homepartnerinstitution";
                                }

                                selected_items[box].forEach(function(element) {

                                    if (element == html) {
                                        elemeuh.css("background-color","rgb(68, 114, 196)");
                                    }
                                    console.log(element+" "+html);
                                });
                            });
                        }

                    }
                    console.log(selected_items);

                //}

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