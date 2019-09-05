<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 4-9-2019
 * Time: 11:01
 */

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    if(isset($_SESSION['username']) && isset($_POST['password'])){
        if($_SESSION['username'] == 'admin' && $_SESSION['password'] == 'password'){
            echo 'Goed';
        } else {
            echo 'Fout';
        }
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <input type="submit">
</form>
