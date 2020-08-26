<?php
session_start();
if(isset($_SESSION['user_name'])){
    //hello
}else{
    header("location:new.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
    <link rel="stylesheet" type="text/css" href="chatbox.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Roboto+Slab|Roboto:100,200,300,400,500,700" rel="stylesheet" />

</head>

<body>
    <header>
        <div class="logo">
            <img src="images/Connect.png" class="image">
        </div>

        <div class="top">
            <ul class="icons">

                <li class="whitetext"><a href="new.php">HOME</a></li>
                <li class="whitetext"><a href="#">FAQs</a></li>
                <li class="blacktext"><a href="#">ABOUT US</a></li>
                <li class="blacktext"><a href="#">GET STARTED</a></li>

            </ul>

        </div>



    </header>
    <div class="chat_box">
        <div class="name_box">
            <div class="name">
                <?php
                echo $_SESSION['user_name'];
                ?>
            </div>
            <div>
                <a href="#new_chat_modal" class="new_chat"><img class="new_icon" src="images/new_message.png"></a>
            </div>


        </div>
        <div class="logout">
            <a href="logout.php" class="logout_button">Log out</a>
        </div>
        
        
  <div class="contact_box">
            <?php

            require_once("contact.php");

            ?>
           
       </div>

       <div id="nn">
       
           <?php require_once("right.php") ?>
       </div>

    </div>


        

    </div>
    <?php
   require_once("new_message.php");
   ?>
   

</body>
</html>