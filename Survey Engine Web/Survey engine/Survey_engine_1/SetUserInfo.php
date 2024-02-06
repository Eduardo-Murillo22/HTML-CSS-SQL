<?php

    $Email = $_COOKIE['User_email'];
    $Name = $_COOKIE['User_name'];
    $Password = $_COOKIE['User_Password'];
    
            require_once ('AdminActions/ConnectDB.php'); // Connect to the db.
        $query = "INSERT INTO `survey_engine`.`entity_user`
                (`name`,
                `email`,
                `password`)
                VALUES";

            $query .= "('".$Name."',";
            $query .= " '" .$Email. "',";
            $query .= " '" . $Password . "')";

        echo $query . "<br/>";
        $result = $conn->query($query);
        
        if ($result) {

            header("Location: Survey.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
?>
