<?php
    include("../model/model.php");
    filterTime($_GET);
    header("location: ../toDoList.php");