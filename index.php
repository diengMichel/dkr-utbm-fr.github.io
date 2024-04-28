    <?php 

include("./PageParts/db_logic.php");
include("./posts/post.php");
ConnectDatabase();
$loginStatus = CheckLogin();
$pageDescription = "indexPage"; 

if ( $loginStatus["Successful"] ) {
	$redirect = "Location:http://".$rootpath."/userPage.php?id=".$userID;
	header($redirect);
}

    include "header.php"; 

	if ( $loginStatus["Attempted"] ){
		echo '<h3 style=" display : flex; justify-content : right; color : red;   " class="errorMessage">'.$loginStatus["ErrorMessage"].'</h3>';
	}

    ?>
    
    <!-- main body starts -->
    <div class="main__body">        

    <!-- sidebar starts -->
      <div class="sidebar">
      </div>
      <!-- sidebar ends -->

      <!-- feed starts -->
      <div class="feed">

      <?php 

        //<!-- post starts -->

        //display post function called to display post on the user page

        $userBlogId = 0;

        displayPost($userBlogId, $pageDescription);

        ?>
        <!-- post ends -->

      </div>
      <!-- feed ends -->

      <div style=" width : 18%; " class="widgets">
        <?php  
          
          DisconnectDatabase();

        ?>

      </div>
      </div>
    <!-- main body ends -->
  </body>
  </html>