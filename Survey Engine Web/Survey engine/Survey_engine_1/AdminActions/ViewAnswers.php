<!DOCTYPE html>
<html>
    <head>
        <title>Data</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            body{
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
            }
            .block {
                width: 10px;
                height: 10px;
                background-color: #ff0000;
                display: inline-block;
            }
            .container{
                background-image: url("https://img.freepik.com/free-vector/minimalist-white-background-with-square-design_1048-12140.jpg?w=996&t=st=1685860427~exp=1685861027~hmac=82387ab306119d04488448b1dba239eb1c0f77b918c00e8834eb65c560b867b2");
                text-align: left;
                color: black;
                background-color: white;
                padding: 50px 200px 50px 200px;
                border-radius: 15px;
                border: 5px double   black;

            }
            h4{
                margin: 0px;
            }
        
        
        </style>
    </head>
    <body>
        <div class="container">
        <?php
        require_once('ConnectDB.php');

        $index = $_COOKIE['index'];
        $data = array();

        $sql = "SELECT `id_survey`, `survey_name` FROM `survey_engine`.`entity_survey` AS `entity_survey` WHERE `id_survey` = $index";
        $result = $conn->query($sql);
        $re = $result->fetch_assoc();
        $title = $re['survey_name'];

        $sql = "SELECT `entity_answers`.`question` AS `Question`, `entity_answers`.`answer` AS `Answer`, `entity_survey`.`survey_name` AS `Title` FROM `survey_engine`.`xref_survey_answers` AS `xref_survey_answers`, `survey_engine`.`entity_survey` AS `entity_survey`, `survey_engine`.`entity_answers` AS `entity_answers` WHERE `xref_survey_answers`.`id_survey` = `entity_survey`.`id_survey` AND `xref_survey_answers`.`id_answers` = `entity_answers`.`id_answers` AND `entity_survey`.`survey_name` = '" . $title . "'";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();
        $ANS = $re['Answer'];
        $QUES = $re['Question'];

        for ($i = 0; $i < strlen($ANS); $i++) {
            if ($ANS[$i] === ',') {
                $data[] = 0;
            } else if ($ANS[$i] === '.') {
                $data[] = 0;
                $data[] = ".";
            } else if ($i === strlen($ANS) - 1) {
                $data[] = 0;
            }
        }

        $sql = "SELECT `survey`, `answers` FROM `survey_engine`.`entity_user_answers` AS `entity_user_answers` WHERE `survey` = '" . $title . "'";
        $result = $conn->query($sql);

        while ($re = $result->fetch_assoc()) {
            $answer = '<br>' . $re['answers'] . '</br>';

            for ($i = 0; $i < strlen($answer); $i++) {

                if ($answer[$i] === "," || $answer[$i] === ":") {
                    if ($answer[$i + 1] === "1") {
                        $x = $answer[$i + 2];
                        if (!isset($data[$x])) {
                            $data[$x] = 0;
                        }
                        $data[$x] = $data[$x] + 1;
                    } else {
                        $dotNumber = 0;
                        foreach ($data as $key => $value) {
                            if ($value === ".") {
                                $dotNumber++;
                                $temp = $dotNumber + 1;
                                $tempans = $answer[$i + 1];

                                if ($temp == $tempans) {
                                    $tmp = ($key + 1) + $answer[$i + 2];
                                    if (!isset($data[$tmp])) {
                                        $data[$tmp] = 0;
                                    }
                                    $data[$tmp] = $data[$tmp] + 1;
                                }
                            }
                        }
                    }
                }
            }
        }

        require_once('ConnectDB.php');

        $sql = "SELECT `question` AS `Question`, `answer` AS `Answers` FROM `survey_engine`.`entity_answers` AS `entity_answers` WHERE `id_answers` = $index";
        $result = $conn->query($sql);

        $re = $result->fetch_assoc();
        $ANS = $re['Answers'];
        $QUES = $re['Question'];
        $Q = 0;
        $Qnum = 0;
        
        $Anum = 0;


        echo "<div><h4>";
        while ($Q < strlen($QUES) && $QUES[$Q] !== ".") {
        echo $QUES[$Q];
            $Q++;
        }
        echo "</h4>";
            for ($i = 1; $i < strlen($ANS); $i++) {
            if ($ANS[$i] === ",") {
                if ($data[$Qnum] === ".") {
                    $Qnum++;
                }
                for ($j = 0; $j < $data[$Qnum]; $j++) {
                    echo '<div class="block"></div>';
                }
                echo $data[$Qnum];
                $Qnum++;
                echo "</br>";
            } else if ($ANS[$i] === ".") {
                $i++;
                $Anum = 0;

                if ($data[$Qnum] === ".") {
                    $Qnum++;
                }
                for ($j = 0; $j < $data[$Qnum]; $j++) {
                    echo '<div class="block"></div>';
                }
                echo $data[$Qnum];

                $Qnum++;
                echo "<br><br>";
                $Q++;
                echo "<h4>";
                while ($Q < strlen($QUES) && $QUES[$Q] !== ".") {
                    echo $QUES[$Q];
                    $Q++;
                }
                echo "</h4>";
            } else {
                echo $ANS[$i];
            }
        }

        if ($data[$Qnum] === ".") {
            $Qnum++;
        }

        for ($j = 0; $j < $data[$Qnum]; $j++) {
            echo '<div class="block"></div>';
        }
        echo $data[$Qnum];


        $Qnum++;
        ?>
            <br><br><br><a href="DCOOKIE.php">Go back</a>

            </div>
       
    </body>
</html>
