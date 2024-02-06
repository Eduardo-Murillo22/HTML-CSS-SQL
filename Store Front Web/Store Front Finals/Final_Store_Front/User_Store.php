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
        
        <form action="Cart.php" method="post">

            <?php

                require_once('AdminActions/ConnectDB.php');
                echo "</br>";

                $sql = "SELECT `image_format` AS `IMG` FROM `store_front_db`.`eduardo_entity_items` AS `eduardo_entity_items`";
                $result = $conn->query($sql);

                while ($re = $result->fetch_assoc()) {
                    echo $re['IMG'];
                }
            ?>
            <input type="submit" value="submit"/>
        </form>

    </body>
</html>
