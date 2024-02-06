<?php

    $Email = $_COOKIE['User_email'];
    $Name = $_COOKIE['User_name'];
    $Password = $_COOKIE['User_Password'];
    
            require_once ('AdminActions/ConnectDB.php'); // Connect to the db.
        $query = "INSERT INTO `eduardo_user_info`
                    (`name`,
                    `email`,
                    `password`)
                    VALUES ";

            $query .= "('".$Email."',";
            $query .= " '" .$Name. "',";
            $query .= " '" . $Password . "')";

        echo $query . "<br/>";
        $result = $conn->query($query);
        
        if ($result) {

            header("Location: User_Store.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
?>
