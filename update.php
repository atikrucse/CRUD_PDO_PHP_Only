<!doctype html>
<html lang="en">
  <head>
    <title>update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td>Name</td>
                        <td><input type='text' name='name' value="<?php echo htmlspecialchars($name);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Father Name</td>
                        <td><input type='text' name='fatherName' value="<?php echo htmlspecialchars($fatherName);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td><input type='text' name='motherName' value="<?php echo htmlspecialchars($motherName);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type='text' name='phoneNumber' value="<?php echo htmlspecialchars($phoneNumber);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='text' name='email' value="<?php echo htmlspecialchars($email);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type='text' name='address' value="<?php echo htmlspecialchars($address);  ?>" class='form-control' /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='Save Changes' class='btn btn-success' />
                            <a href='index.php' class='btn btn-success'>Back to Index Page</a>
                        </td>
                    </tr>
                    </table>
                </form>
            </div>

            <!-- For Update Employee -->
            <?php
 
            if($_POST){
            
                try{
                    $query = "UPDATE employe
                                SET name=:name, fatherName=:fatherName
                                WHERE id = :id";
            
                    $emp = $connection->prepare($query);
            
                    $name=htmlspecialchars(strip_tags($_POST['name']));
                    $fatherName=htmlspecialchars(strip_tags($_POST['fatherName']));
            
            
                    $emp->bindParam(':name', $name);
                    $emp->bindParam(':fatherName', $fatherName);
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