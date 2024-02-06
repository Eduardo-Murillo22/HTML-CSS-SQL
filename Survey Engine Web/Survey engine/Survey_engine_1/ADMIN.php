<html>
    <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
    <link rel="icon" type="Logo" href="PageFormat/Logo.png">
    <head>
        

        <meta charset="UTF-8">
        <title></title>
        <script>
        
            function setCookie(name,value,days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }
        
        </script>
        <style>
            body{
                background-image: url("https://img.itch.zone/aW1hZ2UvNTQzNDMyLzQ2MzE4ODkucG5n/original/h4FZ1%2F.png");
            }
            div{
                text-align: center;
                
            }
            .container{
                width: 100%;
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
            button{
                font-size: 40px;
                color: grey;
                padding: 5px;
                background-color: transparent;
                border: transparent;
                text-decoration: underline;
                
            }
            button:hover{
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
<html>
        <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
        <link rel="icon" type="PageFormat/Logo" href="PageFormat/Logo.png">
    <body>
        <div class="container" style="font-size:20px;padding: 20px;">(E = Edit) (D = Delete) (V = View Survey) (A = Add Questions) (ANS = View Answers)</div>
        <?php
        require_once('AdminActions/ConnectDB.php');

        $sql = "SELECT `id_survey`, `survey_name` AS `Survey`, `discription` AS `Discription`, `start_date` AS `Start`, `end_date` AS `End` FROM `survey_engine`.`entity_survey` AS `entity_survey`";
        $result = $conn->query($sql);
        echo "<table class='container'>";
        echo "<tr><th>" . 'Survey' . "</th>";
        echo "<th>" . 'Discription' . "</th>";
        echo "<th>" . 'Start' . "</th>";
        echo "<th>" . 'End' . "</th>"
                . "<th>Functions</th>";
        

        while ($re = $result->fetch_assoc()) {
            $index= $re['id_survey'];
            echo "<tr><td>" . $re['Survey'] . "</td><a>";
            echo "<td>" . $re['Discription'] . "</td><a>";
            echo "<td>" . $re['Start'] . "</td>";
            echo "<td>" . $re['End'] . "</td><td><a href='AdminActions/Edit.php' id='$index' onclick=\"setCookie('index', '$index', 1)\">E</a><a href='AdminActions/Delete.php' id='$index' onclick=\"setCookie('index', '$index', 1)\">D</a></br><a href='AdminActions/View.php' id='$index' onclick=\"setCookie('index', '$index', 1)\">V</a><a href='AdminActions/AddQuestion.php' id='$index' onclick=\"setCookie('index', '$index', 1)\">A</a><a href='AdminActions/ViewAnswers.php' id='$index' onclick=\"setCookie('index', '$index', 1)\">ANS</a><button onclick='getlink(\"" . $index . "\")'>Share Link</button></td>";
        }
        echo "</table>";
        
        ?>
        <div class="container">
        <a href="AdminActions/Create.php" > Create Survey <a>
        </div>
        <div class="container">
        <a href="index.php?index=1" > Start Over <a>
        </div>
    </body>
    <script>
        function getlink(index) {
            var share = "http://localhost/Survey_engine/Survey.php?index=" + index;
            alert(share);
        }
    </script>
    

</html>
                    