<?php

function openConn() {
    $host="localhost";
    $username="*database username*;
    $password="*password*";
    $database="*database name*";
    $conn=new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("connection failed; ". $conn-> connect_error);
        exit();
    }
    return $conn;
}
function closeConn($conn){
    $conn->close();
}
?>