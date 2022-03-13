<?php
    function openCon(){
        try{
            $conn = new PDO('mysql:host=localhost;dbname=todolist', 'root', 'mysql');
            return $conn;
        }

        catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //select

    function allList(){
        $conn = openCon();
        $result = $conn->prepare("SELECT * FROM list ORDER BY id");
        $result->execute();
        $list = $result->fetchAll();
        return $list;
        $conn = null;
    }
    
    function allDescriptions(){
        $conn = openCon();
        $result = $conn->prepare("SELECT * FROM description ORDER BY id");
        $result->execute();
        $description = $result->fetchAll();
        return $description;
        $conn = null;
    }

    function filterStatus($data){
        $conn = openCon();
        $result = $conn->prepare("SELECT * FROM description ORDER BY status WHERE hoofdTextId=:id");
        $result->execute([$data["id"] => ":id"]);
        $description = $result->fetchAll();
        return $description;
        $conn = null;
    }

    function filterTime($data){
        $conn = openCon();
        $result = $conn->prepare("SELECT * FROM description ORDER BY status WHERE hoofdTextId=:id");
        $result->execute([$data["id"] => ":id"]);
        $description = $result->fetchAll();
        return $description;
        $conn = null;
    }

    // create
    
    function createDescription($data){
        $conn = openCon();
        $query = $conn->prepare("INSERT INTO description(omschrijving, hoofdTextId, tijd, status) VALUES (:description, :hoofdTextId, :tijd, :status)");
        $query->execute([":description" => $data["description"], ":hoofdTextId" => $data["hoofdTextId"], ":tijd" => $data["time"], ":status" => $data["status"]]);
        $conn = null;
    }

    function createList($data){
        $conn = openCon();
        $query = $conn->prepare("INSERT INTO list(hoofdText) VALUES (:hoofdText)");
        $query->execute([":hoofdText" => $data["titel"]]);
        $conn = null;
    }

    // update

    function updateList($data){
        $conn = openCon();
        $query = $conn->prepare("UPDATE list SET hoofdText=:titel WHERE id=:id");
        $query->execute([":titel" => $data["titel"], ":id" => $data["id"]]);
        $conn = null;
    }

    function updateDescription($data){
        $conn = openCon();
        $query = $conn->prepare("UPDATE description SET omschrijving=:description, tijd=:time, status=:status WHERE id=:id");
        $query->execute([":description" => $data["omschrijving"], ":time" => $data["time"], ":status" => $data["status"], ":id" => $data["id"]]);
        $conn = null;
    }

    // delete

    function deleteList($data){
        $conn = openCon();
        $query = $conn->prepare("DELETE FROM list WHERE id=:id");
        $query->execute([":id" => $data["id"]]);
        $conn = null;
    }

    function deleteAllDescriptionsList($data){
        $conn = openCon();
        $query = $conn->prepare("DELETE FROM description WHERE hoofdTextId=:id");
        $query->execute([":id" => $data["id"]]);
        $conn = null;
    }

    function deleteDescription($data){
        $conn = openCon();
        $query = $conn->prepare("DELETE FROM description WHERE id=:id");
        $query->execute([":id" => $data["id"]]);
        $conn = null;
    }

