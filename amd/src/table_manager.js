define(['jquery'], function($) {
    var selected_items = { "Keywords" : [], "applicationthemes" : [], "homepartnerinstitution" : [] };
    var perm;
    function ajax_select_call(datas) {
        $.ajax({
            method: "POST",
            url: "ajax_call.php",
            data: {mode: "select", datas: datas }
        })
        .done(function( msg ) {
            $("#table_data").empty();
            /* eslint-disable no-console */
                var obj = JSON.parse(msg);

                for (var rec in obj) {
                    var content_tab = $("#table_data").html()+"<tr class='line_table'>"+
                    "<td class='td_big'><a href='"+obj[rec]['researchinfrastructure']+"'.>"
                    +obj[rec]['researchinfrastructure'].substr(
                    obj[rec]['researchinfrastructure'].lastIndexOf("/")+1,
                    obj[rec]['researchinfrastructure'].lastIndexOf(".pdf")-
                    obj[rec]['researchinfrastructure'].lastIndexOf("/")-1)+
                    "</td>" +
                    "<td class='td_big'>"+obj[rec]['applicationthemes'].replaceAll('<>', '-')+"</td>"+
                    "<td class='td_big'>"+obj[rec]['keywords'].replaceAll('<>', '-')+"</td>"+
                    "<td class='td_big'>"+obj[rec]['homepartnerinstitution']+"</td>";

                    if (perm) {
                        content_tab = content_tab + '<td class="td_big"><span class="remove_rec" rec_id="'+obj[rec]['id']
                        +'"><i class="suppr icon fa fa-trash fa-fw " title="Supprimer" aria-label="Supprimer"></i></span></td>';
                    }

                    $("#table_data").html(content_tab);
                 }
            trash_event();
        });
    }
    function trash_event() {
        $(".remove_rec").click(function() {
            if(confirm("Are you sure?"))
            {
                var rec_id = $(this).attr("rec_id");
                $.ajax({
                    method: "POST",
                    url: "ajax_call.php",
                    data: { mode: "remove", rec_id: rec_id }
                })
                .done(function() {
                    ajax_select_call(selected_items);
                });
            }
        });

    }
    return {
        init: function(permission){ /* eslint-disable no-console  */
            perm = permission;
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

                    var datas  = selected_items;
                    ajax_select_call(datas);
            });

            trash_event();
        },
        progressive_disappear: function() {
            $("#message_confirmation").fadeOut(1500, function() { $("#message_confirmation").remove(); });
        }
    };
});