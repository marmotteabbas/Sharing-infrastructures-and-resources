<?php
require_once(__DIR__.'/../../config.php');
global $COURSE, $DB, $CFG;

/* Get the last list ID */
$last_id = $DB->get_record_sql("SELECT id FROM {h_infra_src} ORDER BY id DESC LIMIT 1");

if ($last_id == false) {
    $last_id = 1;
} else {
    $last_id = $last_id->id + 1;
}

/* Store File */

$draftitemid = $_POST['files'];
$context_id = $_POST['id_context'];

$fs = get_file_storage();

if ($draftitemid) {
    $options = array('subdirs' => true, 'embed' => false);
        if ($data->display == RESOURCELIB_DISPLAY_EMBED) {
            $options['embed'] = true;
        }
    file_save_draft_area_files($draftitemid, $context_id, 'block_h_infra_rsc', 'content', $last_id, $options);
}

$files = $fs->get_area_files($context_id, 'block_h_infra_rsc', 'content', $last_id, 'sortorder', false);
 
if (count($files) == 1) {
    // only one file attached, set it as main file automatically
    $file = reset($files);
    file_set_sortorder($context_id, 'block_h_infra_rsc', 'content', $last_id, $file->get_filepath(), $file->get_filename(), 1);
}

/* Convert Application Theme in String */
$at = "";
if(is_array($_POST['application_theme'])) {
    foreach ($_POST['application_theme'] as $k) {
        $at .= $k. "<>";
    }
}

$at = substr($at, 0, -2);

/* Convert keywords in String */
$kws = "";

if(is_array($_POST['keywords'])) {
    foreach ($_POST['keywords'] as $k) {
        $kws .= $k. "<>";
    }
}

$kws = substr($kws, 0, -2);

/* Insert in table */

$ins = (object)array(
'researchinfrastructure' => get_file_infra_url($last_id), 
'applicationthemes' => $at,
'keywords' => $kws,
'homepartnerinstitution' => $_POST['homepartnerinstitution']
);

$ins->id = $DB->insert_record('h_infra_src', $ins);


// Here because I can't requiere_once, I don't know why yet ...
function get_file_infra_url($last_id) {
    global $CFG;
    $fs = get_file_storage();
    $files = $fs->get_area_files($_POST['id_context'], 'block_h_infra_rsc', 'content', $last_id, 'sortorder', false);

    $file = reset($files);

    $path = '/'.$_POST['id_context'].'/block_h_infra_rsc/content/'.$last_id.$file->get_filepath().$file->get_filename();
 
    return $CFG->wwwroot."/pluginfile.php".$path;
}

  header('Location: '.$CFG->wwwroot.'/blocks/h_infra_rsc/admin_interface.php?instance_id='.$_POST['instance_id'].'&id_context='.$_POST['id_context'].'&rec=1');
  exit();

?>