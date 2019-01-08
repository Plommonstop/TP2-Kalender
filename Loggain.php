<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Logga In - WAH Kalender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
</head>

<body>
<p class="titlel1">Logga In</p>

<a href="index.php">
    <img src="baseline_arrow_back_ios_white_18dp.png" id="tillbaka"/>
</a>

<div class="login">
<h5> WAH </h5>
<br/><br/><br/>

<form  method="POST" action ="Vy.php">
<input type="text" name="username" id="email" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" autocomplete="off"><br/><br/><br/><br/><br/>
<input type="text" name="password" id="lösen" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" autocomplete="off">

<input type="submit" value="Logga In" class="loggain2">
<input type="reset" value="Rensa" class="rensa">
</form>

<div class="login2">
    <p>Har du inte ett konto?</p>
</div>

<footer>
  <p>WAH Kalender</p>
</footer>

</body>
</html>