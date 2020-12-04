
<?php
    $con = mysql_connect("mysql.eecs.ku.edu","runzhou","runzoi");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }


    mysql_select_db("runzhou", $con);

    $result = mysql_query("SELECT * FROM Users");
    
    echo "<table border='1'>
            <tr>
            <th>Number</th>
            <th>user_id</th>
            </tr>"; 
     while($row = mysql_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['Number'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "</tr>";
     }
     echo "</table>";
    mysql_close($con);
?>