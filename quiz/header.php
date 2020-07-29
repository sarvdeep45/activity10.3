<!Doctype html>
<html>
<head>
    <meta charset ="utf-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
</head>
<body>
<nav class="navbar">
<a href="menu.php" title="COMP1006 Application" class="navbar-brand">COMP1006 APP</
<ul >

<?php session_start();
if (!empty($_SESSION['user_id'])) { ?>
   <li><a href="songs2.php" title="Songs" class="nav navbar">Songs</a></li>
    <li><a href="logout.php" title="logout" class="nav navbar">logout</a></li>
<?php } else { ?>
<li><a href="register.php" title="register" class="nav navbar">register</a></li>
<li><a href="login.php" title="login" class="nav navbar">login</a></li>
<?php } ?>
</ul>
</nav>