<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 4-9-2019
 * Time: 11:13
**/


if(!empty($_POST['username']) && !empty($_POST['password'])){
if(isset($_POST['username']) && isset($_POST['password']))
    $conn = new mysqli('localhost', 'root', '', 'opdracht4');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password' ";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) == 1){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] =  $password;
        while ($row = mysqli_fetch_assoc($res)) {
            if($_SESSION['username'] == $row['username'] && $_SESSION['password'] == $row['password']){
                echo 'Goed';
            }
        }
    } else {
        echo 'Fout';
    }
}

?>

<form method="POST">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <input type="submit">
</form>
