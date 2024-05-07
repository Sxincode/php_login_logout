<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="#" method="post" autocomplete="off">
        <div class="form">
            <input type="text" name="username" class="textfiled" placeholder="username">
            <input type="password" name="password" class="textfiled" placeholder="password">

            <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget password?</a></div>
            <input type="submit" name="login" value="Login" class="btn">
            <div class="signup">New Member ? <a href="form.php" class="link">SignUp Here</a></div>
        </div>
        </form>
    </div>

    <script>
        function message()
        {
            alert("Learn the password!!!");
        }
    </script>
</body>
</html>

<?php
    include("connection.php"); 
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $pwd=$_POST['password'];

        $query ="SELECT * FROM form WHERE email = '$username' && password = '$pwd'";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);

        if($total==1)
        {
            $_SESSION['user_name']=$username;
            header('location:demo.php');
        }
        else
        {
            echo "Login failed!";
        }
    }
?>