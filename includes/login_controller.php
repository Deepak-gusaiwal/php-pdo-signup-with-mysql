<?php
function isFieldsEmpty($loginID, $password)
{
    if (empty($loginID) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
function isValidID($pdo, $loginID)
{
    if (checkID($pdo, $loginID)) {
        return false;
    } else {
        return true;
    }
}
function isInvalidPassword($pdo, $loginID, $password)
{
    if (verifyUserInDB($pdo, $loginID, $password)) {
        return false;
    } else {
        return true;
    }
}
?>