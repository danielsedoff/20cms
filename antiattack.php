<?php

/* Limit the number of allowed parallel running instances */

$folder_sessions = $_SERVER['DOCUMENT_ROOT'] . "/20cms/sec_session/";
$max_sessions = 2;

if (file_exists ( $folder_sessions ) == FALSE) {
    mkdir ($folder_sessions);
}

$filename = $folder_sessions . time() . "_" . mt_rand() . ".session";

$sessions_count = count(glob($folder_sessions . '*.session'));

/* // debug */
/* print_r (glob($folder_sessions . '*.session')); */
/* echo($sessions_count); */

if ($sessions_count > $max_sessions) {
	sleep(2);
    $filelist=glob($folder_sessions . '*.session');
    $cf = count($filelist);
    for(; $cf >= 0; $cf--) {
        $thisfile=$filelist[$cf];
        if (file_exists($thisfile)) { 
	        unlink($thisfile);
        }
    }
    /* echo("Two second delay.\n"); */
} else {
	/* echo("Delay: none\n"); */
}

$file1 = fopen($filename, "w");
fwrite($file1, "0");
fclose($file1);

?>