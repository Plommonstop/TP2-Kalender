<?php

session_start();
require_once ("mycurl.php");
$response = myCurl::execute_curl("http://10.130.216.144/~theprovider/calendar/php/get-day.php",

            [
                "token"=>$_SESSION["token"],
                "accountID"=>$_SESSION["account"]
            ]);
            var_dump ($result);
            $activity = json_decode($response,true);
            var_dump ($activity);
?>