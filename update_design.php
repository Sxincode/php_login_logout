
<?php
    session_start();
    include("connection.php");
    $id = $_GET['id']; 
    $userprofile = $_SESSION['user_name'];
    if($userprofile == true)
    {

    } 
    else
    {
        header('location:login.php');
    }
    $query = "SELECT * FROM form where id = '$id'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    
    $result = mysqli_fetch_assoc($data) ;
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
            Update Student Details
        </div>
        <div class="form">
            <div class="input_field">
                <label for="">First Name</label>
                <input type="text" value="<?php echo $result['fname'];?>" class="input" name="fname" required>
            </div>
            <div class="input_field">
                <label for="">Last Name</label>
                <input type="text" value="<?php echo $result['lname'];?>" class="input" name="lname"required>
            </div>
            <div class="input_field">
                <label for="">Password</label>
                <input type="password" value="<?php echo $result['password'];?>" class="input" name="password"required>
            </div>
            <div class="input_field">
                <label for="">Confirm Password</label>
                <input type="password" value="<?php echo $result['cppassword'];?>" class="input" name="conpassword"required>
            </div>
            <div class="input_field">
                <label for="">Gender</label>
                <div class="custom_select">
                <select name="gender" id="" class="" required>
                    <option value="Not selected">Select</option>
                    <option value="Male"
                    <?php if($result['gender']=='Male')
                    {
                        echo "selected";
                    }?>>Male</option>
                    <option value="Female"
                    <?php if($result['gender']=='Female')
                    {
                        echo "selected";
                    }?>>Female</option>
                </select>
                </div>
            </div>
            <div class="input_field">
                <label for="">Email Address</label>
                <input type="email" value="<?php echo $result['email'];?>" class="input" name="email" required>
            </div>
            <div class="input_field">
                <label for="">Phone Number</label>
                <input type="text" class="input" value="<?php echo $result['phone'];?>" name="phone" required> 
            </div>
            <div class="input_field">
                <label for="">Address</label>
                <textarea name="address" id=""  cols="30" rows="5" class="textarea" required><?php echo $result['address'];?>
                </textarea>
            </div>
            <div class="input_field terms">
                <label for="" class="check">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" name="update" value="Update Details" class="btn">
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['update']))
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
        
            $query = "UPDATE form set fname='$fname',lname='$lname', password='$pwd', cppassword='$cpwd', gender='$gender', email='$email',phone='$phone',address='$address' where id=$id";
            $data = mysqli_query($conn,$query);
            if($data)
            {
                echo "<script>alert('Record Updated!')</script>";
                ?>
                <meta http-equiv = "refresh" content = "0; url = http://localhost/website/demo.php"/>
                <?php
            }
            else
            {
                echo "Failed to Update";
            }
        
        }
        else
        {
            echo "<script>alert('Fill the form first!')</script>";
        }
    }
?>