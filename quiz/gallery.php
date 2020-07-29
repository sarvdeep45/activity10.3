<?php

$page_title = 'Gallery';
require_once('header.php');





require_once('auth.php');

require_once('db.php');

$sql = "SELECT movie_id, title, photo FROM movies WHERE photo IS NOT NULL";
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll();

foreach ($movies as $movie)

{
    echo <div><img src="images/' . $movie['photo'] . '" title="'. $movie['title'] . '" /> </div>;

    $conn = null;

}

>?

<?php require_once('foooter.php'); 
?>






