<?php
spl_autoload_register('prjAutoloader');

function prjAutoloader ($className) {
    $path = 'classes/';
    $extension = '.class.php';
    $fileName = $path . $className . $extension;

    if (!file_exists($fileName)) {
        return false;
    }

    include_once $path . $className . $extension;
}
// the classs names should be same as file names
?>