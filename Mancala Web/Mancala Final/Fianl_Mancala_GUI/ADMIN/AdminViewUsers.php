<?php
require_once('../ConnectDB.php');

    $sql = "SELECT `id_user` AS `Number`, `initials` AS `Players Initials`, `email` AS `Players Email`, `password` AS `User Password`, `points` AS `Points` FROM `mancala_database`.`entity_user` AS `entity_user`";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Number' . "</th>";
    echo "<th>" . 'Players Initials' . "</th>";
    echo "<th>" . 'Players Email' . "</th>";
    echo "<th>" . 'User Password' . "</th>";
    echo "<th>" . 'Points' . "</th>";
    echo "<th>Delete</th>";
    echo "<th>Modifie</th>";

while ($re = $result->fetch_assoc()) {
        echo "<tr><td>" . $re['Number'] . "</td>";
        echo "<td>" . $re['Players Initials'] . "</td>";
        echo "<td>" . $re['Players Email'] . "</td>";
        echo "<td>" . $re['User Password'] . "</td>";
    echo "<td>" . $re['Points'] . "</td>";
    echo "<td><a href='Delete.php' onclick='Delete(" . $re['Number'] . ")'>Delete</a></td>";
    echo "<td><a href='Modifie.php' onclick='Modifie(" . $re['Number'] . ")'>Modifie</a></td>";
}
    echo "</table></br>";
    
    
    echo "<script>
    function Delete(id) {
        setCookie('User_To_Delete',id,1);
    }
    function Modifie(id){
        setCookie('User_To_Mod',id,1);
    }
    
    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + (value || '') + expires + '; path=/';
    }
    
    </script>";
    
    
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
            
            
        </style>
    </head>
</html>
<html>
    <body>
        <a href="../ADMIN.php">Go Back</a>
    </body>
</html>

