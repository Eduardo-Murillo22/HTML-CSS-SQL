


<?php

    require_once('../ConnectDB.php');

    $num = $_COOKIE['User_To_Delete'];
    
    $sql = "SELECT `id_user` AS `Number`, `initials` AS `Players Initials`, `email` AS `Players Email`, `password` AS `User Password`, `points` AS `Points` FROM `mancala_database`.`entity_user` AS `entity_user` WHERE `id_user` = ".$num."";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Number' . "</th>";
    echo "<th>" . 'Players Initials' . "</th>";
    echo "<th>" . 'Players Email' . "</th>";
    echo "<th>" . 'Points' . "</th>";

$re = $result->fetch_assoc();
        echo "<tr><td>" . $re['Number'] . "</td>";
        echo "<td>" . $re['Players Initials'] . "</td>";
        echo "<td>" . $re['Players Email'] . "</td>";
        echo "<td>" . $re['Points'] . "</td>";
    
    echo "</table>";

    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the radio buttons are set
    if (isset($_POST['option1'])) {
        $option1 = $_POST['option1'];

        if ($option1 === 'yes') {
            


        $sql = "DELETE FROM `entity_user` WHERE (`id_user` = '".$num."');";
        echo $sql . "<br/>";
            $result = $conn->query($sql);
            
        if ($result) {
            
            header("Location: AdminViewUsers.php");
        exit;
        } else {
            echo "Error: " . $conn->error;
        }

            
            
        } else if($option1 === 'no') {
            // Both options are selected as "no" or neither option is selected
            // Perform action for both "no" selected or no options selected
            header("Location: AdminViewUsers.php");
            
            }
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
<html>
    <body>
        <h3>Are You Sure??</h3>
        <form method="POST">
        <label>
            <input type="radio" name="option1" value="yes"> Yes
            <input type="radio" name="option1" value="no"> No
        </label><br>
            <input type="submit" value="Submit">
        </form>


        
        <a href="../ADMIN.php">Go Back</a>
    </body>
</html>