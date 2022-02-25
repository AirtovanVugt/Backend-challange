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
    
    function createDescription($data){
        $conn = openCon();
        $query = $conn->prepare("INSERT INTO description(omschrijving, hoofdTextId) VALUES (:description, :hoofdTextId)");
        $query->execute([":description" => $data["description"], ":hoofdTextId" => $data["hoofdTextId"]]);
        $conn = null;
    }

    function createList($data){
        $conn = openCon();
        $query = $conn->prepare("INSERT INTO list(hoofdText) VALUES (:hoofdText)");
        $query->execute([":hoofdText" => $data["titel"]]);
        $conn = null;
    }

    function deleteDescription($data){
        $conn = openCon();
        $query = $conn->prepare("DELETE FROM description WHERE id=:id");
        $query->execute([":id" => $data["id"]]);
        $conn = null;
    }