<?php
//
session_start();

    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'dc_activity1';
    //$sno = $_SESSION['varname'];
    $sno = $_GET['ok'];
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    $result = $db->query("SELECT file FROM incident where sno = '$sno' ");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['file']; 
    }else{
        echo 'Image not found...';
    }

?>