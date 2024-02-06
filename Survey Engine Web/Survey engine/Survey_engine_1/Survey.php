
<html>
    <head>
        <meta charset="UTF-8">
        <title style="font-size: 20px;font-family: monospace;">Survey</title>
        <link rel="icon" type="image/Logo" href="">
        <script src="LoginValidation.js" ></script>
        <style>

            body{
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
            }
            .form{
                background-image: url("https://img.freepik.com/free-vector/minimalist-white-background-with-square-design_1048-12140.jpg?w=996&t=st=1685860427~exp=1685861027~hmac=82387ab306119d04488448b1dba239eb1c0f77b918c00e8834eb65c560b867b2");
                text-align: left;
                color: black;
                background-color: white;
                padding: 50px 200px 50px 200px;
                border-radius: 15px;
                border: 5px double   black;

            }
            .input-box{
                text-align: center;
                background: #cccccc;
                border: 2px solid black;
                margin-bottom: 1rem;
                border-radius: 0.3rem;
                font-family: sans-serif ;
                padding: 0.5rem;
                width: 70%;
            }
            ::placeholder{
                color: #ccffcc;
            }
            .input-box:hover{
                border: 3px solid #cccccc;
            }
            .txt-form{
                font-size: 20px;
                font-family: serif ;
                font-weight: bold;
                color: darkblue;

            }
            .button-style{
                text-align: center;
                padding: 0.60rem 2rem;
                background-color: darkblue;
                margin-bottom: 20px;
                font-weight: bold;
                border-radius: 5px;
                border: 3px solid black;
                cursor: pointer;
                color: white;
            }
            .button-style:hover{
                background-color: black;
                color: white;
                border: 4px solid grey;

            }
            .error{
                color: crimson;
            }
        </style>
    </head>
    <body>
        <div class="form">
        <form method="post">
            <?php
            require_once('AdminActions/ConnectDB.php');

            $index = $_COOKIE['Sindex'];

            $sql = "SELECT `id_survey` AS `NUM`, `survey_name` AS `Survey`, `discription` AS `Discription`, `start_date` AS `Start`, `end_date` AS `End` FROM `survey_engine`.`entity_survey` AS `entity_survey` WHERE `id_survey` = $index";
            $result = $conn->query($sql);
            

            $re = $result->fetch_assoc();
            $SURVEY = $re['Survey'];
            echo "<h1>Survey: ".$SURVEY."</h1>";

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
            echo "</div>";
            echo "<div class='form'>";
            while ($Q < strlen($QUES) && $QUES[$Q] !== ".") {
                echo $QUES[$Q];
                $Q++;
            }
            echo "<br>" . $type . " name='Q1[]' value='" . '10' . "'/>"; // Use name='Q1[]' for checkbox inputs
            for ($i = 1; $i < strlen($ANS); $i++) {
                if ($ANS[$i] === ",") {
                    echo "<br>";
                    if ($i < strlen($ANS) - 1) {
                        $Anum++;
                        echo "" . $type . " name='Q" . $Qnum . "[]' value='" . $Qnum . $Anum . "'/>"; // Use name='QX[]' for checkbox inputs
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
                    echo "<br>" . $type . " name='Q" . $Qnum . "[]' value='" . $Qnum . $Anum . "'/>"; // Use name='QX[]' for checkbox inputs
                } else {
                    echo $ANS[$i];
                }
            }

            // Process the form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Loop through the submitted form data to retrieve the responses
                $responses = [];
                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'Q') === 0) {
                        if (is_array($value)) {
                            // If it's an array, it means it's a checkbox input with multiple selected options
                            $responses[$key] = implode(",", $value);
                        } else {
                            $responses[$key] = $value;
                        }
                    }
                }

                // Convert the responses array into a string
                $responsesString = "";
                foreach ($responses as $key => $value) {
                    $responsesString .= $key . ":" . $value . "";
                }


                
                require_once('AdminActions/ConnectDB.php');
                $USER = $_COOKIE['User_name'];
                $EMAIL = $_COOKIE['User_email'];
                
                

                $query = "INSERT INTO `survey_engine`.`entity_user_answers`
                        (`user`,
                        `email`,
                        `survey`,
                        `answers`)
                        VALUES";
                $query .= "('" . $USER . "',";
                $query .= " '" . $EMAIL . "',";
                $query .= " '" . $SURVEY . "',";
                $query .= " '" . $responsesString . "')";

                $result = $conn->query($query);
                
                if ($result) {
                    header("Location: index.php");
                } else {
                    echo "Error: " . $conn->error;
                }
            }

                


            
            ?>

            <br><br><br><button type="submit">submit</button>
            </form>
        </div>

    </body>
</html>