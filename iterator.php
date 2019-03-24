<?php
require("password.php");

function iterateDirectory($thedir) {
    foreach ($thedir as $path) {
        if ($path->isDir()) {
            iterateDirectory($path);
        } else {
            echo $path . "\n";
        }
		
    }
}

$dir = $_SERVER["DOCUMENT_ROOT"];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
iterateDirectory($iterator);

?>