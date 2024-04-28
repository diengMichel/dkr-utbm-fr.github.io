<?php 
include("./PageParts/db_logic.php");
ConnectDatabase();
$newAccountStatus = CheckNewAccountForm();
$loginStatus = CheckLogin();


if ( $newAccountStatus["Successful"] ) {
    
    // redirect new user to his page after succesfully creating an account 
        if ( $loginStatus["Successful"] ) {
	    $redirect = "Location:http://".$rootpath."/userPage.php?id=".$userID;
	    header($redirect);
    }

} else {


include "header.php"; 
?>

<div class="main_body_formular">
    <form method="POST" action="#">
        <h1>Create an account</h>
        <div class="name_info">
            <input id="firstName" type="text" name="firstName" placeholder="First Name">
            <input id="lastName" type="text" name="lastName" placeholder="Last Name">
        </div>
        <div class="username">
            <input id="username" type="text" name="username" placeholder="Username">
        </div>
        <div class="email">
            <input id="email" type="email" name="email" placeholder="Email">
        </div>
        <div class="personal_info">
            <input id="dateBirth" type="date" name="dateBirth" placeholder="Date of Birth">
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>            
            </select> 
        </div>
        <div class="adress">
            <input id="adress" type="text" name="adress" placeholder="Adress">
        </div>
        <div class="password">
            <input id="password" type="password" name="password" placeholder="Password">
        </div>
        <div class="password">
            <input id="confirm" type="password" name="confirm" placeholder="Confirm Password">
        </div>
        <div class="avatar">
            <div class="avatar_description_txt">
                <p>Upload an image that becomes your avatar</p>
                <p>If you don't upload one yet, a default avatar will be giving to you. You can always change it after</p>              
            </div> 
            <input id="avatar" type="file" name="avatar" placeholder="Avatar">
        </div>    
        <div class="submit_formular">
            <input id="submitFormular" type="submit" name="submitFormular" placeholder="submit" value="Submit" >
        </div>  
    </form>
    </div>
    </body>
  </html>

<?php

if ( $newAccountStatus["Attempted"] ){
    echo '<h3 style=" display : flex; justify-content : center; color : red;   " class="errorMessage">'.$newAccountStatus["ErrorMessage"].'</h3>';
}

}

DisconnectDatabase();

?>


