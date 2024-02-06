<?php
require_once('ConnectDB.php');

    $sql = "SELECT `name` AS `Item`, `price` AS `Price`, `image_link` AS `Link`, `image_format` AS `Image` FROM `store_front_db`.`eduardo_entity_items` AS `eduardo_entity_items`";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Item' . "</th>";
    echo "<th>" . 'Price' . "</th>";
    echo "<th>" . 'Link' . "</th>";
    echo "<th>" . 'Image' . "</th>";

while ($re = $result->fetch_assoc()) {
        echo "<tr><td>" . $re['Item'] . "</td>";
        echo "<td>$ " . $re['Price'] . "</td>";
        echo "<td>" . $re['Link'] . "</td>";
        echo "<td>" . $re['Image'] . "</td>";
        
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
            img{
                height: 200px;
            }

            
            
        </style>
    </head>
</html>
<html>
    <body>
        <a href="../ADMIN.php">Go Back</a>
    </body>
</html>

