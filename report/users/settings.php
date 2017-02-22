<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 22.02.17
 * Time: 11:15
 */

$ADMIN->add('reports', new admin_externalpage('reportusers', get_string('pluginname', 'report_users'), "$CFG->wwwroot/report/users/index.php"));
$settings = null;