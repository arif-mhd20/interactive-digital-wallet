<?php

function getFromDatabase($dbName, $tableName, $queryString = ""){
    $servername = "localhost";
    $user = "root";
    $pass = "";

    $conn = new mysqli($servername, $user, $pass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($queryString == ""){
        $sql = "SELECT * FROM " . $tableName;
    }else{
        $sql = $queryString;
    }
    


    $result = $conn->query($sql);
    $returnable = array();

    if ($result->num_rows > 0) {
        
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($returnable, $row);
        }
    } else {
        $conn->close();
        return array();
        
    }

    $conn->close();
    return $returnable;

}


function saveToDatabase($dbName, $tableName, $queryString)
{
 
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $queryString;

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>