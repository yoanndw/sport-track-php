<?php
    require_once("User.php");
    require_once("UserDAO.php");
    
    require_once("Activity.php");
    require_once("ActivityDAO.php");
    
    require_once("ActivityData.php");
    require_once("ActivityDataDAO.php");

    //$u1 = new User();
    //$u1->init("yo@gmail.com", "Dewilde", "Yoann", "20-11-2001", "H", 175, 60, "it");

    $a1 = new Activity();
    $a1->init(1, "20-09-2020", "course", "yo@gmail.com");
    
    $dao = ActivityDataDAO::getInstance();

    $data1 = new ActivityData();

    // ID = 1 ; liée à l'activité #1
    $data1->init(1, "20:05:56", 100, 1.2, 1.2, 1.2, 1);

    //$dao->insert($data1);

    print_r($dao->findAll());
    print_r($dao->getActivityData($a1));
?>