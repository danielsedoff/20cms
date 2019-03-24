<?php
require("password.php");

$tfilelist=$_POST["delete_files"];
$filelist=explode ( "\n", $tfilelist);
$cf = count($filelist);
for(; $cf >= 0; $cf--) {
    $thisfile=$filelist[$cf];
    if (file_exists($thisfile)) { unlink($thisfile); echo("unlink: " . $thisfile) . "\n";}
}
?>