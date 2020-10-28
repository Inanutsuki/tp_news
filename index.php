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
    case "newsList":
        $ctrl->newsList();
        break;
    case "news":
        $ctrl->news();
        break;
    case "newsManagement":
        $ctrl->newsManagement();
        break;
    case "removeNews":
        $ctrl->removeNews();
        break;
    // case "updateNews" .
    //     $ctrl->updateNews();
    //     break;
}
