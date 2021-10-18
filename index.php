<?php 
    include './dbConfig/bdConnection.php';

    $query = "SELECT id, name, fatherName, motherName, phoneNumber, email, birthMonth, birthDay, birthYear, sex, address, salary, lastDegree FROM employe ORDER BY id ASC";
    $stmt = $connection->prepare($query);
    $stmt->execute();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>index_page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .heading{
            background-color: #17a2b8;
        }
        table th{
            color: white;
        }
    </style>
  </head>
  <body>
      <div>
          <h3 class="heading text-white text-center p-3 font-weight-bold">Welcome to Single Page Form based CRUD</h3>
          <a class="btn btn-success mt-3  px-5 text-white font-weight-bold" href="addEmployee.php" role="button">Add a new employee</a>
      <table class="table table-bordered">
            <thead>
                <tr class="bg-info">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Birth Month</th>
                    <th>Birth Day</th>
                    <th>Birth Year</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Last Degree</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        echo "<tr>
                            <td>{$id}</td>
                            <td>{$name}</td>
                            <td>{$fatherName}</td>
                            <td>{$motherName}</td>
                            <td>{$phoneNumber}</td>
                            <td>{$email}</td>
                            <td>{$birthMonth}</td>
                            <td>{$birthDay}</td>
                            <td>{$birthYear}</td>
                            <td>{$sex}</td>
                            <td>{$address}</td>
                            <td>{$salary}</td>
                            <td>{$lastDegree}</td>
                            <td>";
                                // read
                                echo "<a href='read.php?id={$id}' class='btn btn-info m-r-1em mx-3 mt-3'>Read</a>";
                    
                                // update
                                echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em mx-3 mt-3'>Update</a>";
                    
                                // delete
                                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger mx-3 mt-3'>Delete</a>";
                            echo "</td>";
                        echo "</tr>";
                                }
                ?>
            </tbody>
        </table>

        <!-- Confirm deletion -->
        <script type='text/javascript'>
            function delete_user( id ){
            
                var answer = confirm('Are you sure?');
                if (answer){
                    window.location = 'delete.php?id=' + id;
                }
            }
        </script>
      </div>
      
       















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
