<?php

//API 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ('db_connect.php');

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
if (isset($_GET['ssid']) && isset($_GET['rssi'])) {
 
    $ssid = $_GET['ssid'];
    $rssi = $_GET['rssi'];
 
    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
 
    // Fire SQL query to insert data in networks
    $result = mysql_query("INSERT INTO networks(ssid,rssi) VALUES('$ssid','$rssi')");

     
    echo "<br>Records Updated: ".$raf = mysql_affected_rows(); 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Data entered successfully";

        //renumbering
        mysql_query('SET @i = 0');
        $result = "UPDATE networks SET id=(@i:=@i+1);;";
        mysql_query($result) OR die(mysql_error());

        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Failed to insert data in database";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>