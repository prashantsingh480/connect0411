

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Roboto+Slab|Roboto:100,200,300,400,500,700"
        rel="stylesheet" />

</head>

<body>
    <header>
        <div class="logo">
            <img src="images/Connect.png" class="image">
        </div>

        <div class="top">
            <ul class="icons">

                <li><a href="#">HOME</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">GET STARTED</a></li>

            </ul>
        </div>
    </header>
    <div class="container">
        <div class="slides">

        </div>



        <div class="login">
            <a href="#login">Login</a>
        </div>

        <div class="tagline">
            <p>STAY<br>CONNECTED...</p>
        </div>
        <div class="register">
            <p>Not yet Registered ? <a href="Register.php">Register.</a></p>
        </div>
        <div id="pp" class="modal">
            <a class="close" href="#">&times;</a>abcd.
        </div>
        <div class="centrealign">
            <div class="centretagline">
                <p>Authentic conversations, the way you like them.</p>
            </div>
            <div class="smalltextcentre">
                <p>Deepen your relationships with Connect’s wide range of communication features.</p>
            </div>
        </div>
        <div class="centreimages">
            <div class="text">
                <img src="images/text.gif">
                <p class="heading">ENJOY CHATTING</p>
                <p class="headpara">Send texts to your loved ones.</p>
            </div>
            <div class="selfie">
                <img src="images/image.gif">
                <p class="heading">SHARE IMAGES</p>
                <p class="headpara">Share your moments by instantly sharing images.</p>
            </div>
            <div class="group">
                <img src="images/group.gif">
                <p class="heading">CREATE GROUPS</p>
                <p class="headpara">Invite your friends to chat together.</p>
            </div>
        </div>

        <div class="securediv">
            <div class="securetext">
                <p class="secureheading">STAY SECURED. <img class="shield" src="images/shield.png"></p>
            </div>
            <div class="securetextpara">
                <p class="securepara"> We are secured with end to end encryption which means only the sender and the
                    receiver can read the message transferred.
                </p>
            </div>
            <div class="secureimage">
                <img class="monitor" src="images/secured.png">
            </div>

        </div>

        <div class="blackopacity">

        </div>

        <div class="footer">
            <div class="parafoot">
                <p class="contactus">CONTACT US : <a href="#">support@connect.com</a></p>
            </div>
        </div>
        <div class="loginmain" id="login">
            <div class="loginmodal">
                <a href="#">&times;</a>
                <p>LOGIN</p>
                <div class="inputform">
                    <form method="POST">
                        <input class="input" type="text" id="uname" name="uname" placeholder="Username" style="outline: none;"><br><br>
                        <input class="input" type="password" id="passwo" name="passwo" placeholder="Password" style="outline: none;">
                    
                </div>
                <div class="loginbtn">
                    
                    <input type="submit" class="loginbutton" name="login" value="Login">
                </form>
                <?php
                    session_start();
                    require_once("connection.php ");
                ?>
                
                <?php
                // login checking.

                if(isset($_POST['login'])){
                    $user_name=$_POST['uname'];
                    $password=$_POST['passwo'];
                    $q="SELECT * FROM `users` WHERE `user_name`='".$user_name."' AND `password`='".$password."'";
                    $result=mysqli_query($con, $q);
                    $count=mysqli_num_rows($result);
                    if($count>0){
                     //   $fullname=$firstname." ".$lastname;
                        $_SESSION['user_name']=$user_name;
                        header("location:chatbox.php");
                    }
                    else{
                        echo "invalid username or password."; // style echo
                    }

                }



                ?>

                </div>
            </div>

        </div>

    </div>

</body>

</html>