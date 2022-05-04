<?php
require_once(__DIR__.'/../../config.php');
global $COURSE, $DB;

$draftitemid = $_POST['files'];
$context_id = $_POST['id_context'];

$fs = get_file_storage();

if ($draftitemid) {
    $options = array('subdirs' => true, 'embed' => false);
        if ($data->display == RESOURCELIB_DISPLAY_EMBED) {
            $options['embed'] = true;
        }
    file_save_draft_area_files($draftitemid, $context_id, 'block_h_infra_rsc', 'content', 0, $options);
}
    $files = $fs->get_area_files($context_id, 'block_h_infra_rsc', 'content', 0, 'sortorder', false);
 
    if (count($files) == 1) {
        // only one file attached, set it as main file automatically
        $file = reset($files);
        file_set_sortorder($context_id, 'block_h_infra_rsc', 'content', 0, $file->get_filepath(), $file->get_filename(), 1);
    }

?>