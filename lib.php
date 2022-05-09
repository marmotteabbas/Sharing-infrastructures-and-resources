<?php
defined('MOODLE_INTERNAL') || die();

function block_h_infra_rsc_pluginfile($course, $birecord, $context, $filearea, $args, $forcedownload, $sendfileoptions) {
    global $CFG, $DB, $COURSE;
    require_once("$CFG->libdir/resourcelib.php");

    if ($context->contextlevel != CONTEXT_BLOCK) {
        return false;
    }

    if ($filearea !== 'content') {
        // intro is handled automatically in pluginfile.php
        return false;
    }

    $item_id = $args[0];
    array_shift($args); // ignore revision - designed to prevent caching problems only

    $fs = get_file_storage();
    $relativepath = implode('/', $args);
    $fullpath = rtrim("/$context->id/block_h_infra_rsc/$filearea/".$item_id."/$relativepath", '/');
    do {
        if (!$file = $fs->get_file_by_hash(sha1($fullpath))) {
            if ($fs->get_file_by_hash(sha1("$fullpath/."))) {
                if ($file = $fs->get_file_by_hash(sha1("$fullpath/index.htm"))) {
                    break;
                }
                if ($file = $fs->get_file_by_hash(sha1("$fullpath/index.html"))) {
                    break;
                }
                if ($file = $fs->get_file_by_hash(sha1("$fullpath/Default.htm"))) {
                    break;
                }
            }
            $resource = $DB->get_record('resource', array('id'=>$birecord->instance), 'id, legacyfiles', MUST_EXIST);
            if ($resource->legacyfiles != RESOURCELIB_LEGACYFILES_ACTIVE) {
                return false;
            }
            if (!$file = resourcelib_try_file_migration('/'.$relativepath, $birecord->id, $birecord->course, 'mod_resource', 'content', 0)) {
                return false;
            }
            // file migrate - update flag
            $resource->legacyfileslast = time();
            $DB->update_record('resource', $resource);
        }
    } while (false);

    // should we apply filters?
 /*   $mimetype = $file->get_mimetype();
    if ($mimetype === 'text/html' or $mimetype === 'text/plain' or $mimetype === 'application/xhtml+xml') {
        $filter = $DB->get_field('resource', 'filterfiles', array('id'=>$birecord->instance));
        $CFG->embeddedsoforcelinktarget = true;
    } else {*/
        $filter = 0;
    //}

    // finally send the file
    send_stored_file($file, null, $filter, $forcedownload, /*$options*/array());
}

