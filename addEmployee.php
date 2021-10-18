<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/formStyle.css">

    <title>input_form</title>
</head>
<body>
    <h1 class="form-heading">Employee Details Form</h1>
    <div class="form-container">
        
        <form action="formAction.php" method="post">
           
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name.." value="" required>
            </div>

            <div>
                <label for="fatherName">Father Name</label>
                <input type="text" id="fatherName" name="fatherName" placeholder="Your father name.." value="" required>
            </div>

            <div>
                <label for="motherName">Mother Name</label>
                <input type="text" id="motherName" name="motherName" placeholder="Your mother name.." value="" required>
            </div>

            <div>
                <label for="phone">Phone number</label>
                <input type="text" id="phone" name="phoneNumber" placeholder="+880" value="" required>
                <small style="margin-top: -5px" id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div>
        
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="abcd@email.com" value="" >
                <small style="margin-top: -5px" id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div>
                <label>Date of Birth</label>
                <div style="margin-top: -20px" class="date-of-birth">
                    <select name="birthMonth">
                        <option value="#">Select Month</option>
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                    <select name="birthDay">
                        <option value="#">Select Day</option>
                        <?php 
                            for ($i=1; $i <= 31; $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                    <select name="birthYear">
                        <option value="#">Select Year</option>
                        <?php 
                            for ($i=2021; $i >= 1990; $i--) { 
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <label>Sex</label> <br>
                    <div>
                    <input type="radio" name="sex" value="Male" required>Male <br>
                    <input type="radio" name="sex" value="Female" required>Female <br>
                    </div>
            </div>

            <div>
                <label for="address">Address</label> <br>
                <textarea name="address" id="address" cols="50" rows="10"></textarea>

            </div>

            <div>
                <label for="">Expected Salary</label><br>
                <div>
                    <input type="text" name="salary" id="salary" placeholder="In Taka" required>
                </div>
            </div>
            <div>
                <label for="lDegree">Latest  Degree</label>
                <div>
                <select name="lastDegree" id="lDegree">
                    <option value="#">Select One</option>
                    <option value="Bsc">Bsc</option>
                    <option value="Msc">Msc</option>
                </select>
                </div>
            </div>

            <div class="submit-button bg-success">
                <input type="submit" value="Submit">
            </div>

        </form>
      </div>
</body>
</html>