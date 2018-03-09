<?php
function connectToDB()
{

$host    = "localhost"; // naam / locatie database server
$user    = "root"; // gebruikersnaam om in te loggen op de database server
$pass    = ""; // wachtwoord
$dB      = "alper_kuyumcu_guestbook"; // naam van de database

// object oriented way of connectin to the database
    $conn = new mysqli($host, $user, $pass, $dB);
    
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 } else {
  return $conn;
 }
}
?>
