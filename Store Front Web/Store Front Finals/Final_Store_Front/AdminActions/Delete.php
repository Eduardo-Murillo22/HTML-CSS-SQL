


<?php

    require_once('ConnectDB.php');

    $sql = "SELECT `id_user_orders` AS `Number`, `name` AS `Name`, `order` AS `Order`, `address` AS `Address`, `phone` AS `Phone Number` FROM `store_front_db`.`user_order` AS `user_order`";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Name' . "</th>";
    echo "<th>" . 'Index' . "</th>";
    echo "<th>" . 'Order' . "</th>";
    echo "<th>" . 'Address' . "</th>";
    echo "<th>" . 'Phone Number' . "</th>";

    while ($re = $result->fetch_assoc()) {
        echo "<tr><td>" . $re['Number'] . "</td>";
        echo "<td>" . $re['Name'] . "</td>";
        echo "<td>" . $re['Order'] . "</td>";
        echo "<td>" . $re['Address'] . "</td>";
        echo "<td>" . $re['Phone Number'] . "</td>";
    }
    echo "</table>";

if (isset($_POST['find'])) {
        $Find = $_POST['find'];


        $sql = "DELETE FROM `store_front_db`.`user_order` WHERE (`id_user_orders` = '".$Find."');";
        echo $sql . "<br/>";
            $result = $conn->query($sql);
            
        if ($result) {
            
            header("Location: ../ADMIN.php");
            echo "Completed";
        exit;
        } else {
            echo "Error: " . $conn->error;
        }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-color: #FD7F20;
            }
            td,tr{
                font-size: 20px;
                color: white;
            }
            table{
                border-radius: 10px;
            }
            div{
                color: #99ff00;
            }
            input{
                color: black;
                border: 2px solid black;
            }


        </style>
    </head>
</html>

<form action="#" method="post">
    <h3>Type the index of the user you want to delete</h3>
    <input type="number" id="find" name="find" placeholder="Index to delete"/>
    <input type="submit" id="submit" value="Submit"/>
</form>

<a href="../ADMIN.php">Go Back</a>