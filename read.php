<!doctype html>
<html lang="en">
  <head>
    <title>read_record</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .read-table td{
            text-align: center;
            background-color: #e7fdfb;
        }
    </style>
  </head>
  <body>
      <div class="container">
          <h1 class="bg-success text-center text-white p-3">View details of an Employee</h1>
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
        <table class='table table-hover table-bordered mt-2 read-table'>
            <tr>
                <td>Name</td>
                <td><?php echo htmlspecialchars($name);  ?></td>
            </tr>
            <tr>
                <td>Father Name</td>
                <td><?php echo htmlspecialchars($fatherName);  ?></td>
            </tr>
            <tr>
                <td>Mother Name</td>
                <td><?php echo htmlspecialchars($motherName);  ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo htmlspecialchars($phoneNumber);  ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo htmlspecialchars($email);  ?></td>
            </tr>
            <tr>
                <td>Birth Month</td>
                <td><?php echo htmlspecialchars($birthMonth);  ?></td>
            </tr>
            <tr>
                <td>Birth Day</td>
                <td><?php echo htmlspecialchars($birthDay);  ?></td>
            </tr>
            <tr>
                <td>Birth Year</td>
                <td><?php echo htmlspecialchars($birthYear);  ?></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><?php echo htmlspecialchars($sex);  ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo htmlspecialchars($address);  ?></td>
            </tr>
            <tr>
                <td>Salary</td>
                <td><?php echo htmlspecialchars($salary);  ?></td>
            </tr>
            <tr>
                <td>Last Degree</td>
                <td><?php echo htmlspecialchars($lastDegree);  ?></td>
            </tr>
            <tr>
                <td colspan='2' class='text-center'>
                    <a href='index.php' class='btn btn-success px-5 text-white font-weight-bold'>Back to Index</a>
                </td>
            </tr>
        </table>
      </div>






















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>