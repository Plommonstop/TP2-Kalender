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
    <title>WAH Kalender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <script src="kod.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

<div class="addActivities">
<p class="aktivtext">Lägg till aktivitet</p>
<img src="add2.png" class="addActivity">
</div>

<div class="createActivity">

<img src="back.png" class="hide-createActivity"/>

<h4>Skapa Aktivitet</h4>

<form  method="POST" action ="Vy.php">

<input type="text" name="activityName" id="activityName" placeholder="Namn på aktivitet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Namn på aktivitet'" autocomplete="off"><br/><br/><br/><br/>
<input type="text" name="activityDesc" id="activityDesc" placeholder="Beskrivning" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Beskrivning'" autocomplete="off"><br/><br/><br/><br/>
<input type="text" name="location" id="location" placeholder="Plats" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Plats'" autocomplete="off"><br/><br/><br/><br/><p>Start-tid</p>
<input type="datetime-local" name="starttime" id="stime" placeholder="Start-tid" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start-tid'" autocomplete="off"><br/><br/><br/><br/><p>slut-tid</p>
<input type="datetime-local" name="endtime" id="etime" placeholder="Slut-tid" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Slut-tid'" autocomplete="off"><br/>


<input type="submit" value="Skapa" class="Skapa">
<input type="reset" value="Rensa" class="rensa2">
</form>
</div>

<script>
$(".addActivities").click(function(){
    $(".createActivity").addClass("show-createActivity");
});
$(".hide-createActivity").click(function(){
    $(".createActivity").removeClass("show-createActivity");
});
</script>



<footer>
  <p>WAH Calendar</p>
</footer>

</body>
</html>