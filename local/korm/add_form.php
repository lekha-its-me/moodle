<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 18:10
 */

require_once("{$CFG->libdir}/formslib.php");




class add_form extends moodleform {



    function definition() {
        global $DB, $PAGE, $CFG;
//        $user_list = $DB->get_records('user', null,null, 'id, lastname, firstname, department');
//        $for_select = array();
//        foreach ($user_list as $item) {
//            $for_select[] = $item->id => $item->lastname. ' ' . $item->firstname;
//        }

        $fields = 'id, alternatename';
        $user_list = $DB->get_records_menu('user', null, null, $fields);


        $mform =& $this->_form;
//      $mform->addElement('header','displayinfo', get_string('add_result', 'local_korm'));

        $mform->addElement('select', 'user_fullname', get_string('user', 'local_korm'), $user_list);
//        $mform->setType('id', PARAM_RAW);
//        $mform->disabledIf('id', 'id', 'eq', 3);
//        $mform->addRule('title', null, 'required', null, 'title');


        $PAGE->requires->js_amd_inline('
        require(["jquery"], function($) {
                $("#id_user_fullname").change(function(){
                    $("#id_user").val( $("#id_user_fullname").val()); 
                    $("#fullname").val( $("#id_user_fullname option:selected").text());
                });
            });
        ');

//        $PAGE->requires->js_amd_inline('
//        function countScore($){
////  totalScore = parseInt($("#face").val()) + parseInt($("#presentation").val()) + parseInt($("#hitechnic").val()) + parseInt($("#documents").val()) +
////    parseInt($("#tmc").val());
////
////  $("#total_score").val(totalScore);
////alert("lalala");
////};
////
////        ');



        $mform->addElement('hidden', 'id_user', '0', array('id'=>'id_user'));
        $mform->addElement('hidden', 'fullname','', array('id'=>'fullname'));

        $mform->addElement('text', 'face', get_string('face', 'local_korm'), array('onkeyup'=>'countScore()', 'id'=>'face'));
        $mform->addElement('text', 'presentation', get_string('presentation', 'local_korm'), array('onkeyup'=>'countScore()', 'id'=>'presentation'));
        $mform->addElement('text', 'hitechnic', get_string('hitechnic', 'local_korm'), array('onkeyup'=>'countScore()', 'id'=>'hitechnic'));
        $mform->addElement('text', 'documents', get_string('documents', 'local_korm'), array('onkeyup'=>'countScore()', 'id'=>'documents'));
        $mform->addElement('text', 'tmc', get_string('tmc', 'local_korm'), array('onkeyup'=>'countScore()', 'id'=>'tmc'));
        $mform->addElement('date_selector', 'date', get_string('date', 'local_korm'));
        $mform->addElement('text', 'total_score', get_string('total_score', 'local_korm'), array('disabled'=>'disabled'));
        $mform->addElement('hidden', 'countTotalScore','', array('id'=>'countTotalScore'));

        $this->add_action_buttons();
    }
}
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/local/korm/countScore.js'));