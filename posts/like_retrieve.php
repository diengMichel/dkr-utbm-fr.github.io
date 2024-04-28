<?php
// Connect to your database
include("../PageParts/db_logic.php");
ConnectDatabase();

if(isset($_POST['post_id']) && isset($_POST['user_id'])) {
    // Assume $_POST['user_id'] contains the ID of the user being followed
    global $conn;
    $post_id = $_POST['post_id'];

    // Assume you have a session or some way to get the current user's ID '".$pseudo."'
    $current_user_id = $_POST['user_id']; // Example current user ID

    // Check if the user is already following
    $query = "SELECT * FROM `likes` WHERE `id_user` = ".$current_user_id." AND `id_post` = ".$post_id."";
    //$result = mysqli_query($conn, $query);
    $result = $conn->query($query);

    if (mysqli_num_rows($result) > 0) {
        // User is already following
        $response = array('success' => true, 'liked' => true);
    } else {
        // User is not following
        $response = array('success' => true, 'liked' => false);
    }

    // Retrieve like count
    $like_query = "SELECT COUNT(*) AS like_count FROM `likes` WHERE `id_post` = $post_id";
    $like_result = $conn->query($like_query);
    $like_count = 0; // Initialize like count
    if ($like_result && $like_row = $like_result->fetch_assoc()) {
        $like_count = $like_row['like_count'];
    }

    // Include like count in response
    $response['like_count'] = $like_count;

// Assume $visitedUserId contains the ID of the user whose page is being visited
// Assume $currentUserId contains the ID of the currently logged-in user

    // Check if the database operations were successful
    
    if ($result) {
        echo json_encode($response); // Return JSON response indicating success/failure
    } else {
        echo json_encode(array('success' => false)); // Return JSON response indicating failure
    }
}
?>