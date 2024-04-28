<?php 
// Function used to fetch the user name and to use it onto the design
ConnectDatabase();
$loginStatus = CheckLogin();

function  GetUserInfo($id) {
    global $conn;
    $query = " 
            SELECT * FROM user 
            WHERE id ='".$id."' ";
            //WHERE email = '".$username."' ";

$result = $conn->query($query);

if ( $result->num_rows > 0 ){ 
    $data = $result->fetch_assoc();

}
return $data['username'];

}

function getUserImage($id) {
    global $conn;
    $query = "SELECT image FROM user_form WHERE id ='".$id."'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) { 
        $data = $result->fetch_assoc();
        $image = $data['image'];
        if (!empty($image)) {
            return 'uploaded_img/'.$image;
        } else {
            return 'images/profile.png';
        }
    } else {
        return 'images/profile.png'; // Retourne une image par défaut si aucune image n'est trouvée
    }
}


?>