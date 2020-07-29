<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">    
        <title>Song Deleted</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
        

    </head>
    <body>
    <a href = "song.php">click to add a new song to the data base</a></br>
    <a href = "songs2.php">click to see list of songs </a>
        <?php

        // capture the selected movie_id from the url and store it in a variable with the same name
        $song_id = $_GET['song_id'];


        //connect to the data base
        $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');

        // set up the SQL command
        $sql = "DELETE FROM songs WHERE song_id = :song_id";



        // create a command object so we can populate the movie_id value, the run the deletion
        $cmd = $conn->prepare($sql);  // creating a command object where we bind our conn and  the sql query
        $cmd ->bindParam(':song_id', $song_id, PDO::PARAM_INT); 
        //$movies =  $cmd -> fetchAll(); // in the  movies array  we created we fill it uop by calling the fetchAll()
       $cmd->execute();
       

        $conn =  null;

        header('location:songs2.php');
        ?>
        <script src="js/bootstrap.min.js"></script>

    
    
    </body>






</html>
