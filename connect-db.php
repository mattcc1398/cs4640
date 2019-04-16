<?php
$hostname = 'localhost';

$dbname = 'dtmccs4640';

$username = 'dtmccs4640';
$password = 'pwordfor4640';

$dsn = "mysql:host=$hostname;dbname=dtmccs4640";

try{
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e)
{
    $error_message = $e->getMessage();
    echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e){
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
}
?>