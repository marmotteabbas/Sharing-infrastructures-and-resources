<?php
    require_once(__DIR__.'/../../config.php');
    global $DB;
    $request = "SELECT * FROM {h_infra_src} WHERE ".strtolower($_POST['box'])." LIKE '%".$_POST['content_html']."%'";
    $rec_infra = $DB->get_records_sql($request, array());
    echo json_encode($rec_infra);
    //die ($_POST['content_html']." ".$_POST['box']);
?>