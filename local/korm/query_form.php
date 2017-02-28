<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 18:10
 */

require_once("{$CFG->libdir}/formslib.php");




class query_form extends moodleform {

    function definition() {
        $mform =& $this->_form;
        $mform->addElement('date_selector', 'date_from', get_string('date_from', 'local_korm', array('id'=>'date_from')));
        $mform->addElement('date_selector', 'date_to', get_string('date_to', 'local_korm', array('id'=>'date_to')));
        $mform->addElement('hidden', 'query', '1');

        $this->add_action_buttons($cancel=false,$submitlabel='Показать');
    }
}