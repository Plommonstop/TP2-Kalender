<!DOCKTYPE <!DOCTYPE html>
<?php
session_start();
unset($_SESSION['account']);
session_destroy();

header("Location: Loggain.php");
exit;
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src=""></script>
</head>
<body>
    
</body>
</html>>
