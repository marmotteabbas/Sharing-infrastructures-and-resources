<?php
    require_once(__DIR__.'/../../config.php');
    global $DB;

    if($_POST['mode'] == "select") {
        $where = "WHERE "; 
        foreach ($_POST['datas'] as $k => $sub_tab) {
            $i=0;
            $where .="(";
            foreach ($sub_tab as $st) {
                $i++;
                $where .= strtolower($k)." LIKE '%".$st."%' ";

                if (sizeof($sub_tab) == $i) {
                    $where .= ") AND ";
                } else {
                    $where .= "OR ";
                }
                
            }
            
        }
    
        $where = substr($where, 0, -5);
    
        $request = "SELECT * FROM {h_infra_src} ".$where;
        $rec_infra = $DB->get_records_sql($request, array());
        echo json_encode($rec_infra);

    } elseif ($_POST['mode'] == "remove")  {
        $DB->delete_records('h_infra_src', array('id' => $_POST['rec_id']));
    }

?>