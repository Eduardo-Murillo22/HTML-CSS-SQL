<?php


        require_once ('../ConnectDB.php'); // Connect to the db.
        
        $P1Points = $_COOKIE['Player-1-score'];
        $P2Points = $_COOKIE['Player-2-score'];
        $P1User = $_COOKIE['Player-1'];
        $P2User = $_COOKIE['Player-2'];
        
//        echo $P1Points;
//        echo $P2Points;
//        echo $P1User;
//        echo $P2User;
                

	//Query the database
        $sql="UPDATE `entity_user` 
                SET points=".$P1Points."
                WHERE initials='".$P1User."'";
        echo $sql."<br/>";
        $result=$conn->query($sql);
        
        $sql2="UPDATE `entity_user` 
                SET points=".$P2Points."
                WHERE initials='".$P2User."'";
        echo $sql2."<br/>";
        $result2=$conn->query($sql2);
        
        setcookie("Player-1-score", '', time() - 3600,"/");
        setcookie("Player-2-score", '', time() - 3600,"/");
        setcookie("Player-1", '', time() - 3600,"/");
        setcookie("Player-2", '', time() - 3600,"/");

if ($result&&$result2) {
                header("Location: ../index.html");
                exit;
            } else {
                echo "Error: " . $conn->error;
            }
?>