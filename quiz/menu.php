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
	require_once('auth.php');
	$page_title=null;
	$page_title='Menu';

	require_once('header.php');
	?>
<main class="container">

    <h1>COMP1006 Application</h1>

    <a href="songs2.php" title="Songs">Songs</a>

</main>
<?php
require_once('footer.php');
?>
<?php

// access the current session

session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
    // if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
}

?>




</body>

</html>