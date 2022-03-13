<?php
    include("../model/model.php");
    deleteAllDescriptionsList($_GET);
    deleteList($_GET);
    header("location: ../toDoList.php");