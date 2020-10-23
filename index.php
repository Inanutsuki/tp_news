<?php

require_once 'autoload.php';

session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php?action=home');
    exit();
}

use App\Controller\AppController;

$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

$ctrl = new AppController;

switch ($action) {
    case "home":
        $ctrl->home();
        break;
}