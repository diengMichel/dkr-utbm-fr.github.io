$(document).ready(function() {
    // Check the like status obtained from PHP likeButton
    
        $('.likeButton').each(function() {
            var postId = $(this).data('post-id');
            var userId = $(this).data('user-id');
            var button = $(this);
    
                $.ajax({
                    type: 'POST',
                    url: './posts/like_retrieve.php',
                    data: { post_id: postId, user_id: userId },
                    dataType: 'json', // Specify the expected data type as JSON
                    success: function(response) {
                        if (response.success) { // Check the 'success' key in the response
                            if(response.liked){
                                // Update button state
                                console.log('button needs to be set to Unlike')
                                button.css('background-color', '#5200FF');
                                button.css('color', '#FFFFFF');
                            } else {
                                
                                console.log('button needs to be set to Like')
                                button.css('background-color', '#FFFFFF');
                                button.css('color', '#888888');
                            }

                            // Attempt to find the corresponding like count element
                            var likeCountElement = $('.like-count[data-post-id="' + postId + '"]');
                            if (likeCountElement.length) { // Check if the element was found
                                // If the element was found, update its text with the like count from the response
                                likeCountElement.text(response.like_count);
                            }
                            
                        } else {
                            alert('Failed to retrieve like user status');
                        }
                    },
                    error: function() {
                        alert('Error occurred while processing the request like-id');
                    }   
            });
        });
    
        $('.likeButton').click(function() {
            var postId = $(this).data('post-id');
            var userId = $(this).data('user-id');
            var button = $(this); // Store reference to the button
    
            $.ajax({
                type: 'POST',
                url: './posts/like.php',
                data: { post_id: postId, user_id: userId },
                dataType: 'json', // Specify the expected data type as JSON
                success: function(response) {
                    if (response.success) { // Check the 'success' key in the response
                        if(response.liked){
                            // Update button state
                            button.css('background-color', '#5200FF');
                            button.css('color', '#FFFFFF');
                        } else {
                            button.css('background-color', '#FFFFFF');
                            button.css('color', '#888888');
                        }

                        // Attempt to find the corresponding like count element
                        var likeCountElement = $('.like-count[data-post-id="' + postId + '"]');
                        if (likeCountElement.length) { // Check if the element was found
                            // If the element was found, update its text with the like count from the response
                            likeCountElement.text(response.like_count);
                        }
                        // Update state of all buttons associated with the user
                        $('.likeButton[data-post-id="' + postId + '"]').each(function() {
                            if(response.liked){
                                $(this).css('background-color', '#5200FF');
                                $(this).css('color', '#FFFFFF');
                            } else {
                                $(this).css('background-color', '#FFFFFF');
                                $(this).css('color', '#888888');
                            }
                            // Attempt to find the corresponding like count element
                            var likeCountElement = $('.like-count[data-post-id="' + postId + '"]');
                            if (likeCountElement.length) { // Check if the element was found
                                // If the element was found, update its text with the like count from the response
                                likeCountElement.text(response.like_count);
                            }
                        });
                        
                    } else {
                        alert('Failed to like post');
                    }
                },
                error: function() {
                    alert('Error occurred while processing the request');
                }
            });
        });
    });
    