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
        global $DB, $PAGE;
//        $user_list = $DB->get_records('user', null,null, 'id, lastname, firstname, department');
//        $for_select = array();
//        foreach ($user_list as $item) {
//            $for_select[] = $item->id => $item->lastname. ' ' . $item->firstname;
//        }

        $fields = 'id, firstname, lastname';
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
                                      alert($("#id_user_fullname").val());
                });
            });
        ');



        $mform->addElement('hidden', 'id_user', '0', array('id'=>'id_user'));
        $mform->addElement('hidden', 'fullname','', array('id'=>'fullname'));

        $mform->addElement('text', 'face', get_string('face', 'local_korm'));
        $mform->addElement('text', 'presentation', get_string('presentation', 'local_korm'));
        $mform->addElement('text', 'hitechnic', get_string('hitechnic', 'local_korm'));
        $mform->addElement('text', 'documents', get_string('documents', 'local_korm'));
        $mform->addElement('text', 'tmc', get_string('tmc', 'local_korm'));
        $mform->addElement('date_selector', 'date', get_string('date', 'local_korm'));
        $mform->addElement('text', 'total_score', get_string('total_score', 'local_korm'));

        $this->add_action_buttons();
    }
}