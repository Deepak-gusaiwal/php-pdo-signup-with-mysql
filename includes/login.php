<?php
if (isset($_POST['login'])) {
    $loginID = $_POST['loginID'];
    $password = $_POST['password'];

    require_once "./config/dbConnect.php";
    require_once "./login_model.php";
    require_once "./login_controller.php";

    //Error Handling
    $errors = [];
    if (isFieldsEmpty($loginID, $password)) {
        $errors['emptyFields'] = "All Fields Are required!";
    }
    if (isValidID($pdo, $loginID)) {
        $errors['invalideID'] = "UserName OR E-Mail is Invalid!";
    }
    if (isInvalidPassword($pdo, $loginID, $password)) {
        $errors['invalideCredentials'] = "Invalide Credentials!";
    }
    //login Data
    $_SESSION['loginData']=[
        "loginID"=>$loginID
    ];

    require_once "./config/sessionConfig.php";
    if ($errors) {
        $_SESSION['loginErrors'] = $errors;
        header("Location: ../index.php");
        die();
    }

    //login success
    $_SESSION['loginSuccess'] = true;
    $pdo = null;
    $query = null;
    header("Location: ../index.php");
    die();

} else {
    header("Location: ../index.php");
    die();
}
?>