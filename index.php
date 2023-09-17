<?php
require_once "./includes/config/sessionConfig.php";
require_once "./includes/signup_view.php";
require_once "./includes/login_view.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup and login system in php</title>
    <link rel="stylesheet" href="./assets/main.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php 
    if(isset($_SESSION['loginData'])){
        echo $_SESSION['loginData']['loginID']; echo "<br>";
    }
  
    ?>
    <h1 class="mainHeading">Signup & login System in PHP/MYSQL</h1>
    <form method="post" action="./includes/login.php">
        <h3>Login</h3>
        <input placeholder="E-Mail or Name" type="text" name="loginID" value="<?php ?>">
        <input placeholder="password" type="password" name="password" value="">
        <button type="submit" name="login">login</button>
        <?php checkLoginSubmission(); ?>
    </form>

    <form method="post" action="./includes/signup.php">
        <h3>Signup</h3>
        <input placeholder="Name" type="text" name="name" value="<?php
        if (
            isset($_SESSION['signupData']['name']) &&
            !isset($_SESSION['signupErrors']['userNameTaken'])
        ) {
            echo $_SESSION['signupData']['name'];
        }
        ?>">
        <input placeholder="E-mail" type="text" name="email" value="<?php
        if (
            isset($_SESSION['signupData']['email']) &&
            !isset($_SESSION['signupErrors']['invalideEmail']) &&
            !isset($_SESSION['signupErrors']['emailRegistred'])
        ) {
            echo $_SESSION['signupData']['email'];
        }
        ?>">
        <input placeholder="password" type="password" name="password" id="">
        <button type="submit" name="signup">signup</button>
        <?php checkSignupSubmission() ?>
    </form>
</body>

</html>