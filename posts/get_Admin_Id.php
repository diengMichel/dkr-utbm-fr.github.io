<?php
//Request the isAdmin value for the user that created the post
function getAdminId($postId){

    global $conn;

$adminIdQuery = "SELECT user.Admin FROM user WHERE user.id = $postId";
$adminId = $conn->query($adminIdQuery);

if ( $adminId->num_rows > 0 ){ 
  $resultAdminId = $adminId->fetch_assoc();
  return $resultAdminId;
}else {
  return null;
}
}

?>