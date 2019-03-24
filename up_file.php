<?php

require("password.php");

$uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/20cms/uploads/";
$uploadfile = $uploaddir . basename($_FILES['thefile']['name']);

if (move_uploaded_file($_FILES['thefile']['tmp_name'], $uploadfile)) {
    echo "The file was successfully uploaded to $uploadfile.\n";
} else {
    echo "File could not be uploaded.\n";
}

/* print_r($_POST);
print_r($_FILES); */

?>
