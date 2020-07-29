<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Saving your Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">


</head>
<body>



<?php
// het the form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

//validate the inputs
if(empty($username))
{
    echo 'Username is required<br />';
    $ok = false;


}

if(empty($password))
{
    echo 'password is required<br />';
    $ok = false;


}

if($password != $confirm)
{
    echo 'passwords do not match<br />';
    $ok = false;


}

if($ok)
{
    // hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // SET UP AND EXECUTE THE INSERT
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Sarvdeep200446340', 'Sarvdeep200446340', 'oBMzfkO_jf');
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam( ':username', $username,  PDO::PARAM_STR, 50);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
        $cmd->execute();
        //disconect

        $conn = null;

        //show a message to the user
        echo 'Registration Saved';




    }




?>



</body>

</html>