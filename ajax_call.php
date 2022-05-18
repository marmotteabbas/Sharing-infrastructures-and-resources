<?php
    require_once(__DIR__.'/../../config.php');
    global $DB;

    $where = "WHERE "; 
    foreach ($_POST['datas'] as $k => $sub_tab) {

        foreach ($sub_tab as $st) {
            $where .= strtolower($k)." LIKE '%".$st."%' ";
            $where .= "AND ";
        }
        
    }

    $where = substr($where, 0, -5);

    $request = "SELECT * FROM {h_infra_src} ".$where;
    $rec_infra = $DB->get_records_sql($request, array());
    echo json_encode($rec_infra);
?>