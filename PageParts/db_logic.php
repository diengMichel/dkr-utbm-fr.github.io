<?php

//Global variable which contains address of TD3 "site"
//You have to change this according to the setup in your own machine!
//--------------------------------------------------------------------------------
$rootpath = "localhost/projet_A";

// Function to open connection to database
//--------------------------------------------------------------------------------
function ConnectDatabase(){
    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_A";
    global $conn; //Crée variable globale depuis une fonction
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
}


//Function to clean up an user input for safety reasons
//--------------------------------------------------------------------------------
function SecurizeString_ForSQL($string) {
    $string = trim($string);
    $string = stripcslashes($string);
    $string = addslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

// Function to check login. returns an array with 2 booleans
// Boolean 1 = is login successful, Boolean 2 = was login attempted
//--------------------------------------------------------------------------------
function CheckLogin() {
    global $conn, $username, $userID, $isAdmin, $defaultProfilePicture;

    $error = NULL; 
    $loginSuccessful = false;

    //Données reçues via formulaire?
	if(isset($_POST["email"]) && isset($_POST["password"])){
		$username = SecurizeString_ForSQL($_POST["email"]);
		$password = md5($_POST["password"]);
		$loginAttempted = true;
	}
	//Données via le cookie?
	elseif ( isset( $_COOKIE["email"] ) && isset( $_COOKIE["password"] ) ) {
		$username = $_COOKIE["email"];
		$password = $_COOKIE["password"];
		$loginAttempted = true;
	}
	else {
		$loginAttempted = false;
	}

    //Si un login a été tenté, on interroge la BDD
    if ($loginAttempted){
        $query = " 
            SELECT * FROM user 
            WHERE email = '".$username."' 
            AND password ='".$password."' ";
            

        $result = $conn->query($query);

        if ( $result->num_rows != 0 ){
            $row = $result->fetch_assoc();
            $userID = $row["id"];
            CreateLoginCookie($username, $password);
            $loginSuccessful = true;
            $isAdmin = $row["Admin"];
            $defaultProfilePicture = $row["profile_picture"];
        }
        else {
            $error = "Ce couple login/mot de passe n'existe pas. Créez un Compte";
        }
    }
	
	$resultArray = ['Successful' => $loginSuccessful, 
					'Attempted' => $loginAttempted, 
					'ErrorMessage' => $error,
					'userID' => $userID,
                    'isAdmin'=> $isAdmin,
                    'defaultProfilePicture' => $defaultProfilePicture];

    return $resultArray;
}

//Méthode pour créer/mettre à jour le cookie de Login
//--------------------------------------------------------------------------------
function CreateLoginCookie($username, $encryptedPasswd){
    setcookie("email", $username, time() + 24*3600 );
    setcookie("password", $encryptedPasswd, time() + 24*3600);
}

//Méthode pour détruire les cookies de Login
//--------------------------------------------------------------------------------
function DestroyLoginCookie(){
    setcookie("email", NULL, -1 );
    setcookie("password", NULL, -1);
}

function CheckNewAccountForm(){
    global $conn, $isAdmin;

    $creationAttempted = false;
    $creationSuccessful = false;
    $error = NULL;

    //Données reçues via formulaire?
    if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])){

        $creationAttempted = true;

        //Form is only valid if password == confirm, and username is at least 4 char long
        if (strlen($_POST["email"]) < 4 ){
            $error = "Un nom utilisateur doit avoir une longueur d'au moins 4 lettres";
        }
        elseif ($_POST["password"] != $_POST["confirm"] ){
            $error = "Le mot de passe et sa confirmation sont différents";
        }
        else {
            // Sanitize inputs
            $username = SecurizeString_ForSQL($_POST["email"]);
            $password = md5($_POST["password"]);
            $lastName = SecurizeString_ForSQL($_POST["lastName"]);
            $firstName = SecurizeString_ForSQL($_POST["firstName"]);
            $pseudo = SecurizeString_ForSQL($_POST["username"]);
            $dateBirth = SecurizeString_ForSQL($_POST["dateBirth"]);
            $gender = SecurizeString_ForSQL($_POST["gender"]);
            $adress = SecurizeString_ForSQL($_POST["adress"]);
            $isAdmin = 0;
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'uploaded_img/'.$image;

            // Check if username or the email already exists:
            $queryUsername = "SELECT * FROM user WHERE username = '".$pseudo."'";
            $resultUsername = $conn->query($queryUsername);

            $queryEmail = "SELECT * FROM user WHERE email = '".$username."'";
            $resultEmail = $conn->query($queryEmail);

            if ($resultUsername->num_rows > 0) {
                $error = "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
            } elseif($resultEmail->num_rows > 0){
                $error = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
            } else {
                // Insert new user into database
                $insert_query = "INSERT INTO `user` VALUES (NULL, '$username', '$password', '$lastName', '$firstName' , '$pseudo', '$dateBirth', '$gender', '$adress', '$isAdmin', '$image')";
                $conn->query($insert_query);

                if (mysqli_affected_rows($conn) == 0) {
                    $error = "Erreur lors de l'insertion SQL. Essayez un nom/mot de passe sans caractères spéciaux.";
                } else {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $creationSuccessful = true;
                }
            }
        }
    }
	
	$resultArray = ['Attempted' => $creationAttempted, 
					'Successful' => $creationSuccessful, 
					'ErrorMessage' => $error];

    return $resultArray;
}

// Function to close connection to database
//--------------------------------------------------------------------------------
function DisconnectDatabase(){
	global $conn;
	$conn->close();
}