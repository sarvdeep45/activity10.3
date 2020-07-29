<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add another song</title>
  
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
</head>
<body>
<a href="songs2.php">link to see list of songs</a>
<?php 

require_once('auth.php');
	$page_title=null;
	$page_title='Song';

    require_once('header.php');
    $photo = null;
    $song_id = null;
    $title = null;
    $writer = null;
    $musiclabel = null;
    $genre = null;

    session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
    // if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
 }

    // check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['song_id']) == false) {
    $song_id = $_GET['song_id'];

    // connect
 //  $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');
   require_once('db.php');

    // write the sql query
    $sql = "SELECT * FROM songs WHERE song_id = :song_id";
    
    // execute the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':song_id', $song_id, PDO::PARAM_INT);
    $cmd->execute();
    $song = $cmd->fetch();
    
    // populate the fields for the selected movie from the query result

    $photo = $song['photo'];

    $title = $song['title'];
    $writer = $song['writer'];
    $musiclabel = $song['musiclabel'];
    $genre = $song['genre'];
    
    
    // disconnect
    $conn = null;
}



?>



<div class="container">
        <h1>Song Details</h1>
        <form method="post" action="save-song.php" enctype="multipart/form-data">
            <fieldset class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input name="title" id="title" required value="<?php echo $title; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="writer" class="col-sm-2">Writer:</label>
                <input name="writer" id="writer" required value="<?php echo $writer; ?>"/>
            </fieldset>
             <fieldset class="form-group">
                <label for="musiclabel" class="col-sm-2">Music Label:</label>
                <input name="musiclabel" id="musiclabel" required value="<?php echo $musiclabel; ?>"/>
            </fieldset>

            <fieldset class="form-group">
                <select id="genre" name="genre" required value="<?php echo $genre; ?>">
                    <option value="metal">Metal</option>
                    <option value="classic">Classic</option>
                    <option selected value="hiphop">Hip-Hop</option>
                    <option value="rock">Rock</option>
                    <option value="other">other</option>
                 </select>
            </fieldset>
            <input name="song_id" type="hidden" value="<?php echo $song_id; ?>" />

            <fieldset class="form-group">
                <label for="photo" class="col-sm-2">Photo:</label>
                <input type="file" id="photo" name="photo" />




            </fieldset>
            <?php if (!empty($photo)) { ?>
            <div class="col-sm-offset-2">

                <img src="images/<?php echo $photo; ?>" alt="Song Poster" />
            </div>
            <?php } ?>
            <input name="song_id" type="hidden" value="<?php echo $song_id; ?>" />
            
            <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
        </form>
    </div>
    <?php
require_once('footer.php');
?>

<script src="js/bootstrap.min.js"></script>


</body>
</html>
