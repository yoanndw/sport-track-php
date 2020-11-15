<?php
    require_once("src/controller/ApplicationController.php");
    
    include_once("src/model/User.php");

    session_start();

    // Display errors
    ini_set("display_errors", "On");
    error_reporting(E_ALL);

    if (!isset($_REQUEST["page"]))
    {
        $_REQUEST["page"] = "/";
    }

    $view = ApplicationController::getInstance()->getView($_REQUEST);
    if ($view != null)
    {
        include "src/view/$view.php";
    }

    $controller = ApplicationController::getInstance()->getController($_REQUEST);
    if ($controller != null)
    {
        include "src/controller/$controller.php";
        (new $controller())->handle($_REQUEST);
    }
?>