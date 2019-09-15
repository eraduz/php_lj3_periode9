<?php
require_once('./Connection.php');
session_start();
Connection::openConnection();

$stmt = Connection::$conn->prepare('SELECT * FROM woorden ORDER BY RAND () LIMIT 1');
$stmt->execute();
$woord = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['whitelist'])) {
    $_SESSION['whitelist'] = [];
}

try {
    if (!isset($_POST['woord']) && empty($_POST['woord'])) {
        throw new Exception();
    } else {
        $woordform = $_POST['woord'];
    }


    if (strpos($woord['woorden'], $woordform) === false) {
        throw new Exception('Dit letter zit niet in het woord');
    }

    $_SESSION['whitelist'][] = $woordform;


} catch (\Exception $e) {
    echo $e->getMessage();
}

$string = $woord['woorden'];
$parts = "";
foreach ($_SESSION['whitelist'] as $value) {
    $parts .= "[^$value]";
}
$pattern = "/" . $parts . "[\S]/";
print_r($pattern);
echo $woord['woorden'];
print_r($_SESSION);
//$pattern = "/[\S]/";
$replace = '*';
$poephoofd = preg_replace($pattern, $replace, $string);
echo $poephoofd;