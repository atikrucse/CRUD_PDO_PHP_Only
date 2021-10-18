<?php 
   
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $birthMonth = $_POST['birthMonth'];
    $birthDay = $_POST['birthDay'];
    $birthYear = $_POST['birthYear'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $lastDegree = $_POST['lastDegree'];

?>

<?php
if($_POST){
 
    include './dbConfig/bdConnection.php';
 
    try{
 
        // insert query
        $query = "INSERT INTO employe SET name=:name, fatherName=:fatherName, motherName=:motherName, phoneNumber=:phoneNumber, email=:email, birthMonth=:birthMonth, birthDay=:birthDay, birthYear=:birthYear, sex=:sex, address=:address, salary=:salary, lastDegree=:lastDegree";
 
        // prepare query for execution
        $emp = $connection->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $fatherName=htmlspecialchars(strip_tags($_POST['fatherName']));
        $motherName=htmlspecialchars(strip_tags($_POST['motherName']));
        $phoneNumber=htmlspecialchars(strip_tags($_POST['phoneNumber']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $birthMonth=htmlspecialchars(strip_tags($_POST['birthMonth']));
        $birthDay=htmlspecialchars(strip_tags($_POST['birthDay']));
        $birthYear=htmlspecialchars(strip_tags($_POST['birthYear']));
        $sex=htmlspecialchars(strip_tags($_POST['sex']));
        $address=htmlspecialchars(strip_tags($_POST['address']));
        $salary=htmlspecialchars(strip_tags($_POST['salary']));
        $lastDegree=htmlspecialchars(strip_tags($_POST['lastDegree']));
 
        // bind the parameters
        $emp->bindParam(':name', $name);
        $emp->bindParam(':fatherName', $fatherName);
        $emp->bindParam(':motherName', $motherName);
        $emp->bindParam(':phoneNumber', $phoneNumber);
        $emp->bindParam(':email', $email);
        $emp->bindParam(':birthMonth', $birthMonth);
        $emp->bindParam(':birthDay', $birthDay);
        $emp->bindParam(':birthYear', $birthYear);
        $emp->bindParam(':sex', $sex);
        $emp->bindParam(':address', $address);
        $emp->bindParam(':salary', $salary);
        $emp->bindParam(':lastDegree', $lastDegree);


 
 
        // Execute the query
        if($emp->execute()){
            echo"
                <script>
                    window.alert('Record inserted successfully');
                    window.location.href='index.php';
                </script>";
            
        }else{
            echo "
                <script>
                    window.alert('Unable to insert record Try again');
                    window.location.href='index.php';
                </script>";
        }
 
    }
 
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<!-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Process Employee</title>
    </head>
    <body>
        <h1>Process Employee</h1>
        <ul>
            
                // echo "<li> $name</li>";
                // echo "<li> $fatherName</li>";
                // echo "<li> $motherName</li>";
                // echo "<li> $phoneNumber</li>";
                // echo "<li> $email</li>";
                // echo "<li> $birthMonth</li>";
                // echo "<li> $birthDay</li>";
                // echo "<li> $birthYear</li>";
                // echo "<li> $sex</li>";
                // echo "<li> $address</li>";
                // echo "<li> $salary</li>";
                // echo "<li> $lastDegree</li>";    
            
        </ul>
    </body>
    </html> -->
