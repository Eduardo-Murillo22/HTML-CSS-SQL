
<?php


    require_once('ConnectDB.php');
        
        $index = $_COOKIE['index'];
        
        $sql = "SELECT `id_survey`, `survey_name`, `discription`, `start_date`, `end_date` FROM `survey_engine`.`entity_survey` AS `entity_survey` WHERE `id_survey` = $index";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();
        $tittle = $re['survey_name'];
        $DIS = $re['discription'];
        $start = $re['start_date'];
        $end = $re['end_date'];

        setcookie("TITTLE", $tittle);
        setcookie("DIS", $DIS);
        setcookie("START", $start);
        setcookie("END", $end);

        require_once('ConnectDB.php');


        $sql = "SELECT `entity_survey`.`id_survey`, `entity_answers`.`question` AS `Question`, `entity_answers`.`answer` AS `Answer`, `entity_survey`.`survey_name` AS `Tittle` FROM `survey_engine`.`xref_survey_answers` AS `xref_survey_answers`, `survey_engine`.`entity_survey` AS `entity_survey`, `survey_engine`.`entity_answers` AS `entity_answers` WHERE `xref_survey_answers`.`id_survey` = `entity_survey`.`id_survey` AND `xref_survey_answers`.`id_answers` = `entity_answers`.`id_answers` AND `entity_survey`.`id_survey` = $index";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();

    if(isset($_POST['question']) && isset($_POST['answers'])) {
        require_once('ConnectDB.php');

        $tittle = $_COOKIE["TITTLE"];
        $sql = "SELECT `entity_answers`.`question` AS `Question`, `entity_answers`.`answer` AS `Answer`, `entity_survey`.`survey_name` AS `Tittle` FROM `survey_engine`.`xref_survey_answers` AS `xref_survey_answers`, `survey_engine`.`entity_survey` AS `entity_survey`, `survey_engine`.`entity_answers` AS `entity_answers` WHERE `xref_survey_answers`.`id_survey` = `entity_survey`.`id_survey` AND `xref_survey_answers`.`id_answers` = `entity_answers`.`id_answers` AND `entity_survey`.`survey_name` = '" . $tittle . "'";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();
        $ANS = $re['Answer'];
        $QUES = $re['Question'];

        $Question = $_POST['question'];
        $Answer = $_POST['answers'];
        $type = $_POST['type_question'];

        $UPDATEQUestion = $QUES . "." . $Question;
        $UPDATEAns = $ANS . "." . $type . $Answer;
        echo $UPDATEQUestion;

        $updateQuery = "UPDATE `survey_engine`.`entity_answers`
                   SET
                   `answer` = '" . $UPDATEAns . "',
                   `question` = '" . $UPDATEQUestion . "'
                   WHERE `question` = '" . $QUES . "'";

    // Execute the update query
        if ($conn->query($updateQuery) === TRUE) {
            header("Location: ../ADMIN.php");
        } else {
            echo "Error updating record: " . $conn->error;
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
                border-radius: 7px;
                color: #99ff00;
                border: 4px double white;
                margin: 20px;
            }
            input{
                color: black;
                border: 2px solid black;
            }
            a{
                color: white;
                font-size: 40px;
            }
            a:hover{
                color: gray;
            }
            div{
                background-color: #000066;
                text-align: center;
                color: white;
                padding: 20px;
            }
            input[type="text"]{
                height: 40px;
                width: 400px;
                font-size: 15px;
                font-family: sans-serif;
                text-align: center;
            }


        </style>
    </head>
</html>
<body>
    <form method="post">
        <div>
            <h2>Create Survey</h2>
            <form method="post">
                <p>Title</p>
                <input id="title" name="title" type="text" value="" oninput="checkInputs()"></input>
                <p>Description</p>
                <input id="DIS" name="dis" type="text" value="" oninput="checkInputs()"></input>
                <p>Start</p>
                <input id="start" name="start" type="date" value="" oninput="checkInputs()"></input>
                <p>End</p>
                <input id="end" name="end" type="date" value="" oninput="checkInputs()"></input>
        </div>

<?php
require_once('ConnectDB.php');

if (isset($_COOKIE['TITTLE'])) {
    $tittle = $_COOKIE["TITTLE"];
    $sql = "SELECT `entity_answers`.`question` AS `Question`, `entity_answers`.`answer` AS `Answer`, `entity_survey`.`survey_name` AS `Tittle` FROM `survey_engine`.`xref_survey_answers` AS `xref_survey_answers`, `survey_engine`.`entity_survey` AS `entity_survey`, `survey_engine`.`entity_answers` AS `entity_answers` WHERE `xref_survey_answers`.`id_survey` = `entity_survey`.`id_survey` AND `xref_survey_answers`.`id_answers` = `entity_answers`.`id_answers` AND `entity_survey`.`survey_name` = '" . $tittle . "'";
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
}
?>

        <div>
            <h3>Type of question</h3>
            <label for="single">Single answer</label>
            <input type="radio" id="single" name="type_question" value="S" onchange="checkInputs()">
            <label for="multiple">Multiple answer</label>
            <input type="radio" id="multiple" name="type_question" value="M" onchange="checkInputs()">
        </div>

        <div>
            <label for="question">Question</label><br>
            <input type="text" id="question" name="question" oninput="checkInputs()"><br><br>
            <label for="answers">Answers (please use this format: answer1, answer2, answer3)</label><br>
            <input type="text" id="answers" name="answers" oninput="checkInputs()"><br><br>
            <input type="submit" id="submit" value="Add" disabled>
        </div>
    </form>

    <script>

        var title = document.getElementById('title');
        var DIS = document.getElementById('DIS');
        var start = document.getElementById('start');
        var end = document.getElementById('end');

        var TITTLE = getCookie("TITTLE");
        var DISCRIPTION = getCookie("DIS");
        var START = getCookie("START");
        var END = getCookie("END");


            title.value = TITTLE;
            DIS.value = DISCRIPTION;
            start.value = START;
            end.value = END;

        


        function checkInputs() {

            var Q = document.getElementById('question').value;
            var A = document.getElementById('answers').value;
            var typeQ = document.querySelector('input[name="type_question"]:checked');
            var submitButton = document.getElementById('submit');

            if (typeQ && A !== '' && Q !== '' && title.value !== '' && DIS.value !== '' && start.value !== '' && end.value !== '') {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    c_start = c_start + c_name.length + 1;
                    c_end = document.cookie.indexOf(";", c_start);
                    if (c_end == -1)
                        c_end = document.cookie.length;
                    return unescape(document.cookie.substring(c_start, c_end));
                }
            }
            return "";
        }

    </script>



    <div>
        <a href="DCOOKIE.php">STOP ADDING</a>
    </div>
</body>
</html>
