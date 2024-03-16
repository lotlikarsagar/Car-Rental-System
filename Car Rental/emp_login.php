<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="login_page.css"/>
</head>
<body class="body">
    <div class="login-page">
        <?php
        require('db.php');
        session_start();
       
        if (isset($_POST['employee_id'])) { // Corrected the POST variable name
            $employee_id = stripslashes($_REQUEST['employee_id']); 
            $employee_id = mysqli_real_escape_string($con, $employee_id);
            $password = stripslashes($_REQUEST['password']); 
            $password = mysqli_real_escape_string($con, $password);
          
            $query = "SELECT * FROM `employee` WHERE emp_id='$employee_id' AND emp_password='$password'"; 
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['emp_id'] = $employee_id;
                header("Location: admin_panel/index.php");
            } else {
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='login_page.php'>Login</a> again.</p>
                      </div>";
            }
        } else {
        ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title"> ADMIN LOGIN</h1>
            <input type="text" class="login-input" name="employee_id" placeholder="Employee ID" autofocus="true"/> 
            <input type="password" class="login-input" name="password" placeholder="Password"/>
            <input type="submit" value="Login" name="submit" class="login-button"/>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
