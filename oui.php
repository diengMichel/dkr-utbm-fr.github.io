<?php 

include("./PageParts/db_logic.php");

include("./get_user_infos.php");

include("./noLoginRedirect.php");

ConnectDatabase();

$loginStatus = CheckLogin();

if ($loginStatus["Successful"]){
    include "header.php"; 
?>

<div class="main__body">

   <div class="sidebar">

   <?php 
   include "./sidebar_left.php";

   $query = "SELECT * FROM user WHERE id ='".$userID."' ";
   $result = $conn->query($query);

   if ($result->num_rows > 0) { 
      $fetch = $result->fetch_assoc();
   ?>

      <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/image.png">';
         } else {
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
   </div>

   <div style="flex: 1; padding: 30px 100px;" class="main_body_formular">
      <!-- Contenu du formulaire -->
      <div class="inputBox">
         <span>username :</span>
         <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
         <span>your email :</span>
         <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
         <span>update your pic :</span>
         <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
      </div>

      <div class="inputBox">
         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <span>old password :</span>
         <input type="password" name="update_pass" placeholder="enter previous password" class="box">
         <span>new password :</span>
         <input type="password" name="new_pass" placeholder="enter new password" class="box">
         <span>confirm password :</span>
         <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
      </div>

      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="userPage.php" class="delete-btn">go back</a>
   </div>

   <div style="width: 18%;" class="widgets">
      <!-- Contenu des widgets -->
   </div>
</div>

<?php
   }
}

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user` SET name = '$update_name', email = '$update_email' WHERE id = '$userID'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      } elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      } else {
         mysqli_query($conn, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$userID'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
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
}

?>
</body>
<!--<link rel="stylesheet" href="style/style1.css">-->
</html>
