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

date_default_timezone_set('UTC');// определение таймзоны, необходимо для функции mktime()

$id_user = optional_param('id_user','', PARAM_INT);
$arr = new stdClass();
$arr->user = $id_user;
$select = "id = ".$id_user;

//если передан параметр id пользователя сохраняем данные в таблицу
if($id_user){

    $arr->user_fullname = optional_param('fullname', '', PARAM_TEXT);
    $arr->face = optional_param('face','', PARAM_INT);
    $arr->presentation = optional_param('presentation','', PARAM_INT);
    $arr->hitechnic = optional_param('hitechnic','', PARAM_INT);
    $arr->documents = optional_param('documents','', PARAM_INT);
    $arr->tmc = optional_param('tmc','', PARAM_INT);

    $get_date = optional_param('date','', PARAM_INT);

    $new_date = mktime(0,0,0, $get_date['month'],$get_date['day'],$get_date['year']);

    $arr->date = $new_date;
    $arr->total_score = optional_param('countTotalScore','', PARAM_INT);

    $shop_id = $DB->get_record_select('user', $select, null,'department');

    $arr->shop = $shop_id->department;

    if (!$DB->insert_record('local_korm', $arr)) {
        print_error('updateerror', 'local_korm');
    }
    redirect(new moodle_url('/local/korm/index.php'), 'Сохранено успешно!');

    echo $OUTPUT->notification('Сохранено');
}
else {
    echo "нельзя сохранять";
}


$PAGE->set_url('/local/korm/view.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('add_result', 'local_korm'));

$form = new add_form();
//$index = new moodle_url('/local/korm/index.php');

echo $OUTPUT->header();
$form->display();
echo $OUTPUT->footer();