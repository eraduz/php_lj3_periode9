<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 4-9-2019
 * Time: 11:13
**/

session_start();

$conn = new mysqli('localhost', 'root', '', 'opdracht4');


if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
//    var_dump($_POST);
    $query = "SELECT * FROM 'users' WHERE username='$username' AND WHERE password = '$password' ";
    $result = mysqli_query($conn, $query);
    var_dump($result);
    $rows = mysqli_num_rows($result);
    if($rows == 1){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
        echo "Goed";
    }else{
        echo 'Fout';
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <input type="submit">
</form>
