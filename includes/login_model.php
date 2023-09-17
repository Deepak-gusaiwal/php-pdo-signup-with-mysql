<?php
function checkID($pdo, $loginID)
{
    $sql = "SELECT * FROM users WHERE name = :loginID OR email = :loginID";
    $query = $pdo->prepare($sql);
    $query->bindParam(":loginID", $loginID);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function verifyUserInDB($pdo,$loginID,$password)
{
    $sql = "SELECT * FROM users WHERE name = :loginID OR email = :loginID";
    $query = $pdo->prepare($sql);
    $query->bindParam(":loginID", $loginID);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $storedPassword = $result['password'];
    $verified = password_verify($password,$storedPassword);
    return $verified;
}
?>