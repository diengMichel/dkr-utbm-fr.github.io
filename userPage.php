<?php 
include("./PageParts/db_logic.php");
include("./get_user_infos.php");
//include("./noLoginRedirect.php");
include("./posts/post.php");
ConnectDatabase();
$loginStatus = CheckLogin();


  $pageDescription = "userPage"; 

    include "header.php"; 
    ?>
    
    <!-- main body starts -->
    <div class="main__body">        

    <!-- sidebar starts -->
      <div class="sidebar">
        
        <?php 
        //only display the sidebar, when a user is logged in
        if ( $loginStatus["Successful"] ) {
        
          include "./sidebar_modules/sidebar_left.php";
        }         
         ?>

      </div>
      <!-- sidebar ends -->

      <!-- feed starts -->
      <div class="feed">
        <!-- message sender starts -->
        <?php  
        // This is used to display the owner's username of the page when a user is clicking on the profil and it is not his page connected 
        if($userID != $_GET['id']) {

        $query = 'SELECT `username` FROM `user` WHERE `id` ='.$_GET["id"];
        $result = $conn->query($query);
        if ( mysqli_num_rows($result) != 0 ){ $blogOwnerName = $result->fetch_assoc()["username"];}
        echo "<h1>Welcome to ".$blogOwnerName."'s Page</h1>";
      }

        // code to tcheck when a user is connected and is looking at another user page
        // that a follow button is available to follow or not the specific user 
        if($loginStatus["Successful"]){
          if($userID != $_GET['id']){

            $userPageID = $_GET['id'];
        ?>
            <div class="userPage_follow">
              <button class="follow-btn" data-user-post-id="<?php echo $userPageID; ?>" data-user-id="<?php echo $userID; ?>">Follow</button>
            </div>

        <?php
          }
        }

     

        // checks if the posts showed on the page when connected are coming from the connected user or from another user 
        if($userID == $_GET['id']) {

        include("./posts/message_sender.php");

        }

        //<!-- message sender ends -->

        //<!-- post starts -->

        //display post function called to display post on the user page

        $userBlogId = $_GET['id'];

        displayPost($userBlogId, $pageDescription);
        ?>
        <!-- message sender ends -->
      </div>
      <!-- feed ends -->


      
      <div style=" width : 18%; " class="widgets">
        
        <?php

        //}

          DisconnectDatabase();

        ?>
      </div>  
      </div>
      </div>
    <!-- main body ends -->
  </body>
  </html>