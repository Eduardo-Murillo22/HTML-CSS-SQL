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
                color: white;
                margin: 150px 100px auto 100px;
                background-color: white;
                padding: 50px 200px 50px 200px;
                border-radius: 15px;
                border: 5px double   black;

            }
            .formNO{
                font-size: 50px;
                background-image: url("https://img.freepik.com/free-vector/minimalist-white-background-with-square-design_1048-12140.jpg?w=996&t=st=1685860427~exp=1685861027~hmac=82387ab306119d04488448b1dba239eb1c0f77b918c00e8834eb65c560b867b2");
                text-align: center;
                color: black;
                margin: 150px 100px auto 100px;
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
</html>
<html>
    <?php
    if (isset($_GET['index'])) {
        $index = $_GET['index'];
        setcookie("Sindex",$index);
        echo '<body>
            <div class="form">
                <p id="validationE" class="error"></p>
                <p id="validationN" class="error"></p>
                <p id="validationP" class="error"></p>

                <label class="txt-form" for="email">Email</label>
                <input class="input-box" name="loginEmail" type="text" id="email" placeholder="Enter Email"/><br>
                <label class="txt-form" for="Name">Name</label>
                <input class="input-box" name="Name" type="text" id="Name" placeholder="Enter your name"/><br>
                <label class="txt-form" for="password">Password</label>
                <input class="input-box" style="width: 67%;" name="LoginPassword" class="input-box" type="password" id="password" placeholder="Enter Password"/><br>
                <button id="submit" class="button-style" type="submit">Continue</button><br>      
            </div>
        </body>';
    } else {
        echo '<div class="formNO">There are NO surveys you can answer right now</div>';
    }
    ?>  

    <script>
        // Wait for the document to load
        document.addEventListener("DOMContentLoaded", function() {
            // Get the submit button element
            var submitButton = document.getElementById("submit");

            // Add a click event listener to the submit button
            submitButton.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default form submission behavior

                // Perform form validation
                var email = document.getElementById("email").value;
                var name = document.getElementById("Name").value;
                var pass = document.getElementById("password").value;
                var errorE = document.getElementById("validationE");
                var errorN = document.getElementById("validationN");
                var errorP = document.getElementById("validationP");

                // Clear any previous error messages
                errorE.innerHTML = "";
                errorN.innerHTML = "";
                errorP.innerHTML = "";

                // Validate the form inputs
                if(email.length <= 0) {
                    errorE.innerHTML = "You must input something in the Email box!";
                }
                if(name.length <= 0) {
                    errorN.innerHTML = "You must input something in the Name box!";
                }
                if(pass.length <= 0) {
                    errorP.innerHTML = "You must input something in the Password box!";
                }
                if(pass.length <= 8) {
                    errorP.innerHTML = "Your password has to be at least 8 characters long!";
                }
                else {
                    if(email === "ADMIN22" && name === "ADMIN" && pass === "Password1234") {
                        window.location = "ADMIN.php";
                    } else {
                        setCookie("User_email", email, 1);
                        setCookie("User_name", name, 1);
                        setCookie("User_Password", pass, 1);
                        window.location.href = "SetUserInfo.php";
                    }
                }
            });

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }
        });
    </script>

</html>

