<?php
/**
 * Created by PhpStorm.
 * User: lekha
 * Date: 21.02.17
 * Time: 14:15
 */
$CFG->stylesheets[] = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';


class  block_admin_menu extends block_base
{
    public function init(){
        $this->title = get_string('pluginname', 'block_admin_menu');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         = new stdClass;
        $this->content->text = '';


        $this->content->text = "<div class='list-group'>";
        $this->content->text .= "<a href='../local/departaments/index.php' class='list-group-item list-group-item-action'>Структура</a>";
        $this->content->text .= "</div>";

        return $this->content;
    }
}