<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];



$connectionString = "mysql:host=localhost:3306;dbname=cash;charset=utf8mb4";
$connectionOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $pdo = new PDO($connectionString, 'root', '', $connectionOptions);
    /*     $pre = $pdo->query("SELECT * FROM users");
    $users = $pre->fetchAll();

    foreach ($users as $user) {

        if ($user['email'] === $email) {
            if ($user['password'] === $password) {
                $_SESSION['connected'] = true;
                header('Location: /cash/private.php');
            }
        }
    } */

    $sql = ("SELECT email, role FROM users where email = :email AND password = :password ");
    $preq = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $preq->execute(['email' => $email, 'password' => $password]);
    $user = $preq->fetch();
    print_r($user);

    if ($user['email'] === $email) {
        $_SESSION['connected'] = true;
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
    }
    header('Location: private.php');
    exit;
} catch (PDOException $e) {
    print_r($e);
}
