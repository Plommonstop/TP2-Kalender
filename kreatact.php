<?php

session_start();
    require_once ("mycurl.php");
    $name = "hej";
    $location = "hejj";
    $description = "hejjj";
    $starttime = "2018-13-18 13:00:00";
    $endtime = "2018-13-18 15:00:00";
    $response = myCurl::execute_curl("http://10.130.216.144/~theprovider/calendar/php/create-activity.php",
    [
        "name"=>$name,
        "location"=>$location,
        "description"=>$description,
        "starttime"=>$starttime,
        "endtime"=>$endtime,
        "token"=>$_SESSION["token"],
        "accountID"=>$_SESSION["account"],
    ]);

    $activity = json_decode($response,true);
    echo $response;
?>