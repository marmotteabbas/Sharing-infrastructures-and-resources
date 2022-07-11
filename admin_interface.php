<?php
require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/course/moodleform_mod.php');

require_once($CFG->dirroot.'/blocks/h_infra_rsc/admin_form.php');

echo "<link href='style/style.css' rel='stylesheet' type='text/css' />";

$title = "Add and manange sharing infrastructures and resources";

$PAGE->set_pagelayout('report');
$PAGE->set_url('/blocks/h_infra_rsc/admin_interface.php', array());
//$PAGE->set_title("Sharing infrastructures and resources");
$PAGE->set_heading($title);

if (isset($_GET['rec'])) {
    if ($_GET['rec'] == 1) {
        echo "<div id='message_confirmation' style='position: absolute;top: 50px;z-index: 3;left: 50%;font-size: 1.2em;padding:2px;background-color: papayawhip'>New Infrastructure Added</div>";
        $PAGE->requires->js_call_amd('block_h_infra_rsc/table_manager', 'progressive_disappear', array());
    }
}
$instance = $DB->get_record('block_instances', array('id' => $_GET['instance_id']));
$categorycontext = context::instance_by_id($instance->parentcontextid);
$addpermission = has_capability('block/h_infra_rsc:addinstance', $categorycontext);

if ($addpermission == false) {
    throw new moodle_exception("Et bah non ! T'as pas le droit ! ", 'Access not allowed');
}

echo $OUTPUT->header();

$admin_form_h_infra_form = new admin_form_h_infra_form(new moodle_url($CFG->wwwroot."/blocks/h_infra_rsc/submit_datas_form.php"));
$admin_form_h_infra_form->set_id_context_field($_GET['id_context'], $_GET['instance_id']);

$admin_form_h_infra_form->display();

//var_dump($admin_form_h_infra_form);

echo $OUTPUT->footer();