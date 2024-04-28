<?php
// this file is used to process the post message input from a user 
// It checks if the message box is not empty and is set 
// If those conditions are true, the message written by the user is pushed to the database with the ID of the user who made the message. 
// In the database, this row will be given an id and a date/time of creation

include("./PageParts/db_logic.php");
ConnectDatabase();
$loginStatus = CheckLogin();

if(isset($_POST["commentSender__input"]) && !empty($_POST["commentSender__input"])){
  // Insert new post into database
  $user_comment = SecurizeString_ForSQL($_POST["commentSender__input"]);
  $postId = SecurizeString_ForSQL($_POST["postId"]);  
  

  $insert_query = "INSERT INTO `comment` VALUES (NULL,$postId ,'$userID' ,'$user_comment', NULL)";
  $conn->query($insert_query);
  
} else { 
    echo 'enter  a message';
}

header("Location:userPage.php?id=".$userID);
?>
