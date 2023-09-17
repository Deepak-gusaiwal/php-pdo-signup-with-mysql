<?php
function isEmptyFields($name, $email, $password)
{
    if (empty($name) || empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}

function isUserNameTaken($pdo, $name)
{
    if (alreadyUserHas($pdo, $name)) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistred($pdo, $email)
{
    if (alreadyEmailHas($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function createUser($pdo, $name, $email, $password)
{
    registerUser($pdo, $name, $email, $password);
}
?>