<?php
require_once('ConnectDB.php');

    $sql = "SELECT `name` AS `Oder Name`, `order` AS `Order`, `address` AS `Address`, `phone` AS `Phone` FROM `store_front_db`.`user_order` AS `user_order`";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Name' . "</th>";
    echo "<th>" . 'Order' . "</th>";
    echo "<th>" . 'Address' . "</th>";
    echo "<th>" . 'User Phone Number' . "</th>";

while ($re = $result->fetch_assoc()) {
        echo "<tr><td>" . $re['Oder Name'] . "</td>";
        echo "<td>" . $re['Order'] . "</td>";
        echo "<td>" . $re['Address'] . "</td>";
        echo "<td>" . $re['Phone'] . "</td>";
        
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

