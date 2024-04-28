/*

function toggleFollow(postID, userId) {

    console.log(postID);
    console.log(userId);
    
    $.ajax({
        method: 'POST',
        url: './posts/follow.php',
        data: { post_id: postID, user_id: userId },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Update button appearance
                var followBtn = $('.follow-btn');
                followBtn.text(response.following ? 'Following' : 'Follow');
                followBtn.css('background-color', response.following ? 'green' : 'blue');
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}


$(document).ready(function() {
    $('.follow-btn').click(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this); // Store reference to the button

        $.ajax({
            type: 'POST',
            url: './posts/follow.php',
            data: { user_post_id: userpostId, user_id: userId },
            dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                if (response.success) { // Check the 'success' key in the response
                    if(response.following){
                    // Update button state
                    button.text('Following');
                    } else {
                        button.text('Follow');
                    }
                    // You might also want to disable the button or change its style
                } else {
                    alert('Failed to follow user');
                }
            },
            error: function() {
                alert('Error occurred while processing the request');
            }
        });
    });
});



$(document).ready(function() {
    $('.follow-btn').click(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this); // Store reference to the button

        $.ajax({
            type: 'POST',
            url: './posts/follow.php',
            data: { user_post_id: userpostId, user_id: userId },
            dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                if (response.success) { // Check the 'success' key in the response
                    if(response.following){
                        // Update button state
                        button.text('Following');
                    } else {
                        button.text('Follow');
                    }
                    // Update state of all buttons associated with the user
                    $('.follow-btn[data-user-id="' + userId + '"]').each(function() {
                        if(response.following){
                            $(this).text('Following');
                        } else {
                            $(this).text('Follow');
                        }
                    });
                    // You might also want to disable the button or change its style
                } else {
                    alert('Failed to follow user');
                }
            },
            error: function() {
                alert('Error occurred while processing the request');
            }
        });
    });
});



$(document).ready(function() {
    // Function to update button text based on follow status
    function updateButtonStatus(button, following) {
        if (following) {
            button.text('Following');
        } else {
            button.text('Follow');
        }
    }

    $('.follow-btn').each(function() {
        var button = $(this);
        var userId = button.data('user-id'); // Capture userId here
        console.log(userId);

        // Send AJAX request to retrieve follow status for each user
        $.ajax({
            type: 'POST',
            url: './posts/get_follow_status.php',
            data: { user_id: userId },
            dataType: 'json',
            success: function(response) {
                // Update button state based on retrieved follow status
                updateButtonStatus(button, response.following);
                console.log(response.following);
            },
            error: function() {
                alert('Error occurred while retrieving follow status');
            }
        });
    });

    $('.follow-btn').click(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this); // Store reference to the button

        $.ajax({
            type: 'POST',
            url: './posts/follow.php',
            data: { user_post_id: userpostId, user_id: userId },
            dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                if (response.success) { // Check the 'success' key in the response
                    // Update button state
                    updateButtonStatus(button, response.following);
                    // You might also want to disable the button or change its style
                } else {
                    alert('Failed to follow user');
                }
            },
            error: function() {
                alert('Error occurred while processing the request');
            }
        });
    });
});


$(document).ready(function() {
    // Function to update button text based on follow status
    function updateButtonStatus(button, following) {
        if (following) {
            button.text('Following');
        } else {
            button.text('Follow');
        }
    }

    $('.follow-btn').each(function() {
        var userId = $(this).data('user-id');
        // Check session storage for follow status
        var followStatus = sessionStorage.getItem('follow_status_' + userId);
        if (followStatus !== null) {
            updateButtonStatus($(this), JSON.parse(followStatus));
        }
    });

    $('.follow-btn').click(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this); // Store reference to the button

        $.ajax({
            type: 'POST',
            url: './posts/follow.php',
            data: { user_post_id: userpostId, user_id: userId },
            dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                if (response.success) { // Check the 'success' key in the response
                    // Update button state
                    updateButtonStatus(button, response.following);
                    // Update state of all buttons associated with the user
                    $('.follow-btn[data-user-id="' + userId + '"]').each(function() {
                        updateButtonStatus($(this), response.following);
                    });
                    // Store follow status in session storage
                    sessionStorage.setItem('follow_status_' + userId, JSON.stringify(response.following));
                    // You might also want to disable the button or change its style
                } else {
                    alert('Failed to follow user');
                }
            },
            error: function() {
                alert('Error occurred while processing the request');
            }
        });
    });
});
*/

$(document).ready(function() {
// Check the follow status obtained from PHP follow-btn

    //$('.follow-id').each(function() {
    $('.follow-btn').each(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this);

            $.ajax({
                type: 'POST',
                url: './posts/follow_retrieve.php',
                data: { user_post_id: userpostId, user_id: userId },
                dataType: 'json', // Specify the expected data type as JSON
                success: function(response) {
                    if (response.success) { // Check the 'success' key in the response
                        if(response.following){
                            // Update button state
                            console.log('button needs to be set to Unfollow')
                            button.text('Unfollow');
                            button.css('background-color', '#5200FF');
                        } else {
                            
                            console.log('button needs to be set to Follow')
                            button.text('Follow');
                            button.css('background-color', '#888888');
                        }
                        // You might also want to disable the button or change its style
                    } else {
                        alert('Failed to retrieve follow user status');
                    }
                },
                error: function() {
                    alert('Error occurred while processing the request follow-id');
                }   
        });
    });

    $('.follow-btn').click(function() {
        var userpostId = $(this).data('user-post-id');
        var userId = $(this).data('user-id');
        var button = $(this); // Store reference to the button

        $.ajax({
            type: 'POST',
            url: './posts/follow.php',
            data: { user_post_id: userpostId, user_id: userId },
            dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                if (response.success) { // Check the 'success' key in the response
                    if(response.following){
                        // Update button state
                        button.text('Unfollow');
                        button.css('background-color', '#5200FF');
                    } else {
                        button.text('Follow');
                        button.css('background-color', '#888888');
                    }
                    // Update state of all buttons associated with the user
                    $('.follow-btn[data-user-post-id="' + userpostId + '"]').each(function() {
                        if(response.following){
                            $(this).text('Unfollow');
                            $(this).css('background-color', '#5200FF');
                        } else {
                            $(this).text('Follow');
                            $(this).css('background-color', '#888888');
                        }
                    });
                    // You might also want to disable the button or change its style
                } else {
                    alert('Failed to follow user');
                }
            },
            error: function() {
                alert('Error occurred while processing the request');
            }
        });
    });
});
