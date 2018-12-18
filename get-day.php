<?php

    include 'get-day.json';
    
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
    $response = null;
    

        
        
        $response = [
            "status" => true,
            "message" => "Dagen hämtad",
            
        ];
    
    {
        
        
    } 
    {
        echo json_encode($response);
    }
?>