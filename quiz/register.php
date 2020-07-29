<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">


</head>
<body>

<?php
    require_once('header.php');
?>

<h1>User Registrations</h1>

<form method="post" action="save-registration.php">
    <fieldset>
        <label for="username">Email:*</label>
        <input name="username" id="username" required type="email" value="<?php echo $username; ?>" />
        </fieldset>
        <fieldset>
            <label for="password">Password:*</label>
            <input name="password" id="password" required type="password" />
            </fieldset>
            <fieldset>
                <label for="confirm">Confirm Password:*</label>
                <input name="confirm" id="confirm" required type="password" />
                </fieldset>
                <button>Register</button>
</form>
</body>

</html>