<div class="messageSender">
    <div class="messageSender__top">
        <div class="messageSender_user_description">
            <img
                class="user__avatar"
                src="images/profile.png"
                id="profile-pic" 
                alt=""
            />
            <!-- Champ de téléchargement d'image caché -->
            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" style="display: none;">
            
            <h4>
                <?php echo GetUserInfo($userID) ?>
            </h4>
        </div>
        <form id="postFormular" method="POST" action="./process_post.php" >
            <input id="messageSender__input" type="text" name="messageSender__input" placeholder="What's on your mind?"  />
            <button id="postButton" type="submit" name="postButton" >POST</button>
        </form>
    </div>

    <div class="messageSender__bottom">
        <div class="messageSender__option">
            <span style="color: red" class="material-symbols-outlined"> videocam </span>
            <h3>Live</h3>
        </div>

        <div class="messageSender__option">
            <span style="color: green" class="material-symbols-outlined"> photo_library </span>
            <h3>Photo</h3>
        </div>

        <div class="messageSender__option">
            <span style="color: orange" class="material-symbols-outlined"> insert_emoticon </span>
            <h3>Feeling</h3>
        </div>
    </div>
</div>

<script>
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    // Déclencher le champ de téléchargement d'image lors du clic sur l'avatar
    profilePic.onclick =  function(){
        inputFile.click();
    }

    // Mettre à jour l'image de l'avatar lorsqu'une nouvelle image est sélectionnée
    inputFile.onchange =  function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0])
    }
</script>
