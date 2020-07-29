<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>saved song  confirmation page</title>
    
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
</head>
<body>
<a href="songs2.php">link to see list of songs</a><br />
<a href="song.php">link to add to list of songs</a><br />

<?php

session_start();
if (empty($_SESSION['user_id'])) {
    // if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
 }

// store the song_id if we are editing.  if we are adding, this value will be empty (which is ok)
//$song_id = $_POST['song_id'];

// save form inputs into variables
$title = $_POST['title'];
$writer = $_POST['writer'];
$musiclabel = $_POST['musiclabel'];
$genre = $_POST['genre'];
$photo = null;
$song_id  = $_POST['song_id'];


$ok=true;

if(!empty($_FILES['photo'])) {
    $photo = $_FILES['photo']['name'];
    if($_FILES['photo']['type' != 'image/jpeg'])
    {
        echo 'Invalid photo<br />';
        $ok = false;


    }
    else
    {

            //valid photp
            session_start();

            $final_name = session_id() . '_' . $photo;
            $tmp_name = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp_name, "images/$final_name");

    }


}

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($writer)) {
    // notify the user
    echo 'writer is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}


if (empty($musiclabel)) {
    // notify the user
    echo 'music label is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($genre)) {
    // notify the user
    echo 'genre is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}




if($ok==true)
{
   // $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');
   // $sql = "INSERT INTO songs (title, writer, musiclabel, genre) VALUES (:title, :writer, :musiclabel, :genre)";


   
   // move all the save code we wrote last week in here, starting with the database connection and ending with the disconnect command
   $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');
   //$sql = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";
   if (empty($song_id)) {
    // set up the SQL INSERT command
    $sql = "INSERT INTO songs (title, writer, musiclabel, genre, photo) VALUES (:title, :writer, :musiclabel, :genre, :photo)";
}
else {
    // set up the SQL UPDATE command to modify the existing movie
    $sql = "UPDATE songs SET title = :title, writer = :writer, musiclabel = :musiclabel, genre = :genre, photo = :photo WHERE song_id = :song_id";
}
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
    $cmd->bindParam(':writer', $writer, PDO::PARAM_STR, 100);
    $cmd->bindParam(':musiclabel', $musiclabel, PDO::PARAM_STR, 100);
    $cmd->bindParam(':genre', $genre, PDO::PARAM_STR, 100);
    $cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 100);


    if (!empty($song_id)) {
        $cmd->bindParam(':song_id', $song_id, PDO::PARAM_INT);
    }
    
    $cmd->execute();
    $conn = null;

    echo "Song Saved";
  

}
header('location:songs2.php');

?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
