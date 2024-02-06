<?php
    setcookie("DIS", "", time() - 3600);
    setcookie("TITTLE", "", time() - 3600);
    setcookie("END", "", time() - 3600);
    setcookie("START", "", time() - 3600);

        header("Location: ../ADMIN.php");
        exit;
    
?>
