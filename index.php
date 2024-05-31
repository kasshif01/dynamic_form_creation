<?php
require "bootstrap.php";

function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    return $protocol . "://" . $host . $path;
}

$app = require_once 'src/routes.php';
$uri = strtok($_SERVER["REQUEST_URI"], '?');
$app->dispatch(rtrim($uri, '/'));

