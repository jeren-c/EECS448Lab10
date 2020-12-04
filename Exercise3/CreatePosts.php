<?php
    $username = $_POST['name_php']; 
    $user_id = $_POST['name_php1']; 
    $post = $_POST['textarea']; 
    $mysqli = new mysqli("mysql.eecs.ku.edu", "runzhou", "runzoi", "runzhou");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } else {

        $query = "SELECT user_id FROM Users where user_id = '$user_id' ";

        $result = mysqli_query($mysqli, $query);
        if( !mysqli_num_rows($result) ){
            echo ("The post was not written by an existing user! ");
        } else {
            $query1 = "insert into Posts(post_id, content, author_id) 
                        VALUES('$username', '$post', '$user_id') ";
            mysqli_query($mysqli, $query1);
            echo("Successfully store in database");
        }
    }
    mysqli_close($conn);
?>