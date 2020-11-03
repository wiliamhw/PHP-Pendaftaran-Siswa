<?php

require 'config.php';

// Main page address relative to entry/assets or entry/views
$mainAddress = "../../main/views/index.view.php";

// Entry page address relative to main/assets or entry/views
$entryAddress = "../../entry/views/index.view.php";

try {
    $mysqli = new mysqli(
        $config['database']['connection'],
        $config['database']['username'],
        $config['database']['password'],
        $config['database']['name']
    );
} catch (Exception $e) {
    die($e->getMessage());
}
