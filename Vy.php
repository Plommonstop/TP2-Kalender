<!DOCTYPE html>
<?php 
            require_once ("mycurl.php");
            if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $response = myCurl::execute_curl("http://10.130.216.144/~theprovider/generate-token.php",
            [
                "username"=>$username,
                "password"=>$password,
            ]);
            var_dump($response);
            $token = json_decode($response,true);
            $_SESSION["token"] = $token["token"];
            $account = json_decode($response,true);
            $_SESSION["account"] = $account["accountID"];
    } ?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Bibliotek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <script src="kod.js"></script>
</head>

<body class="body1" onload="createTable();createLists();">

<div id="omslag">

            <div id="kalender">
            </div>
            <div id="years">
            </div>
            <div id="month">
            </div>

</div>


<footer>
  <p>WAH Calendar</p>
</footer>

</body>
</html>