<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="DeletePostBack.php" method="post" >
        <?php
                $mysqli = new mysqli('mysql.eecs.ku.edu',  "runzhou", "runzoi", "runzhou" );
                if ($mysqli->connect_error){
                    printf('Connection failed %s\n', $mysqli->connect_error);
                    exit();
                }
                $query = "SELECT post_id, content, author_id from Posts";
                $result = $mysqli->query($query);

                echo "<table style='border: 1px solid black; width: 100%'>";
                echo "<tr>";
                echo "<td style='border: 1px solid black'>" . "Post" . "</td>";
                echo "<td style='border: 1px solid black'>" . "Author" . "</td>";
                echo "<td style='border: 1px solid black'>" . "Delete?" . "</td>";
                echo "</tr>";
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td style='border: 1px solid black'>" . $row["content"] . "</td>";
                        echo "<td style='border: 1px solid black'>" . $row["author_id"] . "</td>";
                        echo "<td style='border: 1px solid black'><input type='checkbox' name='" . $row["post_id"] . "'></td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";

                $mysqli->close();
            ?>

        <button type="submit">Delete Post(s)</button>
    </form>
</body>

</html>