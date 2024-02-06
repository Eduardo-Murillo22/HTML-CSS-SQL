<html>
    <head>
        <meta charset="UTF-8">
        <title style="font-size: 20px;font-family: monospace;">BANANAS</title>
        <link rel="icon" type="image/Logo" href="PageFormat/Logo.png">
        <script src="LoginValidation.js" ></script>
        <style>

            body{
                background-image: url("https://img.freepik.com/premium-vector/duck-seamless-pattern-swimming_71328-1686.jpg?w=740");
            }
            .form{
                text-align: left;
                color: white;
                margin: 150px 100px auto 100px;
                background-color: dodgerblue;
                padding: 50px 200px 50px 200px;
                border-radius: 15px;
                border: 10px double   #001b1a;

            }
            .input-box{
                text-align: center;
                background: lightblue;
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
                border: 3px solid lightseagreen;
            }
            .txt-form{
                font-size: 20px;
                font-family: serif ;
                font-weight: bold;
                color: teal;

            }
            .tittle{
                font-family: monospace;
                font-size: 50px;
                margin-bottom: 20px;
                color: black;
            }
            .form--hidden{
                display: none;
            }
            .link-form{
                color:green;
                text-decoration: none;
            }
            .link-form:hover{
                color: lightgreen;
            }
            .button-style{
                text-align: center;
                padding: 0.60rem 2rem;
                background-color: darkgreen;
                margin-bottom: 20px;
                font-weight: bold;
                border-radius: 5px;
                border: 3px solid black;
                cursor: pointer;
                color: #ccffcc;
            }
            .button-style:hover{
                background-color:green;
                border-color: darkgreen;
            }
            .error{
                color: crimson;
            }
        </style>
    </head>
    <body>
    </body>
</html>
<html>
    <body>
        <div class="form">
                <p id="validationE" class="error"></p>
                <p id="validationN" class="error"></p>
                <p id="validationP" class="error"></p>

                <label class="txt-form" for="email">   Email.</label>
                <input class="input-box" name="loginEmail" type="text" id="email" placeholder="Enter Email"/>@student.rccd.edu<br>
                <label class="txt-form" for="Name">   Name.</label>
                <input class="input-box" name="Name" type="text" id="Name" placeholder="Enter you name"/><br>
                <label class="txt-form" for="password">Password</label>
                <input class="input-box" style="width: 67%;" name="LoginPassword" class="input-box" type="password" id="password" placeholder="Enter Password"/><br>
                <button id="submit" class="button-style" type="submit" onclick="validation()" >Continue</button><br>      
        </div>
        <script>
            
            function validation(){
            
            const loginForm = document.querySelector("#login");
            const email = document.getElementById('email').value;
            const name = document.getElementById('Name').value;
            const pass = document.getElementById('password').value;
            var errorE = document.getElementById('validationE');
            var errorN = document.getElementById('validationN');
            var errorP = document.getElementById('validationP');



            if(email.length <= 0){
            e.preventDefault();
            errorE.innerHTML = 'You must input something in the Email box!';
            }
            if(name.length <= 0){
            e.preventDefault();
            errorN.innerHTML = 'You must input something in the Name box!';

            }
            if(pass.length <= 0){
            e.preventDefault();
            errorP.innerHTML = "You must input something in the Password box!";
            }
            if(pass.length <= 8){
            e.preventDefault();
            errorP.innerHTML = 'Your password has to be at least 8 characters long!';
            }
            else{

            if(email==="ADMIN22" && name === "ADMIN" && pass === "Password1234"){
            window.location = "ADMIN.php";
            }else{
                setCookie("User_email",email,1);
                setCookie("User_name",name,1);
                setCookie("User_Password",pass,1);
                window.location.href = "SetUserInfo.php";
            }

            }

            
            }
            
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
    </body>
</html>

