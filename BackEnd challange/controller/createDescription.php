<?php

    include("../model/model.php");
    createDescription($_POST);
    header("location: ../toDoList.php");