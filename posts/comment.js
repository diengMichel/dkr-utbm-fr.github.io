/*

// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Select the comment button
    const commentButton = document.querySelectorAll('.commentButton');

    // Select the comment section
    const commentSection = document.querySelector('.comment_section');

    // Add event listener to the comment button
    commentButton.addEventListener('click', function() {
        // Toggle the display property of the comment section
        if (commentSection.style.display === 'none' || commentSection.style.display === '') {
            commentSection.style.display = 'block'; // Display the comment section
        } else {
            commentSection.style.display = 'none'; // Hide the comment section
        }
    });
});

*/
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to the document and listen for click events
    document.addEventListener('click', function(event) {
        // Check if the clicked element has the class 'commentButton'
        if (event.target.classList.contains('commentButton')) {
            // Get the parent post element containing the comment button
            const post = event.target.closest('.post');

            // Find the comment section within the post
            const commentSection = post.querySelector('.comment_section');

            // Toggle the display property of the comment section
            if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                commentSection.style.display = 'block'; // Display the comment section
            } else {
                commentSection.style.display = 'none'; // Hide the comment section
            }
        }
    });
});
