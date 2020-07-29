<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />-->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">

</head>
<body>
<?php

// name
$name = $_FILES['upload']['name'];
echo "Name $name<br >";

// size
$size = $_FILES['upload']['size'];
echo "Size $size<br />";

// type
$type = $_FILES['upload']['type'];
echo "Type $type<br />";

// get the temp location
$tmp_name = $_FILES['upload']['tmp_name'];
echo "Tmp Name $tmp_name<br />";

// copy file to the uploads folder where it will stay permanently
move_uploaded_file($tmp_name, "uploads/$name");

?>

<!--script src="js/bootstrap.min.js"></script>-->

</body>
</html>