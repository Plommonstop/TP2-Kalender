<!DOCTYPE html>
<?php 
            session_start();
            require_once ("mycurl.php");
            if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $response = myCurl::execute_curl("http://10.130.216.144/~theprovider/generate-token.php",
            [
                "username"=>$username,
                "password"=>$password,
            ]);
            
            $token = json_decode($response,true);
            $_SESSION["token"] = $token["token"];
            $account = json_decode($response,true);
            $_SESSION["account"] = $account["accountID"];
            
    } 
    ?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Bibliotek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <script src="ajaxlib.js"></script>
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
<div id="container">
<textarea id="aktivitet" rows="4">Tillfällig container för text från servern rörande aktivitet</textarea>

</div>
</br>
<div id="logout ">
<p>Welcome <?php echo $_SESSION['account']; ?>,</br> Din token är <?php echo $_SESSION['token'];?></br> 
 <button type="button"><a href="logout.php">logout</button></a></p>
</div>
<footer>
  <p>WAH Calendar</p>
</footer>

</body>
</html>