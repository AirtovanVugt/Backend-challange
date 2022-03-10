<?php
    include("../model/model.php");
    session_start();
    $_SESSION["error"] = "er klopt iets niet";
    echo $_SESSION["error"];
    updateList($_POST);
    header("location: ../toDoList.php");