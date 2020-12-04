<?php


    //get the userInput
    /*get the username successful*/
    $username = $_POST['username_php']; 
    //make sure userinput is not exist in the database
    //if exist, print erro
    //else tell the user successful
    /*$mysqli = new mysqli("database_URL", "my_user", "my_password",
"database_name");*/

    $mysqli = new mysqli("mysql.eecs.ku.edu","runzhou", "runzoi", "runzhou" );
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } else {
        $query1 = "SELECT user_id FROM Users where user_id = '$username'";
        $result = mysqli_query($mysqli, $query1);
        if(mysqli_num_rows($result)){
            echo("Exising same id in database!");
        }else if(!mysqli_num_rows($result)){
            echo("Successfully store in database");
            $query = "insert into Users(Number,user_id) VALUES(NULL, '$username') ";
            mysqli_query($mysqli, $query);
        }
        mysqli_close($conn);
    }
    



?>