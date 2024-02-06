<?php

$Email = $_GET['Email'];
$Initials = $_GET['Initials'];
$Pass = $_GET['Password'];

$Valid = false;

if (strpos($Email, "@") !== false && strpos($Email, ".") !== false) {
    $Valid = true;
} else if ($Initials === NULL) {
    $Valid = true;
} else if ($Pass === NULL) {
    $Valid = true;
}

if ($Valid === false) {
    header("Location: LoginPage1.html");
    exit();
}

if ($Email === "ADMIN@." && $Initials === "AD" && $Pass === "ADMIN1234") {
        header("Location: ADMIN.php");
    }

    
    
require_once('ConnectDB.php');

$Query = "INSERT INTO `entity_user`
(`email`,`password`,`initials`,`points`)
VALUES ";

    $Query .= "('".$Email."','".$Pass."','".$Initials."','0')";
        
    $result = $conn->query($Query);
    if ($result) {
        header("Location: index.html");
} else {
    echo "Error: " . $conn->error;
}
?>