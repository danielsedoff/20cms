<?php

require("password.php");

echo("getcwd  -> " . getcwd() . "\n");

$zipto=$_POST["zipto"];
$tfilelist=$_POST["zip_files"];
$filelist=explode ( "\n", $tfilelist);
$cf = count($filelist);

$zip = new ZipArchive;
if ($zip->open($zipto, ZipArchive::CREATE) === TRUE) {
    for(; $cf >= 0; $cf--) {
        $thisfile=$filelist[$cf];
        if (file_exists($thisfile)) {
            $zip->addFile($thisfile);
            echo("\nadded: " . $thisfile . "\n"); 
        }
    
    }
    $zip->close();
} else {
    die ("\nfailed to open " . $zipto . "\n");
}

if(file_exists($zipto)) {
    echo("\n" . $zipto . " is " . filesize($zipto) . " bytes long.\n");
} else {
    echo("\nunfortunately " . $zipto . " could not be created.\n");
}


?>