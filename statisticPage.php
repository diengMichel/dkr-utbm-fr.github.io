<?php 
include("./PageParts/db_logic.php");
include("./get_user_infos.php");
include("./statistics/get_statistics.php");
//include("./noLoginRedirect.php");
ConnectDatabase();
$loginStatus = CheckLogin();


  $pageDescription = "statisticPage"; 

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
      <div style=" flex: 1;  padding: 30px 100px;" class="main_body_statistic">
      
      <h2>Your Statistics</h2><br/>
        <p>Number of followers: <?php echo getFollowersNumber($userID); ?></p>
        <p>Number of follows: <?php echo getFollowNumber($userID); ?></p>
        <p>Number of posts: <?php echo getPostNumber($userID); ?></p>
        <p>Number of likes given: <?php echo getGivenLikeNumber($userID); ?></p>
            
            
      <!-- feed ends -->
      </div>

      
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