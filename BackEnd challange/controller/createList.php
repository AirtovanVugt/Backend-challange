<?php

    include("../model/model.php");
    createList($_POST);
    header("location: ../toDoList.php");