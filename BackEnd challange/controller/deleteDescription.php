<?php
    include("../model/model.php");
    deleteDescription($_GET);
    header("location: ../toDoList.php");