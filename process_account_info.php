<?php
include("./PageParts/db_logic.php");
ConnectDatabase();
$loginStatus = CheckLogin();

$query = " 
            SELECT * FROM user 
            WHERE id ='".$userID."' ";
            //WHERE email = '".$username."' ";
            
$result = $conn->query($query);

if ( $result->num_rows > 0 ){ 
    $data = $result->fetch_assoc();}

    $savedPassword = $data["password"]; 

// retrieve data from database when user is logged in
//if( isset($_POST["action"]) ){

    //if ( $_POST["action"] == "edit"){

        if (isset($_POST["oldEmail"]) && !empty($_POST["oldEmail"])) {

            $query = "UPDATE user SET 
                    first_name = '".SecurizeString_ForSQL($_POST["firstName"])."',
                    name = '".SecurizeString_ForSQL($_POST["lastName"])."',
                    username = '".SecurizeString_ForSQL($_POST["username"])."',
                    dateBirth = '".SecurizeString_ForSQL($_POST["dateBirth"])."',
                    gender = '".SecurizeString_ForSQL($_POST["gender"])."',
                    adress = '".SecurizeString_ForSQL($_POST["adress"])."' 
                    WHERE  id = '".$userID."' ";

            if((md5($_POST["password"]) == $savedPassword) && !empty($_POST["newpassword"]) && ($_POST["confirmnew"] == $_POST["newpassword"])){   

            $query = "UPDATE user SET 
                    email = '".SecurizeString_ForSQL($_POST["oldEmail"])."', 
                    password = '".md5($_POST["confirmnew"])."'
                    WHERE  id = '".$userID."' ";
                    //WHERE  id = ".$_POST["ID"];  
                    
                    header("Location:userPage.php?id=".$userID);

                    //$redirect = "Location:http://".$rootpath."/userPage.php?id=".$userID;
                    //header($redirect);
          

            } else {            
                header("Location:account_infos.php?id=".$userID);
                //$redirect = "Location:http://".$rootpath."/account_infos.php?id=".$userID;
                //header($redirect);
                echo "<h3>error</h3>";
            }

        } else {            
            echo "<h3>error</h3>";
            //$redirect = "Location:http://".$rootpath."/account_infos.php?id=".$userID;
            //header($redirect);
            header("Location:account_infos.php?id=".$userID);
            

    }
    //} 

    if (isset($query)){
        echo $query;
        $result = $conn->query($query);
    }
    
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image is too large';
       } else {
          $image_update_query = mysqli_query($conn, "UPDATE `user` SET image = '$update_image' WHERE id = '$userID'") or die('query failed');
          if($image_update_query){
             move_uploaded_file($update_image_tmp_name, $update_image_folder);
          }
          $message[] = 'image updated successfully!';
       }
    }
    //header("Location:account_infos.php?id=".$userID);

//}

?>