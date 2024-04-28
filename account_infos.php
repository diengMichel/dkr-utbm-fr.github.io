<?php 
include("./PageParts/db_logic.php");
include("./get_user_infos.php");
include("./PageParts/noLoginRedirect.php");
ConnectDatabase();
$loginStatus = CheckLogin();

if ( $loginStatus["Successful"] ){

include "header.php"; 
?>

<div class="main__body">
<div class="sidebar">
<?php 

include "./sidebar_modules/sidebar_left.php";


// used to fetch data from the database and to display the user informations 
// on his account board 
$query = " 
            SELECT * FROM user 
            WHERE id ='".$userID."' ";
            //WHERE email = '".$username."' ";
            

$result = $conn->query($query);

if ( $result->num_rows > 0 ){ 
    $data = $result->fetch_assoc();

?>
</div>
<div style=" flex: 1;  padding: 30px 100px;" class="main_body_formular">
    <form method="POST" action="./process_account_info.php">
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
        <h1>Your Account informations</h>
        <div class="name_info">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="ID" value="<?php echo $data["id"];?>">
            <input id="firstName" type="text" name="firstName" placeholder="First Name" value="<?php echo $data["first_name"];?>">
            <input id="lastName" type="text" name="lastName" placeholder="Last Name" value="<?php echo $data["name"];?>">
        </div>
        <div class="username">
            <input id="username" type="text" name="username" placeholder="Username" value="<?php echo $data["username"];?>">
        </div>
        <div class="email">
            <input id="email" type="email" name="oldEmail" placeholder="Email" value="<?php echo $data["email"];?>"  >
        </div>
        <div class="personal_info">
            <input id="dateBirth" type="date" name="dateBirth" placeholder="Date of Birth" value="<?php echo $data["dateBirth"];?>" >
            <select id="gender" name="gender" value="<?php echo $data["gender"];?>" >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>            
            </select> 
        </div>
        <div class="adress">
            <input id="adress" type="text" name="adress" placeholder="Adress" value="<?php echo $data["adress"];?>" >
        </div>
        <div class="password">
            <input id="password" type="password" name="password" placeholder="Old Password" >
        </div>
        <div class="password">
            <input id="newpassword" type="password" name="newpassword" placeholder="New Password" >
        </div>
        <div class="password">
            <input id="confirmnew" type="password" name="confirmnew" placeholder="Confirm New Password">
        </div>
        <div class="avatar">
            <div class="avatar_description_txt">
                <p>Your avatar :</p>
                <p>You can change it at any moment</p>              
            </div> 
            <input id="avatar" type="file" name="avatar" placeholder="Avatar">
        </div>
        <div class="submit_formular">
            <input id="submitFormular" type="submit" name="submitFormular" placeholder="Save Changes" value="Save Changes">
        </div>    
       
    </form>
    </div>
    <div style=" width : 18%; " class="widgets">

      </div>

<?php
}

}
?>
</div>
  </body>
  </html>

  

