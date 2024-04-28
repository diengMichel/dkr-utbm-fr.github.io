<?php 

include("./PageParts/db_logic.php");
include("./get_user_infos.php");
include("./PageParts/noLoginRedirect.php");
include("./posts/post.php");
ConnectDatabase();
$loginStatus = CheckLogin();

if ( $loginStatus["Successful"] ) {
  $pageDescription = "mostLikedPostPage"; 
    include "header.php"; 
    ?>
    
    <!-- main body starts -->
    <div class="main__body">        

    <!-- sidebar starts -->
      <div class="sidebar">
        
        <?php 

          include "./sidebar_modules/sidebar_left.php";
        
         ?>

      </div>
      <!-- sidebar ends -->

      <!-- feed starts -->
      <div class="feed">

        <!-- post starts -->
        <?php 

        //display post function called to display post on the user page

        $userBlogId = $_GET['id'];

        displayPost($userBlogId, $pageDescription);

        ?>

        <!-- post ends -->

      </div>
      <!-- feed ends -->

      <div style=" width : 18%; " class="widgets">
        <?php 

          DisconnectDatabase();

        }

        ?>

      </div>
      </div>
    <!-- main body ends -->
  </body>
  </html>