<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Login</title>
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
	$page_title='Login';

	require_once('header.php');
	?>

<h1>Login</h1>

<form method="post" action="validate.php">
    <fieldset>
        <label for="username">Email:*</label>
        <input name="username" id="username" required type="email" />
        </fieldset>
        <fieldset>
            <label for="password">Password:*</label>
            <input name="password" id="password" required type="password" />
            </fieldset>

                <button>Login</button>
                    <?php
require_once('footer.php');
?>
</form>
</body>

</html>