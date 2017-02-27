<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 18:14
 */

require_once('../../config.php');
require_once('add_form.php');

global $DB, $OUTPUT, $PAGE;


require_login();

$id_user = optional_param('id_user','', PARAM_INT);
$arr = new stdClass();
$arr->user = $id_user;
$select = "id = 1";

if($id_user){

    $arr->user_fullname = optional_param('face','', PARAM_INT);
    $arr->face = optional_param('face','', PARAM_INT);
    $arr->presentation = optional_param('presentation','', PARAM_INT);
    $arr->hitechnic = optional_param('hitechnic','', PARAM_INT);
    $arr->documents = optional_param('documents','', PARAM_INT);
    $arr->tmc = optional_param('tmc','', PARAM_INT);
    $arr->date = optional_param('date','', PARAM_INT);
    $arr->total_score = optional_param('total_score','', PARAM_INT);

    $shop_id = $DB->get_records_select('user',$select, null, null, 'department');

    $arr->shop = $shop_id->department;

    var_dump($shop_id);

//    if (!$DB->insert_record('local_korm', $arr)) {
//        print_error('updateerror', 'local_korm');
//    }

    echo $OUTPUT->notification('Сохранено');
}
echo "нельзя сохранять";


$PAGE->set_url('/local/korm/view.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('add_result', 'local_korm'));

$form = new add_form();
//$index = new moodle_url('/local/korm/index.php');

echo $OUTPUT->header();
$form->display();
echo $OUTPUT->footer();