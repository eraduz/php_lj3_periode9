<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 4-9-2019
 * Time: 10:57
 */

session_start();

$_SESSION['user'] = 'pietje puk';

function isAdmin(){
    if($_SESSION['user'] == 'admin') {
        echo 'Waar';
    } else {
        echo 'Niet waar';
    }
}

isAdmin();