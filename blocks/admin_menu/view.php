<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 21.02.17
 * Time: 14:14
 */
login_required();

require_once('../../config.php');

$PAGE->set_url('/block/admin_menu/view.php');
$PAGE->set_title('My modules page title');
$PAGE->set_pagelayout('standart');
$PAGE->set_heading('My modules page heading');

$site = get_site();
echo $OUTPUT->header();
echo $OUTPUT->footer();