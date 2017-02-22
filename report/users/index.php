<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 11:14
 */
require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');

admin_externalpage_setup('reportusers', '', null, '', array('pagelayout'=>'report'));


$users = $DB->get_records('user', null,null, 'firstname, lastname, email, department');

$table = new html_table();
$table->head = array('Имя', 'Фамилия', 'Почта', 'Подразделение');
$table->data = array();

$arr = array();
foreach ($users as $item)
{
    $arr[] = array($item->firstname, $item->lastname, $item->email, $item->department);
}

$table->data = $arr;

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string("pluginname", 'report_users'));
echo $OUTPUT->box_start();

//echo $OUTPUT->notification(get_string('pluginname', 'report_users'));
echo html_writer::table($table);

echo $OUTPUT->box_end();
echo $OUTPUT->footer();