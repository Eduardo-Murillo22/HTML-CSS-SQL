<html>
    <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
    <link rel="icon" type="Logo" href="PageFormat/Logo.png">
    <script src="LoginValidation.js" ></script>
    <head>


        <meta charset="UTF-8">
        <title></title>
        <style>

            body{
                text-align: center;
                padding-top: 45px;
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
                padding: 20px 300px 20px 300px;
                margin: 10px;
            }
            img.border {
                width: 300px;
                height: 300px;
                object-fit: cover;

                padding: auto;
                background-color: #ffff99;
            }
            img.header {
                width: 50px;
            }
            .imageFormat{
                width: 300px;
                height: 300px;
                object-fit: cover;


            }
            input {
                border-radius: 5px;
            }



        </style>
    </head>
</html>

<html>
    <body>
        <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
        <link rel="icon" type="PageFormat/Logo" href="PageFormat/Logo.png">
    <body>
        <header>   
            <h2>Rubber Ducks Store</h2>
        </header>

        <?php   
        
        require_once('AdminActions/ConnectDB.php');
        echo "</br>";
        $ItemsOrder = "";
        $sql = "SELECT `img_id` AS `id`, `image_format` AS `IMG`, `price` FROM `store_front_db`.`eduardo_entity_items` AS `eduardo_entity_items`";
        $result = $conn->query($sql);
        $Total = 0;
        while ($re = $result->fetch_assoc()) {
            $test = $_POST[$re['id']];
            if ($test > 0) {
                echo $re['IMG'];
                echo "<script>
                        var test = document.getElementsByName('" . $re['id'] . "')[0];
                        test.disabled = true;
                        test.value = " . $test . ";
                    </script>";
                $Total += $test * $re['price'];
                
                $ItemsOrder .= "(Item = ".$re['id'].", Quantity = ".$test.")";
                
            }
        }
        setcookie("Order",$ItemsOrder);
        if($Total == 0){
            echo "<div>There are currently nothing in the cart</div>";
        }
        else{
            
            $Name = $_COOKIE['User_name'];
            echo "<form action='' method='get'>"
            . "<div>"
            . "<h3>Provide shipping information</h3>"
            . "<label>Address</label></br>"
            . "<input style='width:175px;' type='text' name='address' oninput='checkInputs()'/></br>"
            . "<label>Phone number</label></br>"
            . "<input style='width:175px;' type='tel' name='phone' oninput='checkInputs()'/></br>"
            . "<label>Name</label></br>"
            . "<input style='width:175px;' type='text' name='name' oninput='checkInputs()'/></br>"
            . "</div>"
            . "<div>Total $".$Total."</br>"
            . "<input id='submitButton' type='submit' value='Submit' disabled/></div>"
            . "<script>
                var test = document.getElementsByName('name')[0];
                test.value = '" . $Name . "';
        function checkInputs() {
            var address = document.getElementsByName('address')[0].value;
            var phone = document.getElementsByName('phone')[0].value;
            var name = document.getElementsByName('name')[0].value;
            var submitButton = document.getElementById('submitButton');
            
            if (address !== '' && phone !== '' && name !== '') {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>";
            
        }
        
        if(isset($_GET['address']) && isset($_GET['phone']) && isset($_GET['name'])){
            $name = $_GET['name'];
            $phone = $_GET['phone'];
            $address = $_GET['address'];
            $Order = $_COOKIE['Order'];
            
            setcookie("test", $phone);
            
                   require_once ('AdminActions/ConnectDB.php'); // Connect to the db.
        $query = "INSERT INTO `user_order`
                        (`name`,
                        `phone`,
                        `address`,
                        `order`)
                        VALUES ";

            $query .= "('".$name."',";
            $query .= " '" .$phone. "',";
            $query .= " '" . $address . "',";
            $query .= " '" . $Order . "')";

        echo $query . "<br/>";
        $result = $conn->query($query);
        
        if ($result) {

            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
        }
        
        
        ?>
        

    </body>
</html>
