<?php

require("antiattack.php");

/* print_r($_POST); */
/* echo(md5($_GET['pw'])); die(); */

$stored_pass_md5 = "c463b4b7d56ae82968a7683d29d558e7";
$users_pass_md5 =  md5(htmlspecialchars($_POST["users_pass"]));

if ($users_pass_md5 != $stored_pass_md5) {
    die("wrong pass"); 
}

$userid = md5((mt_rand() . " what did you expect? " . microtime()));

$x = file_put_contents ('welcome.php', '<' . '?php $userid = \'' . $userid . '\'; ?' . '>');

if ($x === false) { die('error'); }

echo($userid);

?>
