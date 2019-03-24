<?php
require("password.php");

$folder=$_POST['folder'];
$action=$_POST['action'];

switch($action) {
case "mkdir":
    if(is_dir($folder) == true) { 
        echo("Directory $folder exists.\n"); 
    } else {
        mkdir($folder);
        if(is_dir($folder) == true) {
            echo("Directory $folder created.\n");
        }
    }
    break;
case "rmdir":
    if(is_dir($folder) == false) { 
        echo("Directory $folder does not exist.\n"); 
    } else {
        rmdir($folder);
        if(is_dir($folder) == false) {
            echo("Directory $folder removed.\n");
        }
    }
    break;
case "chdir":
    if(is_dir($folder) == false) {
        echo ("Error: $folder is not a directory.\n"); 
    } else {
        chdir($folder);
    }
    echo("current directory: " . getcwd() . "\n");
    break;
case "ls":
        $f = dir($folder);
        echo ("Path: " . $f->path . "\n");
        while (false !== ($entry = $f->read())) {
           echo ($entry);
           if(is_dir($entry)) {
               echo("/");
           }
           echo("\n");
        }
        $f->close();
    break;
};

?>