<?php
    include("../model/model.php");
    filterStatus($_GET);
    header("location: ../toDoList.php");