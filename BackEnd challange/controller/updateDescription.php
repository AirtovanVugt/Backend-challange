<?php
    include("../model/model.php");
    updateDescription($_POST);
    header("location: ../toDoList.php");