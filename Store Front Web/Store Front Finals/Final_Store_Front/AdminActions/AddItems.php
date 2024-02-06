

<html>
    <head>
        <meta charset="UTF-8">
        <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
        <link rel="icon" type="image/Logo" href="PageFormat/Logo.png">
        <script src="LoginValidation.js" ></script>
        <style>
            
            body{
                text-align: center;
                background-image: url("https://img.freepik.com/premium-vector/duck-seamless-pattern-swimming_71328-1686.jpg?w=740");
            }
            header{
                z-index: 1000;
                text-align: center;
                overflow: hidden;
                background-color: dodgerblue;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                color:white;
                border: 2px double lightblue;
                padding: 0px;
                border-bottom: 5px double lightblue;
            }
            .link{
                color: white;
                text-decoration: none;
            }
            div {
                display: inline-block;
                text-align: center;
                background-color: dodgerblue;
                border: lightblue double 10px;
                padding: 20px;
            }
            img.border {
                width:70%;
                height: 70%;
                border: auto outset white;
                padding: auto;
                background-color: #ffff99;
            }
            img.header {
                width: 50px;
            }
            .imageFormat{
                width: 50%;


            }
            input {
                border-radius: 5px;
            }
            
        </style>
    </head>
    <body>
    </body>
</html>
<html>
    <body>
        <div>
            <form action="" method="post">
            Image Link<input type="text" id="Image" name="Image"/></br></br>
            Item Name<input type="text" id="Name" name="Name"/></br></br>
            Price <input type="number" id="Price" name="Price"/></br></br>
            <input type="submit"/>
            </form>
        </div></br></br>
        <div><a href="../ADMIN.php">Go back</a></div>
    </body>
</html>

<?php
    if (isset($_POST['Image'])&& isset($_POST['Name'])&& isset($_POST['Price'])) {
        $IMG = $_POST['Image'];
        $NAME = $_POST['Name'];
        setcookie("Name", $NAME);
        $PRICE = $_POST['Price'];
        if(empty($IMG)){
            echo '<h3 style="color: crimson">You Need To Input Somthing In The Image Box</h3>';
        }
        else if(empty($NAME)){
            echo '<h3 style="color: crimson">You Need To Input Somthing In The Name Box</h3>';
        }
        else if(empty($PRICE)){
            echo '<h3 style="color: crimson">You Need To Input Somthing In The Price Box</h3>';
        }
        else{
            $id_name = $NAME;
            for ($i = 0; $i < strlen($id_name); $i++) {
                $character = $id_name[$i];
                if ($character === " ") {
                    $id_name[$i] = "_";
                }
            }
        echo $id_name;

        setcookie("ImgId", $id_name);
        $HTMLFrom = '<div>
                        <img class="imageFormat" src="' . $IMG . '" /><br>
                        <p>' . $NAME . ', $' . $PRICE . '</p>
                        <input type="number" name="'.$id_name.'" min="0" value=""/>
                    </div></br>';
                    
                
            }
            
            echo $HTMLFrom;
            setcookie("Item_Format", $HTMLFrom);
            setcookie("Price", $PRICE);
            setcookie("Name", $NAME);
            setcookie("Image", $IMG);
            


            
            echo "<div>Is This Correct ???";
            echo '<form action="" method="get">
                <label>
                  <input type="radio" id="answer" name="answer" value="yes">
                  Yes
                </label>
                <label>
                  <input type="radio" id="answer" name="answer" value="no">
                  No
                </label>
                <button id="submit" type="submit" onclick="answer()">Submit</button>
              </form></div>';
            
            
        }
    
    if(isset($_GET['answer']) != ""){
        $ANS = $_GET['answer'];
        

        if($ANS == "yes"){

            $NAME = $_COOKIE['Name'];
            $ImageLink = $_COOKIE['Image'];
            $ImageFormate = $_COOKIE['Item_Format'];
            $Price = $_COOKIE['Price'];
            $id = $_COOKIE['ImgId'];
            
        require_once ('ConnectDB.php'); // Connect to the db.
        $query = "INSERT INTO `eduardo_entity_items`
                        (`name`,
                        `price`,
                        `image_link`,
                        `image_format`,`img_id`)
                        VALUES ";

            $query .= "('".$NAME."',";
            $query .= " '" .$Price. "',";
            $query .= " '" . $ImageLink . "',";
            $query .= " '" . $ImageFormate . "',";
            $query .= " '" . $id . "')";

        echo $query . "<br/>";
        $result = $conn->query($query);
        
        if ($result) {

            header("Location: ../ADMIN.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
        
    }
?>
