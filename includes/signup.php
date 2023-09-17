<?php
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once "./config/dbConnect.php";
        require_once "./signup_model.php";
        require_once "./signup_controller.php";

        //Error Handling
        $errors = [];
        if (isEmptyFields($name, $email, $password)) {
            $errors['emptyFields'] = "All Fields are required!";
        }
        if (isEmailInvalid($email)) {
            $errors['invalideEmail'] = "Email is Invalid!";
        }
        if (isUserNameTaken($pdo, $name)) {
            $errors['userNameTaken'] = "User Name is Already Taken!";
        }
        if (isEmailRegistred($pdo, $email)) {
            $errors['emailRegistred'] = "This Email is Already Registered!";
        }
        //include session start
        require_once "./config/sessionConfig.php";

        $_SESSION['signupData'] = [
            "name" => $name,
            "email" => $email
        ];
        if ($errors) {
            $_SESSION['signupErrors'] = $errors;
            header("Location: ../index.php");
            die();
        }
        //create user
        createUser($pdo, $name, $email, $password);
        $_SESSION['isSignup'] = true;
        $pdo = null;
        $query = null;
        header("Location: ../index.php");
        die();

    } catch (PDOException $e) {
        die("Error: Signup Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
?>