<?php
function alreadyUserHas($pdo, $name)
{
    $sql = "SELECT name FROM users Where name =:name";
    $query = $pdo->prepare($sql);
    $query->bindParam(":name", $name);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function alreadyEmailHas($pdo, $email)
{
    $sql = "SELECT email FROM users Where email =:email";
    $query = $pdo->prepare($sql);
    $query->bindParam(":email", $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function registerUser($pdo, $name, $email, $password)
{
    $options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    $sql = "INSERT INTO users (name,email,password) VALUE(:name,:email,:password)";
    $qurey = $pdo->prepare($sql);
    $qurey->bindParam(":name", $name);
    $qurey->bindParam(":email", $email);
    $qurey->bindParam(":password", $hashedPassword);
    $qurey->execute();
}