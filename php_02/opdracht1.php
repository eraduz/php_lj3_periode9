<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 4-9-2019
 * Time: 10:57
 */

session_start();

$_SESSION['teller']++;

echo "Aantal keer dat de pagina bekeken is: " . $_SESSION['teller'];
