<?php

require("password.php");

echo("getcwd  -> " . getcwd() . "\n");

$copyto=$_POST["copyto"];
if(substr($copyto, strlen($copyto) - 1) != "/") {
    $copyto = $copyto . "/";
}

$tfilelist=$_POST["copy_files"];
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
         $newfile = $copyto . $filename_only;
         
         echo($thisfile . " -> " . $newfile . " -> " . stream_copy($thisfile, $newfile) . " bytes\n");
    }
}

function stream_copy($src, $dest) {
    $fsrc = fopen($src,'r');
    $fdest = fopen($dest,'w+');
    $len = stream_copy_to_stream($fsrc,$fdest);
    fclose($fsrc);
    fclose($fdest);
    return $len;
} 

?>