<?php
// connect
require_once('../db.php');


// get movies
$sql = "SELECT * FROM songs";
$cmd = $conn->prepare($sql);
$cmd->execute();
$songs = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert the movies data to a json object and output it
$json_obj = json_encode($songs);

echo $json_obj;

// disconnect
$conn = null;
?>