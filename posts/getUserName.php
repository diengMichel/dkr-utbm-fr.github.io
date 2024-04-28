<?php 
// Function used to display the username of the user based on the id of the post 
function displayUserName($postId){

    global $conn;

$userNameQuery = "SELECT user.username FROM post JOIN user ON post.user_id = user.id WHERE post.id_post = $postId";
$userName = $conn->query($userNameQuery);

if ( $userName->num_rows > 0 ){ 
  $resultUserName = $userName->fetch_assoc();
}
return $resultUserName['username'];
}

//Function used to display the id of the use based on the id of the post 
function displayUserId($postId){

  global $conn;

$userIdQuery = "SELECT user.id FROM post JOIN user ON post.user_id = user.id WHERE post.id_post = $postId";
$userId = $conn->query($userIdQuery);

if ( $userId->num_rows > 0 ){ 
$resultUserName = $userId->fetch_assoc();
}
return $resultUserName['id'];
}

// Function used to display the username based on the id of the comment 
function displayUserNameFromComment($commentId){
  global $conn;

  $userNameQuery = "SELECT user.username FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_comments = $commentId";
  $userName = $conn->query($userNameQuery);

if ( $userName->num_rows > 0 ){ 
  $resultUserName = $userName->fetch_assoc();
}
return $resultUserName['username'];

}

// Function used to retrieve the id of the user based on the id of the comment
function displayCommentUserId($commentId){

  global $conn;


  $userIdQuery = "SELECT user.id FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_comments = $commentId";
  $userId = $conn->query($userIdQuery);

if ( $userId->num_rows > 0 ){ 
$resultUserName = $userId->fetch_assoc();
}
return $resultUserName['id'];
}

//Function used to retrieve the number of likes based on the id of the post 
function displayNumberOfLikes($postId){
  global $conn;

  $likeQuery = "SELECT COUNT(*) FROM likes WHERE id_post = $postId";
  $likeNumber = $conn->query($likeQuery);

  if ( $likeNumber->num_rows > 0 ){ 
    $resultlikeNumber = $likeNumber->fetch_assoc();
    }
    return $resultlikeNumber['COUNT(*)'];

}

// Function used to retrieve the username of a user based on his ID
function displayuserNameFromId($userNameId){
  global $conn;

  $userPseudoQuery = "SELECT * FROM  user WHERE id = $userNameId ";
  $userPseudo = $conn->query($userPseudoQuery);

  if ( $userPseudo->num_rows > 0 ){ 
    $resultName = $userPseudo->fetch_assoc();
    }
    return $resultName['username'];

}


?>