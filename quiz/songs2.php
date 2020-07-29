<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">    
        <title>songs Listings</title>
    
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">

        

    </head>
    <body>
    <a href="song.php">link to add to list of songs</a><br />
   
        <?php
            require_once('auth.php');
            $page_title=null;
            $page_title='Song';
        
            require_once('header.php');


        // access the current session

    session_start();

    // check if there is a user identity stored in the session object
//if (empty($_SESSION['user_id'])) {
   // if there is no user_id in the session, redirect the user to the login page
  // header('location:login.php');
 //  exit();
 //   }
        //connect to the data base
        $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');

        // prepare up the sql query
        $sql = "SELECT * FROM songs";
        //run the query and store th eresults
        $cmd = $conn->prepare($sql);  // creating a command object where we bind our conn and  the sql query
        $cmd -> execute(); // execute method this executes whatever sql statement we have prepared
        $songs =  $cmd -> fetchAll(); // in the  movies array  we created we fill it uop by calling the fetchAll()
       
        //start the grid
        echo '<table><thead><th>title</th><th>writer</th><th>musiclabel</th><th>genre</th>';
        
        if(!empty($_SESSION['user_id']))
        {

          echo  '<th>Edit</th><th>Delete</th>';


        }
        
        echo '</thead><tbody>';
       
        // loop through the data and display results 
        foreach($songs as $song)  // we are moving through the movies array and calliing it singuular movie
        {
            //echo $movie['title'] . '<br/>'; // this will print out all our movi titles one by one
            echo'<tr><td>' . $song['title'] .
             '</td><td>' . $song['writer'] .
              '</td><td>' . $song['musiclabel'] .
               '</td><td>' . $song['genre'] . '</td>';
               if(!empty($_SESSION['user_id']))
               {
                    echo '<td><a href="song.php?song_id=' .$song['song_id'] .'">Edit</a>
                    </td><td><a href = "delete-song.php?song_id='.$song['song_id'].'"onclick="return confirm(\'Are you sure you want to delete this song?\');">Delete</a></td>';

               }
                
               echo '</tr>';
        }
        // close the grid 
        echo '</tbody></table>';
        // disconnect

        $conn =  null;
        ?>
        <script src="js/bootstrap.min.js"></script>

    
    
    </body>






</html>
