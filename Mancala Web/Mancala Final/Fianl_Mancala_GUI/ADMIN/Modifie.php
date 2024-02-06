<?php
require_once('../ConnectDB.php');

    require_once('../ConnectDB.php');

$num = $_COOKIE['User_To_Mod'];

$sql = "SELECT `id_user` AS `Number`, `initials` AS `Players Initials`, `email` AS `Players Email`, `password` AS `User Password`, `points` AS `Points`, `password` AS `password` FROM `mancala_database`.`entity_user` AS `entity_user` WHERE `id_user` = " . $num . "";
$result = $conn->query($sql);
echo "<table border='1'>";
echo "<tr><th>" . 'Number' . "</th>";
echo "<th>" . 'Players Initials' . "</th>";
echo "<th>" . 'Players Email' . "</th>";
echo "<th>" . 'Points' . "</th>";
echo "<th>" . 'Password' . "</th>";

$re = $result->fetch_assoc();
echo "<tr><td>" . $re['Number'] . "</td>";
echo "<td>" . $re['Players Initials'] . "</td>";
echo "<td>" . $re['Players Email'] . "</td>";
echo "<td>" . $re['Points'] . "</td>";
echo "<td>" . $re['password'] . "</td>";

echo "</table>";

echo "<script>"
 . "var number = " . $re['Number'] . ";"
 . "var initials = '" . $re['Players Initials'] . "';"
 . "var userEmail = '" . $re['Players Email'] . "';" // Updated variable name to userEmail
 . "var userPoints = " . $re['Points'] . ";" // Updated variable name to userPoints
 . "var userPassword = '" . $re['password'] . "';" // Updated variable name to Password
 . "</script>";

if (isset($_POST['find'])&&isset($_POST['Initals'])&&isset($_POST['Email'])&&isset($_POST['Points'])&&isset($_POST['Password'])) {
    $Find = $_POST['find'];
    $Initials = $_POST['Initals'];
    $Email = $_POST['Email'];
    $Points = $_POST['Points'];
    $Password = $_POST['Password'];
    
        $sql = "UPDATE `entity_user` 
        SET `email` = '".$Email."', `initials` = '".$Initials."', `password` = '".$Password."', `points` = '".$Points."'
        WHERE id_user = '" . $Find . "'";
                echo $sql . "<br/>";
            $result = $conn->query($sql);
            
                if ($result) {

        header("Location: AdminViewUsers.php");
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
    <input type="number" id="index" name="find" placeholder="Index to modify" value=""/>
    <input type="text" id="int" name="Initals" placeholder="Initals" value=""/>
    <input type="text" id="email" name="Email" placeholder="Email" value=""/>
    <input type="text" id="pass" name="Password" placeholder="Password" value=""/>
    <input type="text" id="points" name="Points" placeholder="Points" value=""/>
    <input type="submit" id="submit" value="Submit"/>
</form>

<script>
    window.onload = Update;
function Update() {
    var index = document.getElementById('index');
    var int = document.getElementById('int');
    var email = document.getElementById('email');
    var pass = document.getElementById('pass');
    var points = document.getElementById('points');
    index.value = number;
    int.value = initials;
    email.value = userEmail; // Updated variable name
    pass.value = userPassword;
    points.value = userPoints; // Updated variable name
}
</script>


<a href="../ADMIN.php">Go Back</a>
