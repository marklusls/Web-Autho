<?php

require_once('connection.php');
require_once('classes/createacc-class.php');

session_start();

$_SESSION["user"] = "";
$_SESSION["usertype"] = "";


date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$_SESSION["date"] = $date;

$userCreator = new CreateAcc($database);

if ($_POST) {
    $fname = $_SESSION['personal']['fname'];
    $lname = $_SESSION['personal']['lname'];
    $name = $fname . " " . $lname;
    $address = $_SESSION['personal']['address'];
    $dob = $_SESSION['personal']['dob'];
    $email = $_POST['newemail'];
    $tele = $_POST['tele'];
    $newpassword = $_POST['newpassword'];
    $cpassword = $_POST['cpassword'];

    if ($newpassword == $cpassword) {
        $result = $userCreator->createUser($email, $name, $newpassword, $address, $dob, $tele);
        if ($result === true) {
            $_SESSION["user"] = $email;
            $_SESSION["usertype"] = "p";
            $_SESSION["username"] = $fname;

            header('Location: patient/index.php');
            exit();
        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">' . $result . '</label>';
        }
    } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }
} else {
    $error = '<label for="promter" class="form-label"></label>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <table border="0" style="width: 69%;">
                <tr>
                    <td colspan="2">
                        <p class="header-text">Let's Set You Up</p>
                        <p class="sub-text">Please provide the details below</p>
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST" >
                        <td class="label-td" colspan="2">
                            <label for="newemail" class="form-label">Email: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                    </td>
                    
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="tele" class="form-label">Mobile Number: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="tel" name="tele" class="input-text"  placeholder="ex: 0712345678" pattern="[0]{1}[0-9]{9}" >
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="newpassword" class="form-label">Create New Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="cpassword" class="form-label">Conform Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required>
                    </td>
                </tr>
         
                <tr>
                    
                    <td colspan="2">
                        <?php echo $error ?>

                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                    </td>
                    <td>
                        <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                        <a href="login.php" class="hover-link1 non-style-link">Login</a>
                        <br><br><br>
                    </td>
                </tr>

                        </form>
                </tr>
            </table>

        </div>
    </center>
</body>
</html>