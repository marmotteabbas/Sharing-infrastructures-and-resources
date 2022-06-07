<?php
    require_once(__DIR__.'/../../config.php');
    global $DB;

    if($_POST['mode'] == "add") {
        $where = "WHERE "; 
        foreach ($_POST['datas'] as $k => $sub_tab) {
    
            foreach ($sub_tab as $st) {
                $where .= strtolower($k)." LIKE '%".$st."%' ";
                $where .= "OR ";
            }
            
        }
    
        $where = substr($where, 0, -4);
    
        $request = "SELECT * FROM {h_infra_src} ".$where;
        $rec_infra = $DB->get_records_sql($request, array());
        echo json_encode($rec_infra);

    } elseif ($_POST['mode'] == "remove")  {
        $DB->delete_records('h_infra_src', array('id' => $_POST['rec_id']));
    }

?>