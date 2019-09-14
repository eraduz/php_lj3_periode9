<?php
require_once('./Connection.php');
class Galgje extends Connection
{

    function Galgje()
    {
        Connection::openConnection();
        $stmt = Connection::$conn->prepare('SELECT * FROM woorden ORDER BY RAND () LIMIT 1');
        $stmt->execute();
        $woord = $stmt->fetch(PDO::FETCH_ASSOC);
        // echo $woord['woorden'];
            if(isset($_POST['woord']) || isset($_POST['submit'])){
                $woordform = $_POST['woord'];
                if(strpos($woord, $woordform)){
                    echo $woord['woorden'];
                }
            } else {
                echo 'Er ging wat mis';
            }
    }    
}
