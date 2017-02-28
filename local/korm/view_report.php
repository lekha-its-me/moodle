<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 18:10
 */

require_once('../../config.php');
require_once('query_form.php');
//require_once($CFG->libdir . '/adminlib.php');
require_login();

date_default_timezone_set('Europe/Kiev');

$query = new query_form();

$query_str = optional_param('query','', PARAM_INT);

if($query_str!=1){
    $users = $DB->get_records('local_korm');
}
else {
    $from = optional_param('date_from','', PARAM_INT);
    $to = optional_param('date_to','', PARAM_INT);
    $df = mktime(0,0,0,$from['month'],$from['day'],$from['year']);
    $dt = mktime(0,0,0,$to['month'],$to['day'],$to['year']);


    $select = 'date>='.$df.' and date <= ' .$dt;
    echo $select;
    $users = $DB->get_records_select('local_korm', $select);
}

$table = new html_table();
$table->head = array('Магазин', 'Сотрудник','Дата проверки', 'Общий балл', 'Внешний вид магазина', 'Презентация', 'Департамент HT', 'Документация', 'Сохранность ТМЦ');
$table->data = array();

$arr = array();
foreach ($users as $item)
{
    $arr[] = array($item->shop, $item->user_fullname, date('d.m.Y',$item->date), $item->total_score, $item->face, $item->presentation, $item->hitechnic, $item->documents, $item->tmc);
}
$table->data = $arr;

$PAGE->set_url(new moodle_url('/local/korm/view_report.php'));
echo $PAGE->set_heading(get_string("pluginname", 'local_korm'));
echo $OUTPUT->header();
$query->display();


echo $OUTPUT->box_start();
//echo $OUTPUT->notification(get_string('pluginname', 'report_users'));
echo html_writer::table($table);
echo $OUTPUT->box_end();
echo $OUTPUT->footer();