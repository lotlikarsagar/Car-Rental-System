
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="login_page.css"/>
</head>
<body class="body">
<div class="login-page">
<?php
    require('db.php');
   
    if (isset($_REQUEST['username'])) {
       

        $fname    = stripslashes($_REQUEST['fname']);
        $fname     = mysqli_real_escape_string($con, $fname );
        $Lname    = stripslashes($_REQUEST['Lname']);
        $Lname     = mysqli_real_escape_string($con, $Lname );
        $address    = stripslashes($_REQUEST['address']);
        $address     = mysqli_real_escape_string($con, $address );
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);


        $query    = "INSERT into `customer` (fname,Lname,email,username,password, address)
                     VALUES ('$fname','$Lname','$email','$username', '" . md5($password) . "','$address')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login_page.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='login_page.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
   <form class="form" action="" method="post" onsubmit="return validateForm()">
    <h1 class="login-title">Registration</h1>
    <input type="text" class="login-input" name="fname" placeholder="First Name" required />
    <input type="text" class="login-input" name="Lname" placeholder="Last Name" required />
    <input type="text" class="login-input" name="address" placeholder="Address" required />
    <input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" placeholder="Email Address" required />
    <input type="password" class="login-input" name="password" id="password" placeholder="Password" required />
    <input type="password" class="login-input" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
    <input type="submit" name="submit" value="Register" class="login-button">
    <p class="link"><a href="login_page.php">Click to Login</a></p>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password != confirm_password) {
                alert("Passwords do not match");
                return false;
            }

            return true;
        }
    </script>
</form>

<?php
    }
?>
</div>
</body>
</html>