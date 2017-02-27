<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 17:17
 */
require_once(dirname(__FILE__) . '/../../config.php');

$PAGE->set_url(new moodle_url('/local/korm/index.php')/*,
        array('name' => $name)*/);
$PAGE->set_title(get_string('pluginname', 'local_korm'));
$PAGE->set_heading('Результаты КОРМ');

echo $OUTPUT->header();

echo ('<div class="box generalbox modal modal-dialog modal-in-page show">');
echo ('<div class="box modal-content"><div class="box modal-header">');
echo ('<p>'. get_string("boxtitle", "local_korm"). '</p>');
echo ('</div>');
echo ('<div class="box modal-body">');

echo ('<div style="text-align: center">');

echo html_writer::start_tag('a', array('class'=>'btn btn-primary', 'href'=> new moodle_url("/local/korm/view.php")));
echo get_string("btn_add", "local_korm");
echo html_writer::end_tag('a');
echo (' ');
echo html_writer::start_tag('a', array('class'=>'btn btn-primary', 'href'=> new moodle_url("/local/korm/delete.php")));
echo get_string("btn_report", "local_korm");
echo html_writer::end_tag('a');

echo ('</div');

echo ('</div>');
echo ('</div>');




echo $OUTPUT->footer();