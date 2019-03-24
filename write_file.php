<?php

/* print_r($_POST); */

require("password.php");

$backup_dir = $_SERVER['DOCUMENT_ROOT'] . "/20cms/backup/";
$write_file=$_POST["write_file"];
$write_content=$_POST["write_content"];



if(is_dir($write_file)) {
    die("error: cannot edit folder " . $write_file . "\n"); 
}

if (file_exists($write_file) == FALSE) {
    echo("creating " . $write_file . "\n");
} else {
    $filename_position = strrpos($write_file,"/");
    if($filename_position === FALSE) {
	    $filename_position = -1; 
    }

    if ((file_exists($backup_dir) == FALSE) || (is_dir($backup_dir) == FALSE)) {
        die("error: no backup folder. make the " . $backup_dir . " directory first\n");
    }

    $filename_only =  time()  .  substr ( $write_file, $filename_position + 1 );
    stream_copy($write_file, $backup_dir . $filename_only);
    echo("backup in " . $backup_dir . $filename_only . "\n");
}

$write_content = stripslashes( $write_content);

file_put_contents($write_file, $write_content);

function stream_copy($src, $dest) {
    $fsrc = fopen($src,'r');
    $fdest = fopen($dest,'w+');
    $len = stream_copy_to_stream($fsrc, $fdest);
    fclose($fsrc);
    fclose($fdest);
    return $len;
} 

?>