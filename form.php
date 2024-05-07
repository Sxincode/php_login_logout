<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form-style.css">
    <title>PHP CRUD OPERATIONS</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label for="">First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>
            <div class="input_field">
                <label for="">Last Name</label>
                <input type="text" class="input" name="lname"required>
            </div>
            <div class="input_field">
                <label for="">Password</label>
                <input type="password" class="input" name="password"required>
            </div>
            <div class="input_field">
                <label for="">Confirm Password</label>
                <input type="password" class="input" name="conpassword"required>
            </div>
            <div class="input_field">
                <label for="">Gender</label>
                <div class="custom_select">
                <select name="gender" id="" class="" required>
                    <option value="Not selected">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
            </div>
            <div class="input_field">
                <label for="">Email Address</label>
                <input type="email" class="input" name="email" required>
            </div>
            <div class="input_field">
                <label for="">Phone Number</label>
                <input type="text" class="input" name="phone" required> 
            </div>
            <div class="input_field">
                <label for="">Address</label>
                <textarea name="address" id="" cols="30" rows="5" class="textarea" required></textarea>
            </div>
            <div class="input_field terms">
                <label for="" class="check">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" name="register" value="Register" class="btn">
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['register']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['conpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if($fname !="" &&$lname !="" &&$pwd !="" &&$cpwd !="" &&$gender !="" &&$email !="" &&$phone !="" &&$address !="")
        {
        
            $query = "INSERT INTO form(fname,lname,password,cppassword,gender,email,phone,address) values('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";
            $data = mysqli_query($conn,$query);
            if($data)
            {
                echo "Data Inserted into database!";
            }
            else
            {
                echo "Failed";
            }
        
        }
        else
        {
            echo "<script>alert('Fill the form first!')</script>";
        }
    }
?>