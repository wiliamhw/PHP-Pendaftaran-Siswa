<?php

require 'config.php';

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
