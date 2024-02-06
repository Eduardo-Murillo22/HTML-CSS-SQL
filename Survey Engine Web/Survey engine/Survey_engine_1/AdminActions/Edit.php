


<?php

    require_once('ConnectDB.php');

    $index = $_COOKIE['index'];
    
    $sql = "SELECT `id_survey` AS `NUM`, `survey_name` AS `Survey`, `discription` AS `Discription`, `start_date` AS `Start`, `end_date` AS `End` FROM `survey_engine`.`entity_survey` AS `entity_survey` WHERE `id_survey` = $index";
    $result = $conn->query($sql);
    echo "<table border='1'>";
    echo "<tr><th>" . 'Index' . "</th>";
    echo "<th>" . 'Name' . "</th>";
    echo "<th>" . 'Discription' . "</th>";
    echo "<th>" . 'Start' . "</th>";
    echo "<th>" . 'End' . "</th>";

    $re = $result->fetch_assoc();
        echo "<tr><td>" . $re['NUM'] . "</td>";
        echo "<td>" . $re['Survey'] . "</td>";
        echo "<td>" . $re['Discription'] . "</td>";
        echo "<td>" . $re['Start'] . "</td>";
        echo "<td>" . $re['End'] . "</td>";
        
        setcookie("index", $re['NUM']);
        setcookie("name", $re['Survey']);
        setcookie("dis", $re['Discription']);
        setcookie("start", $re['Start']);
        setcookie("end", $re['End']);

        
    
    echo "</table>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $tittle = $_POST['tittle'];
        $DIS = $_POST['dis'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        



            $sql = "UPDATE `entity_survey` SET `survey_name` = '" .$tittle. "', `discription` = '" .$DIS. "', `start_date` = '" .$start. "', `end_date` = '" .$end. "'
        WHERE id_survey = '" . $index . "'";
            
        echo $sql . "<br/>";
            $result = $conn->query($sql);

            if ($result) {
                echo "complete";
                header("Location: ../ADMIN.php");
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
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
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
            a{
                color: white;
            }
            a:hover{
                color: gra;
            }
            div{
                color: white;
            }


        </style>
    </head>
</html>

    <div>
        <h2>Edit functions</h2>
            <form method="POST">

                Tittle<br><input id="tittle" name="tittle" type="text" value=""/></br>
                Description<br><input id="DIS" name="dis" type="text" value=""/></br>
                Start<br><input id="start" name="start" type="date" value=""/></br>
                End<br><input id="end" name="end" type="date" value=""/></br></br>

                <input type="submit" value="Submit">
            </form>
    </div>

    <script>

    var index = getCookie("index");
    var name = getCookie("name");
    var dis = getCookie("dis");
    var start = getCookie("start");
    var end = getCookie("end");
    
    var TITTLE = document.getElementById("tittle");
    var DIS = document.getElementById("DIS");
    var START = document.getElementById("start");
    var END = document.getElementById("end");
    
    TITTLE.value = name;
    DIS.value = dis;
    START.value = start;
    END.value = end;
    



    function getCookie(cname) {
          let name = cname + "=";
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
        }
    
    </script>

<a href="../ADMIN.php">Go Back</a>