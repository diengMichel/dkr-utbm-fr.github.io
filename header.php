<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Clone</title>
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/login_formular.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- ajax library is required. -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Include our script file. -->
   <script type="text/javascript" src="./search_module/script.js"></script>
   <script type="text/javascript" src="./posts/comment.js"></script>
   <script type="text/javascript" src="./posts/admin.js"></script>
   <script type="text/javascript" src="./posts/like.js"></script>
   <script type="text/javascript" src="./posts/follow.js"></script>
  
  </head>
  <body>

    <!-- header starts -->
    <div class="header">
      <div class="header__left">
      <?php 

        if ( $loginStatus["Successful"] ) {
          include "./header_modules/infos_bar.php";        
        }

        ?>
      </div>

      <div class="header__middle">
        <a href="./index.php">
          <div class="header__option">
          <span class="material-symbols-outlined"> home </span>  
        </div>
      </a>
      </div>

      <div class="header__right">

      <?php 
        if ( $loginStatus["Successful"] ) {
          include "./header_modules/module_logout.php";
        
        } else { 

          include "./header_modules/module_login.php";
        }

        ?>

      </div>

    </div>
    <!-- header ends -->