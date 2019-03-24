<?php

require("password.php");

$view_file=$_POST["view_file"];

if (file_exists($view_file) == FALSE) {
    die("Error: no such file: " . $view_file . "\n"); 
}

if (is_dir($view_file)) {
    die("Not a file: $view_file \n");
}

echo(file_get_contents($view_file));

?>