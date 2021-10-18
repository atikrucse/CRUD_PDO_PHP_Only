<!doctype html>
<html lang="en">
  <head>
    <title>update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/formStyle.css">
  </head>
  <body>
      <div class="container">
        <?php
            include './dbConfig/bdConnection.php';

            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
            
            try {
                $query = "SELECT id, name, fatherName, motherName, phoneNumber, email, birthMonth, birthDay, birthYear, sex, address, salary, lastDegree FROM employe WHERE id = ? LIMIT 0,1";
                $emp = $connection->prepare($query);
            
                $emp->bindParam(1, $id);
                $emp->execute();
            
                $row = $emp->fetch(PDO::FETCH_ASSOC);
            
                $name = $row['name'];
                $fatherName = $row['fatherName'];
                $motherName = $row['motherName'];
                $phoneNumber = $row['phoneNumber'];
                $email = $row['email'];
                $birthMonth = $row['birthMonth'];
                $birthDay = $row['birthDay'];
                $birthYear = $row['birthYear'];
                $sex = $row['sex'];
                $address = $row['address'];
                $salary = $row['salary'];
                $lastDegree = $row['lastDegree'];
                
            }
            
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
            ?>
            <!-- Html -->
            <div class="container">
                <h3 class="bg-success text-white text-center p-3 font-weight-bold">Update Employee Information</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
                <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name);  ?>">
            </div>

            <div>
                <label for="fatherName">Father Name</label>
                <input type="text" id="fatherName" name="fatherName"  value="<?php echo htmlspecialchars($fatherName);  ?>">
            </div>

            <div>
                <label for="motherName">Mother Name</label>
                <input type="text" id="motherName" name="motherName" value="<?php echo htmlspecialchars($motherName);  ?>">
            </div>

            <div>
                <label for="phone">Phone number</label>
                <input type="text" id="phone" name="phoneNumber" value="<?php echo htmlspecialchars($phoneNumber);  ?>">
            </div>
        
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email);  ?>" >
            </div>

            <div>
                <label for="address">Address</label> <br>
                <input type='text' name='address' value="<?php echo htmlspecialchars($address);  ?>"/>

            </div>  
            <div>
                <input type='submit' value='Update Record' class='btn btn-warning mx-5' />
                <a href='index.php' class='btn btn-success p-3 mx-5'>Back to Index Page</a>
            </div> 
            
            </form>
            </div>

            <!-- For Update Employee -->
            <?php
 
            if($_POST){
            
                try{
                    $query = "UPDATE employe
                                SET name=:name, fatherName=:fatherName, motherName=:motherName, phoneNumber=:phoneNumber, email=:email, address=:address, salary=:salary
                                WHERE id = :id";
            
                    $emp = $connection->prepare($query);
            
                    $name=htmlspecialchars(strip_tags($_POST['name']));
                    $fatherName=htmlspecialchars(strip_tags($_POST['fatherName']));
                    $motherName=htmlspecialchars(strip_tags($_POST['motherName']));
                    $phoneNumber=htmlspecialchars(strip_tags($_POST['phoneNumber']));
                    $email=htmlspecialchars(strip_tags($_POST['email']));
                    $address=htmlspecialchars(strip_tags($_POST['address']));
                    $salary=htmlspecialchars(strip_tags($_POST['salary']));
                    
            
                    $emp->bindParam(':name', $name);
                    $emp->bindParam(':fatherName', $fatherName);
                    $emp->bindParam(':motherName', $motherName);
                    $emp->bindParam(':phoneNumber', $phoneNumber);
                    $emp->bindParam(':email', $email);
                    $emp->bindParam(':address', $address);
                    $emp->bindParam(':salary', $salary);
                    $emp->bindParam(':id', $id);
            
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
            
                // show errors
                catch(PDOException $exception){
                    die('ERROR: ' . $exception->getMessage());
                }
            }
            ?>
      </div>
















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>