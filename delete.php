<?php

    //connect to database
    require_once 'db-connection/db.php';

    $id = $_POST['id'] ?? null;

    if(!$id){
        header('Location: index.php');
        exit;
    }

    // delete from db
    $sql = 'DELETE FROM employees WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location: index.php');



?>