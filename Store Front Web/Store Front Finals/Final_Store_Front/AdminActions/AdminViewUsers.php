<?php
require_once('ConnectDB.php');

    $sql = "SELECT `name` AS `Name`, `email` AS `Email`, `password` AS `Password` FROM `store_front_db`.`eduardo_user_info` AS `eduardo_user_info`";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Name' . "</th>";
    echo "<th>" . 'Email' . "</th>";
    echo "<th>" . 'Password' . "</th>";

while ($re = $result->fetch_assoc()) {
        echo "<tr><td>" . $re['Name'] . "</td>";
        echo "<td>" . $re['Email'] . "</td>";
        echo "<td>" . $re['Password'] . "</td>";
        }
    echo "</table>";
    
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-image: url("https://img.freepik.com/premium-vector/duck-seamless-pattern-swimming_71328-1686.jpg?w=740");
            }
            td,tr{
                font-size: 20px;
                color: black;
                background-color: coral;
            }
            table{
                border-radius: 10px;
            }
            div{
                color: #99ff00;
            }

            
            
        </style>
    </head>
</html>
<html>
    <body>
        <a href="../ADMIN.php">Go Back</a>
    </body>
</html>

