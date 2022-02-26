<?php
    include("../model/model.php");
    updateList($_POST);
    header("location: ../toDoList.php");