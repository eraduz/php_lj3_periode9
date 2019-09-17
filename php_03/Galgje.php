<?php
require_once('./Connection.php');
session_start();
Connection::openConnection();


if (!isset($_SESSION['whitelist'])) {
    $_SESSION['whitelist'] = [];
}
if (!isset($_SESSION['woord'])) {
    $stmt = Connection::$conn->prepare('SELECT * FROM woorden ORDER BY RAND () LIMIT 1');
    $stmt->execute();
    $woord = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['woord'] = $woord;
}

$woord = $_SESSION['woord'];

try {
    if (!isset($_POST['woord']) && empty($_POST['woord'])) {
        throw new Exception();
    } else {
        $woordform = $_POST['woord'];
    }


    if (strpos($woord['woorden'], $woordform) === false) {
        throw new Exception('Dit letter zit niet in het woord </br>');
    }

    $_SESSION['whitelist'][] = $woordform;


} catch (\Exception $e) {
    echo $e->getMessage();
}

$string = $woord['woorden'];
$pattern ='/[^';
foreach ($_SESSION['whitelist'] as $value) {
    $pattern .= $value . ",";
}
$pattern =trim($pattern, ',');
$pattern .= "]/";
//echo $pattern;
$pattern = $_SESSION['whitelist'] == [] ? '/\S/': $pattern;
//$pattern = "/" . $parts . "[\S]/";
// print_r($pattern);
// echo $woord['woorden'];
// print_r($_SESSION);

//$pattern = "/[\S]/";
$replace = '*';
$poephoofd = preg_replace($pattern, $replace, $string);
echo $poephoofd;