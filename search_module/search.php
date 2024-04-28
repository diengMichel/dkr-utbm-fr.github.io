<?php
//need to include database function
include("../PageParts/db_logic.php");
ConnectDatabase();

// Retrieve search query from AJAX POST request
if(isset($_POST["query"])) {
    global $conn;
    $search = $_POST["query"];

    // SQL query to search for users
    $query = "SELECT * FROM user WHERE name LIKE '%$search%'";

    // Execute query
    $result = $conn->query($query);

    // Check if results exist
    if($result) {
        if($result->num_rows > 0) {
            $selectBoxOptions = "";
            // Add the search query itself as an option
            //$selectBoxOptions .= "<option value=''>Search for: $search</option>";
            while($data = $result->fetch_assoc()) {
                $selectBoxOptions .= "<option value='".$data['id']."'>".$data['name']."</option>";
            }
            echo $selectBoxOptions;
        } else {
            echo "<option>No results found</option>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

?>