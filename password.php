<?php

require("antiattack.php");
require("welcome.php");

/* stored userid comes from welcome.php */

/* print_r($_POST); */

/* given userid comes from Post */
$given_userid =  htmlspecialchars($_POST["user_id"]);

if ($given_userid != $userid) {
    die("wrong pass"); 
}

$dir_to_go = htmlspecialchars($_POST["dir"]);

if(is_dir($dir_to_go)) {
    chdir($dir_to_go); 
}

?>