<?php 

function getFollowNumber($idUser){
    global $conn;

    $followQuery = "SELECT COUNT(*) from followers where id_user_suivi = $idUser";
    $followNumber = $conn->query($followQuery);

  if ( $followNumber->num_rows > 0 ){ 
    $resultFollowNumber = $followNumber->fetch_assoc();
    }
    return $resultFollowNumber['COUNT(*)'];
}

function getFollowersNumber($idUser){
    global $conn;

    $followersQuery = "SELECT COUNT(*) from followers where id_user = $idUser";
    $followersNumber = $conn->query($followersQuery);

  if ( $followersNumber->num_rows > 0 ){ 
    $resultFollowersNumber = $followersNumber->fetch_assoc();
    }
    return $resultFollowersNumber['COUNT(*)'];

}

function getPostNumber($idUser){
    global $conn;

    $followersQuery = "SELECT COUNT(*) from post where user_id = $idUser";
    $followersNumber = $conn->query($followersQuery);

  if ( $followersNumber->num_rows > 0 ){ 
    $resultFollowersNumber = $followersNumber->fetch_assoc();
    }
    return $resultFollowersNumber['COUNT(*)'];

}

// Function used to retrieve the number of likes that a user has given
function getGivenLikeNumber($idUser){
    global $conn;

    $followersQuery = "SELECT COUNT(*) from likes where id_user = $idUser";
    $followersNumber = $conn->query($followersQuery);

  if ( $followersNumber->num_rows > 0 ){ 
    $resultFollowersNumber = $followersNumber->fetch_assoc();
    }
    return $resultFollowersNumber['COUNT(*)'];

}

// Function used to retrieve the number of likes that a user has got
function getLikeGotNumber($idUser){
    global $conn;

    $followersQuery = "SELECT COUNT(*) from likes where id_user = $idUser";
    $followersNumber = $conn->query($followersQuery);

  if ( $followersNumber->num_rows > 0 ){ 
    $resultFollowersNumber = $followersNumber->fetch_assoc();
    }
    return $resultFollowersNumber['COUNT(*)'];

}





?>