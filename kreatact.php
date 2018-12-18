<?php

session_start();
require_once ("mycurl.php");
if(isset($_POST["name"]) && isset($_POST["starttime"])){
$name = $_POST["name"];
$location = $_POST["location"];
$description = $_POST["description"];
$starttime = $_POST["starttime"];
$endtime = $_POST["endtime"];
$forCalendarID = $_POST["forCalendarID"];
$response = myCurl::execute_curl("http://10.130.216.144/~theprovider/calendar/php/create-activity.php",
[
    "name"=>$name,
    "location"=>$location,
    "description"=>$description,
    "starttime"=>$starttime,
    "endtime"=>$endtime,
    "forCalendarID"=>$forCalendarID
]);
}
    var_dump ($result);
?>