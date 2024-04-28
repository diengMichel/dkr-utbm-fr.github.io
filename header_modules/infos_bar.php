<a href="./userPage.php?id=<?php echo $userID ?>">
    <div class="header__info">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM user WHERE id ='".$userID."' ");
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
            if (!empty($fetch['image'])) {
                // Vérifier si une image est définie
                ?>
                <img class="user__avatar" src="./uploaded_img/<?php echo $fetch['image']; ?>" alt="" />
                <?php
            } else {
                // Si aucune image n'est définie, afficher une image par défaut
                ?>
                <img class="user__avatar" src="images/profile.png" alt="" />
                <?php
            }
        }
        ?>
        <h4><?php echo GetUserInfo($userID) ?></h4>
    </div>
    <div class="header__input">
        <span class="material-symbols-outlined"> search </span>
        <div class="search__bar">
            <input id="search" type="text" placeholder="Search Facebook" />
            <div class="dropdown-menu"></div>
        </div>
    </div>
</a>
<span class="material-symbols-outlined"> notifications_active </span>
