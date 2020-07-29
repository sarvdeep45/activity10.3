<?php ob_start(); ?>

    <!DOCTYPE html>
    <html>

    <body>

    <?php
    // store the inputs & hash the password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');

    // write the query
    $sql = "SELECT * FROM users WHERE username = :username";

    // create the command, run the query and store the result
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    // $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();
    $user = $cmd->fetch();

    // if count is 1, we found a matching username in the database.  Now check the password
    if (password_verify($password, $user['password'])) {
        // user found
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
       // session_start();

        header('location:menu.php');



    }
    else {
        // user not found
        header('location:login.php?invalid=true');
        echo 'invalid login';
        exit();
    }


    $conn = null;




    ?>

    </body>
    </html>
<?php ob_flush(); ?>