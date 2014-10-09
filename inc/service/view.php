<?php
class View
{
    public static function render($name, $data = "")
    {
        if(!empty($data)){
            extract($data);
        }
        require("inc/views/header.php");
        require("inc/views/".$name.".php");
        require("inc/views/footer.php");
    }
}