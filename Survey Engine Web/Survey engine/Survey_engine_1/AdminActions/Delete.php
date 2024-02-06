


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
    
    echo "</table>";
    


        $sql = "SELECT `id_answers` AS `id`, `question` AS `Question`, `answer` AS `Answer` FROM `survey_engine`.`entity_answers` AS `entity_answers` WHERE `id_answers` = $index";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();
        $ANS = $re['Answer'];
        $QUES = $re['Question'];
        $Q = 0;
        $Qnum = 1;
        $type = "<input type=";
        $Anum = 0;

        if ($ANS[0] == "S") {
            $type .= "'radio'";
        } else if ($ANS[0] == "M") {
            $type .= "'checkbox'";
        }

        echo "<div>";
        while ($Q < strlen($QUES) && $QUES[$Q] !== ".") {
            echo $QUES[$Q];
            $Q++;
        }
        echo "<br>" . $type . " name='Q1' value='" . '01' . "'/>";
        for ($i = 1; $i < strlen($ANS); $i++) {
            if ($ANS[$i] === ",") {
                echo "<br>";
                if ($i < strlen($ANS) - 1) {
                    $Anum++;
                    echo "" . $type . " name='Q" . $Qnum . "' value='" . $Qnum . $Anum . "'/>";
                }
            } else if ($ANS[$i] === ".") {
                $i++;
                $Anum = 0;
                if ($ANS[$i] == "S") {
                    $type = "<input type='radio'";
                } else if ($ANS[$i] == "M") {
                    $type = "<input type='checkbox'";
                }
                echo "<br><br>";
                $Qnum++;
                $Q++;
                while ($Q < strlen($QUES) && $QUES[$Q] !== ".") {
                    echo $QUES[$Q];
                    $Q++;
                }
                echo "<br>" . $type . " name='Q" . $Qnum . "' value='" . $Qnum . $Anum . "'/>";
            } else {
                echo $ANS[$i];
            }
        }
        echo "</div>";
        


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['option1'])) {
        $option1 = $_POST['option1'];

        if ($option1 === 'yes') {



            $sql = "DELETE FROM `survey_engine`.`entity_survey` WHERE (`id_survey` = ".$index.");";
            echo $sql . "<br/>";
            $result = $conn->query($sql);
            
            $sql = "DELETE FROM `survey_engine`.`entity_answers` WHERE (`id_answers` = ".$index.");";
            echo $sql . "<br/>";
            $result = $conn->query($sql);

            if ($result) {

                header("Location: ../ADMIN.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else if ($option1 === 'no') {
            // Both options are selected as "no" or neither option is selected
            // Perform action for both "no" selected or no options selected
            header("Location: ../ADMIN.php");
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
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
                color: white;
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