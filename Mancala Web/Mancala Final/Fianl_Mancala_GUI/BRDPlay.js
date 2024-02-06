//window.onload = start;

function start(){
   
    
    var y = getCookie("Player-1");
    var x = getCookie("Player-2");
    const Player_1 = {name:y,min:0,max:5, score:0};
    const Player_2 = {name: x, min: 6, max: 11, score: 0};
    var TurnNum = 0;
    

    
        TurnNum++;
        turn(Player_1,Player_2,TurnNum);
        
    
}


function turn(P1,P2,turn){
    const DisplayTurn = document.getElementById("turn");
    var A = document.getElementById("A");
    var B = document.getElementById("B");
    var C = document.getElementById("C");
    var D = document.getElementById("D");
    var E = document.getElementById("E");
    var F = document.getElementById("F");
    var G = document.getElementById("G");
    var H = document.getElementById("H");
    var I = document.getElementById("I");
    var J = document.getElementById("J");
    var K = document.getElementById("K");
    var L = document.getElementById("L");
    
    DisplayTurn.innerHTML = "It is player 1, " + P1.name + " turn!"
    A.classList.remove("turnColor");
    B.classList.remove("turnColor");
    C.classList.remove("turnColor");
    D.classList.remove("turnColor");
    E.classList.remove("turnColor");
    F.classList.remove("turnColor");


    G.classList.add("turnColor");
    H.classList.add("turnColor");
    I.classList.add("turnColor");
    J.classList.add("turnColor");
    K.classList.add("turnColor");
    L.classList.add("turnColor");
    turn++;
    
    
    
    document.getElementById("submit").addEventListener("click", function () {
        




        
        var option = document.getElementById("option").value;
        var uppercaseOption = option.toUpperCase();
        turn++;
        
        while (document.getElementById(uppercaseOption).classList.contains("turnColor")) {
            if (turn % 2 === 0) {
                alert("This is not the side of your board. It is player 2's turn.");
            }
            if (turn % 2 === 1) {
                alert("This is not the side of your board. It is player 1's turn.");
            }
            
            option = prompt("Enter a new option:");
            uppercaseOption = option.toUpperCase();
            
            
        }
        
        if (turn % 2 === 0) {
            DisplayTurn.innerHTML = "It is player 1, "+P1.name+" turn!"
            
            
            G.classList.add("turnColor");
            H.classList.add("turnColor");
            I.classList.add("turnColor");
            J.classList.add("turnColor");
            K.classList.add("turnColor");
            L.classList.add("turnColor");

            
            A.classList.remove("turnColor");
            B.classList.remove("turnColor");
            C.classList.remove("turnColor");
            D.classList.remove("turnColor");
            E.classList.remove("turnColor");
            F.classList.remove("turnColor");
            
            

        
        }
        if (turn % 2 === 1) {
            DisplayTurn.innerHTML = "It is player 2, " + P2.name + " turn!"
            
            A.classList.add("turnColor");
            B.classList.add("turnColor");
            C.classList.add("turnColor");
            D.classList.add("turnColor");
            E.classList.add("turnColor");
            F.classList.add("turnColor");

            
            G.classList.remove("turnColor");
            H.classList.remove("turnColor");
            I.classList.remove("turnColor");
            J.classList.remove("turnColor");
            K.classList.remove("turnColor");
            L.classList.remove("turnColor");
                }   
                
        var testNum = document.getElementById(uppercaseOption);
        var value = parseInt(testNum.innerText); // Convert value to a number using parseInt()

                
        if (value === 0) { // Compare with number 0 after converting value to a number
            option = prompt("This option is not a valid option because there are no stones in this spot.\nPlease try a different option:");
            uppercaseOption = option.toUpperCase();
            testNum = document.getElementById(uppercaseOption);
            value = parseInt(testNum.innerText); 
        }


        var nextSlotValue;
        testNum.innerText = 0;
        var tempForLetterChange = uppercaseOption;
        
                for(var test = 0; test< value;test++){

                        var NextLetter = String.fromCharCode(tempForLetterChange.charCodeAt(0) + 1);

                        var TMP = document.getElementById(NextLetter);

                        if(tempForLetterChange === "L"){
                            var playerpoint = document.getElementById("Button_Player2");
                            playerpoint.innerHTML++;
                            var tempToAddToA = document.getElementById("A");
                            tempForLetterChange = "A"
                            tempToAddToA.innerText++;
                            value--;
                        }
                        else if(tempForLetterChange === "F"){
                            
                            var playerpoint2 = document.getElementById("Button_Player1");
                            playerpoint2.innerHTML++;
                            var tempToAddToA = document.getElementById("G");
                            tempForLetterChange = "G"
                            tempToAddToA.innerText++;
                            value--;
                        }
                        else{
                            tempForLetterChange = NextLetter;
                            nextSlotValue = TMP.innerText;
                            TMP.innerText ++;
                    }
                }
                var y = getCookie("Player-1");
                var x = getCookie("Player-2");
             
        var FinalP2Points = document.getElementById("Button_Player2").innerHTML;
        var FinalP1Points = document.getElementById("Button_Player1").innerHTML;
        if (document.getElementById("A").innerHTML === "0" &&
                document.getElementById("B").innerHTML === "0" &&
                document.getElementById("C").innerHTML === "0" &&
                document.getElementById("D").innerHTML === "0" &&
                document.getElementById("E").innerHTML === "0" &&
                document.getElementById("F").innerHTML === "0") {
            
            G.classList.add("turnColor");
            H.classList.add("turnColor");
            I.classList.add("turnColor");
            J.classList.add("turnColor");
            K.classList.add("turnColor");
            L.classList.add("turnColor");
            
            FinalP2Points = parseInt(FinalP2Points) + parseInt(G.innerHTML) + parseInt(H.innerHTML) + parseInt(I.innerHTML) + parseInt(J.innerHTML) + parseInt(K.innerHTML) + parseInt(L.innerHTML);
            
            var UP = document.getElementById("Button_Player2");
            UP.innerHTML = FinalP2Points.toString();

            
            if (FinalP2Points < FinalP1Points) {
                alert("Player 1 WON\n"+ y +" you are the Winner");
                alert(FinalP2Points);
            } else if (FinalP2Points > FinalP1Points) {
                alert("Player 2 WON\n" + x + " you are the Winner");
            }
            G.innerHTML = 0;
            H.innerHTML = 0;
            I.innerHTML = 0;
            J.innerHTML = 0;
            K.innerHTML = 0;
            L.innerHTML = 0;
            
            setCookie("Player-1-score", FinalP1Points, 1);
            setCookie("Player-2-score", FinalP2Points, 1);
            
            window.location.href = "SetUsersPoint/UpdateUserScore.php";
            
        }

        if (document.getElementById("L").innerHTML === "0" &&
                document.getElementById("K").innerHTML === "0" &&
                document.getElementById("J").innerHTML === "0" &&
                document.getElementById("I").innerHTML === "0" &&
                document.getElementById("H").innerHTML === "0" &&
                document.getElementById("G").innerHTML === "0") {
            
            A.classList.add("turnColor");
            B.classList.add("turnColor");
            C.classList.add("turnColor");
            D.classList.add("turnColor");
            E.classList.add("turnColor");
            F.classList.add("turnColor");

            
            FinalP1Points = parseInt(FinalP1Points) + parseInt(A.innerHTML) + parseInt(B.innerHTML) + parseInt(C.innerHTML) + parseInt(D.innerHTML) + parseInt(E.innerHTML) + parseInt(F.innerHTML);
            
            var UP1 = document.getElementById("Button_Player1");
            UP1.innerHTML = FinalP1Points.toString();//update players points
            
            if (FinalP2Points < FinalP1Points) {
                alert("Player 1 WON\n" + y + " you are the Winner");
                alert(FinalP1Points);
            } else if (FinalP2Points > FinalP1Points) {
                alert("Player 2 WON\n" + x + " you are the Winner");
            }
            A.innerHTML = 0;
            B.innerHTML = 0;
            C.innerHTML = 0;
            D.innerHTML = 0;
            E.innerHTML = 0;
            F.innerHTML = 0;
            
            //set players points to a cookie
            setCookie("Player-1-score",FinalP1Points,1);
            setCookie("Player-2-score", FinalP2Points, 1);

            
            window.location.href = "SetUsersPoint/UpdateUserScore.php";
        }
        
        
    });
    
} 

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}