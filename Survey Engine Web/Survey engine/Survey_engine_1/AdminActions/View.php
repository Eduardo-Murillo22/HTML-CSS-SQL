        

<html>
    <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
    <link rel="icon" type="Logo" href="PageFormat/Logo.png">
    <script src="LoginValidation.js" ></script>
    <head>


        <meta charset="UTF-8">
        <title></title>
        <script>

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

        </script>
        <style>
            body{
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
                color: white;
                font-size: 40px;
            }
            div{
                text-align: center;

            }
            .container{
                padding: 50px;
                margin-top: 20px;
                background-color: darkblue;
                color: white;
                font-size: 40px;
                border: 10px double black;

            }
            th, td{
                padding: 10px;
                border:4px solid white;
                color: white;
            }
            a{
                color: grey;
                padding: 5px;
            }
            a:hover{
                color: white;
            }
        </style>
    </head>
</html>



<?php
        $index = $_COOKIE['index'];

        require_once('ConnectDB.php');

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
        ?>