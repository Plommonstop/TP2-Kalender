<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Logga In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
</head>

<body>
<p class="titlel1">Registrera</p>

<a href="index.php">
    <img src="baseline_arrow_back_ios_white_18dp.png" id="tillbaka"/>
</a>

<div class="login">
<h5> WAH </h5>
<br/><br/><br/>

<form  method="POST" action ="Vy.php">
<input type="text" name="username" id="email" placeholder="username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" autocomplete="off"><br/><br/><br/><br/><br/>
<input type="text" name="password" id="lösen" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lösenord'" autocomplete="off">

<input type="submit" value="Registrera" class="loggain2">
<input type="reset" value="Rensa" class="rensa">
</form>

<div class="login2">
    <p>Har du inte ett konto?</p>
</div>

    <hr>
<footer>
  <p>WAH Calendar</p>
</footer>

</body>
</html>