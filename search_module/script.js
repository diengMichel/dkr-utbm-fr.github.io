//used to get the input text typed by user in the text box and process it in the search.php file 
$(document).ready(function(){
    $('#search').on('input', function(){
        var query = $(this).val().trim();
        if (query !== '') {
            $.ajax({
                url:"./search_module/search.php",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('.dropdown-menu').html(data);
                    $('.dropdown-menu').addClass('show');
                }
            });
        } else {
            $('.dropdown-menu').removeClass('show');
        }
    });

// function called  when a result is clicked on, sends the id and redirect the user on the page of the selected 
// user in the dropdown list
    $(document).on('click', '.dropdown-menu option', function() {
        var selectedUser = $(this).val();
        if(selectedUser !== '') {
            // Redirect to the selected user's page
            window.location.href = "userPage.php?id=" + selectedUser;
        }
        // Hide the dropdown menu after selection
        $('.dropdown-menu').removeClass('show');
    });
});

/*
// Some other js script used during tests

$(document).ready(function(){
    $('#search').keyup(function(){
        var query = $(this).val();
        console.log(query);
        $.ajax({
            url:"./search_module/search.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#result').html(data);
            }
        });
    });

    

    $(document).ready(function(){
        $('#search').on('input', function(){
            var query = $(this).val().trim();
            if (query !== '') {
                $.ajax({
                    url:"./search_module/search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data){
                        $('#result').html(data);
                        // Open the select box
                        $('#result').attr('size', $('#result option').length);
                    }
                });
            } else {
                $('#result').html('<option value="">Search users...</option>');
                $('#result').attr('size', 1);
            }
        });





    //used to redirect selected user from the dropdown after a search
    $('#result').on('change',function() {
        var selectedUserId = $(this).val();
        if(selectedUserId) {
            // Redirect to the selected user's page
            window.location.href = "userpage.php?id=" + selectedUserId;
        }
    });

});*/

