<?php
/**
 * Created by PhpStorm.
 * User: joshe
 * Date: 9/16/2019
 * Time: 1:31 AM
 */
//Function used to check for duplicate information in the database
function checkDup($pdo, $sql, $userentry)
{
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $userentry);
        $stmt->execute();
        return $stmt->rowCount();
    }catch (PDOException $e)
    {
        exit();
    }
}

//Get random option from database
function chooselunch($pdo)
{
    $sql = "SELECT * FROM lunchoptions ORDER BY RAND() LIMIT 1";
    $lunch = $pdo->query($sql);
    foreach ($lunch as $row){
        echo $row['lunchoption'];
    }
    echo "the function works";
}

//Clears the table in the database for the next user
function cleartable($pdo){
    $sql = "DELETE FROM lunchoptions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

function connectdb(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "csci22502sp18";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s/n". $conn->error);

    return $conn;
}