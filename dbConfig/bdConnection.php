<?php
$dsn = 'mysql:host=localhost;dbname=crud_only_php';

$username = "root";
$password = "";
$options = [];
 
try {
    $connection = new PDO($dsn, $username, $password, $options); 
}
 
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>