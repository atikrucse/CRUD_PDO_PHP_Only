<?php
include './dbConfig/bdConnection.php';
try {
 
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
    // delete query
    $query = "DELETE FROM employe WHERE id = ?";
    $emp = $connection->prepare($query);
    $emp->bindParam(1, $id);
 
    if($emp->execute()){
        header('Location: index.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>