document.addEventListener("DOMContentLoaded", function() {

    document.addEventListener('click', function(event){
        if (event.target.classList.contains('adminButton')){
            //Show admin list
            const adminButton = event.target.closest('.post');

            const list_actions_admin = adminButton.querySelector('.list_actions_admin');

            if (list_actions_admin.style.display === 'none' || list_actions_admin.style.display === '') {
                list_actions_admin.style.display = 'block';
            } else {
                list_actions_admin.style.display = 'none'; 
            }
        }

        if (event.target.classList.contains('action_avertissement')){
            //Option Avertissement Post
            const avertissementButton = event.target.closest('.post');

            const avertissementMenu = avertissementButton.querySelector('.avertissement_menu');
            const sensibleMenu = avertissementButton.querySelector('.post_sensible_menu');
            const deletePostMenu = avertissementButton.querySelector('.retirer_post_menu');
            const banUserMenu = avertissementButton.querySelector('.ban_user_menu');

            const avertissementArea = document.querySelector('#avertissement_area');
            const sensibleArea = document.querySelector('#post_sensible_area');
            const deletePostArea = document.querySelector('#retirer_post_area');
            const banUserArea = document.querySelector('#ban_user_area');

            if (avertissementMenu.style.display === 'none' || avertissementMenu.style.display === '') {
                avertissementMenu.style.display = 'block';
                if (sensibleMenu.style.display === 'block'){
                    sensibleMenu.style.display = 'none', sensibleArea.value = '';
                } if (deletePostMenu.style.display === 'block'){
                    deletePostMenu.style.display = 'none', deletePostArea.value = '';
                } if (banUserMenu.style.display === 'block') {
                    banUserMenu.style.display = 'none', banUserArea.value = '';
                }
            } else {
                avertissementMenu.style.display = 'none'; 
        }
                    
            const annulerAvertissement = document.querySelector('#annuler_avertissement');
        
            annulerAvertissement.addEventListener('click', function() {
                if (avertissementMenu.style.display === 'block') {
                    avertissementMenu.style.display = 'none', avertissementArea.value = '';
                } 

            });
        }

        if (event.target.classList.contains('action_sensible')){
            //Option Post Sensible
            const actionSensibleButton = event.target.closest('.post');
        
            const avertissementMenu = actionSensibleButton.querySelector('.avertissement_menu');
            const sensibleMenu = actionSensibleButton.querySelector('.post_sensible_menu');
            const deletePostMenu = actionSensibleButton.querySelector('.retirer_post_menu');
            const banUserMenu = actionSensibleButton.querySelector('.ban_user_menu');

            const avertissementArea = document.querySelector('#avertissement_area');
            const sensibleArea = document.querySelector('#post_sensible_area');
            const deletePostArea = document.querySelector('#retirer_post_area');
            const banUserArea = document.querySelector('#ban_user_area');

            if (sensibleMenu.style.display === 'none' || sensibleMenu.style.display === '') {
                sensibleMenu.style.display = 'block';
                if (avertissementMenu.style.display === 'block'){
                    avertissementMenu.style.display = 'none', avertissementArea.value = '';
                } if (deletePostMenu.style.display === 'block'){
                    deletePostMenu.style.display = 'none', deletePostArea.value = '';
                } if (banUserMenu.style.display === 'block') {
                    banUserMenu.style.display = 'none', banUserArea.value = '';
                }
            } else {
                sensibleMenu.style.display = 'none'; 
            }
              
            const annulerEnvoiPostSensible = document.querySelector('#annuler_envoi_post_sensible');
        
            annulerEnvoiPostSensible.addEventListener('click', function() {
                if (sensibleMenu.style.display === 'block') {
                    sensibleMenu.style.display = 'none', sensibleArea.value = '';
                } 
            });
        }

        if (event.target.classList.contains('action_retirer_post')){
            //Option Delete Post
            const actionDeleteButton = event.target.closest('.post');
        
            const avertissementMenu = actionDeleteButton.querySelector('.avertissement_menu');
            const sensibleMenu = actionDeleteButton.querySelector('.post_sensible_menu');
            const deletePostMenu = actionDeleteButton.querySelector('.retirer_post_menu');
            const banUserMenu = actionDeleteButton.querySelector('.ban_user_menu');

            const avertissementArea = document.querySelector('#avertissement_area');
            const sensibleArea = document.querySelector('#post_sensible_area');
            const deletePostArea = document.querySelector('#retirer_post_area');
            const banUserArea = document.querySelector('#ban_user_area');
            
            if (deletePostMenu.style.display === 'none' || deletePostMenu.style.display === '') {
                deletePostMenu.style.display = 'block';
                if (avertissementMenu.style.display === 'block'){
                    avertissementMenu.style.display = 'none', avertissementArea.value = '';
                } if (sensibleMenu.style.display === 'block'){
                    sensibleMenu.style.display = 'none', sensibleArea.value = '';
                } if (banUserMenu.style.display === 'block') {
                     banUserMenu.style.display = 'none', banUserArea.value = '';
                }
            } else {
                deletePostMenu.style.display = 'none';
            }
            
            const envoyerDeletePost = document.querySelector('#retirer_post');
    };


            const annulterDeletePost = document.querySelector('#annuler_retirer_post');

            annulterDeletePost.addEventListener('click', function() {
                if (deletePostMenu.style.display === 'block') {
                    deletePostMenu.style.display = 'none', deletePostArea.value = '';
                } 
            })

        
        if (event.target.classList.contains('action_bannir')){
            //Option Ban
            const actionBannirButton = event.target.closest('.post');
        
            const avertissementMenu = actionBannirButton.querySelector('.avertissement_menu');
            const sensibleMenu = actionBannirButton.querySelector('.post_sensible_menu');
            const deletePostMenu = actionBannirButton.querySelector('.retirer_post_menu');
            const banUserMenu = actionBannirButton.querySelector('.ban_user_menu');

            const avertissementArea = document.querySelector('#avertissement_area');
            const sensibleArea = document.querySelector('#post_sensible_area');
            const deletePostArea = document.querySelector('#retirer_post_area');
            const banUserArea = document.querySelector('#ban_user_area');
            
            if (banUserMenu.style.display === 'none' || banUserMenu.style.display === '') {
                banUserMenu.style.display = 'block';
                if (avertissementMenu.style.display === 'block'){
                    avertissementMenu.style.display = 'none', avertissementArea.value = '';
                } if (sensibleMenu.style.display === 'block'){
                    sensibleMenu.style.display = 'none', sensibleArea.value = '';
                } if (deletePostMenu.style.display === 'block') {
                    deletePostMenu.style.display = 'none', deletePostArea.value = '';
                } 
            } else {
                banUserMenu.style.display = 'none';
            }
        
        
            const annulerStartBan = document.querySelector('#annuler_start_ban');
        
            annulerStartBan.addEventListener('click', function() {
                if (banUserMenu.style.display === 'block') {
                    banUserMenu.style.display = 'none', banUserArea.value = '';
                } 
            });
        }
})}); 