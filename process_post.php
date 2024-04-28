<?php

// this file is used to process the post message input from a user 
// It checks if the message box is not empty and is set 
// If those conditions are true, the message written by the user is pushed to the database with the ID of the user who made the message. 
// In the database, this row will be given an id and a date/time of creation

include("./PageParts/db_logic.php");
ConnectDatabase();
$loginStatus = CheckLogin();

if(isset($_POST["messageSender__input"]) && !empty($_POST["messageSender__input"])){
  // Insert new post into database
  $user_message = SecurizeString_ForSQL($_POST["messageSender__input"]);

  $insert_query = "INSERT INTO `post` VALUES (NULL, '$user_message', NULL, '$userID', '1')";
  $conn->query($insert_query);
  
} else { 
    echo 'enter  a message';
}

header("Location:userPage.php?id=".$userID);
?>

