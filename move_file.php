<?php

require("password.php");

echo("getcwd  -> " . getcwd() . "\n");

$moveto=$_POST["moveto"];
if(substr($moveto, strlen($moveto) - 1) != "/") {
    $moveto = $moveto . "/";
}

$tfilelist=$_POST["move_files"];
$thisfile="";
$filelist=explode ( "\n", $tfilelist);
$cf = count($filelist);
for(; $cf >= 0; $cf--) {
    $thisfile=$filelist[$cf];
    if (file_exists($thisfile)) {

         $filename_position = strrpos($thisfile,"/");

         if ($filename_position == FALSE) { 
             $filename_only = $thisfile;
             } else {
             $filename_only = substr ( $thisfile, $filename_position + 1 );
         }
         $newfile = $moveto . $filename_only;
         
         echo($thisfile . " -> " . $newfile);
         rename($thisfile, $newfile);
    }
}


?>