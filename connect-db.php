<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

<?php

// Paramters needed to connect to DB
$hostname = 'localhost';
$dbname = 'mattcc1398';
$username = 'mattcc1398';
$password = NULL;

$dsn = "mysql:host=$hostname;dbname=mattcc1398";

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