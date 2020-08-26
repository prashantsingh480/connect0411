<?php
ob_start();
?>



<div class="right_chatbox" id ="right_chatbox">

     <div class="messages" id="messages_box"></div>
     <?php 
     require_once("messages.php");
     ?>
     </div>
            <form method="POST" id="message_form">
            <div class="textbox">
            <textarea class="message_area" placeholder="Write your message" name="my_message" id="my_message"></textarea>
            <input type="submit" value="send" id="ssend" name="ssend" class="send" style="position: absolute; transform: translate(-50%,-50%); left: 50%; top: 140%;">
            </div>
            </form>
            <?php
if(isset($_POST['ssend'])){
    $con = mysqli_connect("sql12.freemysqlhosting.net:3306" , "sql12362362", "6GtTPNlghQ", "sql12362362");
    $sender_name=$_SESSION['user_name'];
    $reciever_name=$_GET['user'];
    $message=$_POST['my_message'];
    $date=date("Y-m-d h:i:sa");

    $q= "INSERT INTO `messages` (`id`, `sender_name`, `reciever_name`, `message`, `date_time`) VALUES 
    ('', '".$sender_name."', '".$reciever_name."', '".$message."', '".$date."')";
    $r = mysqli_query($con, $q);

    if($r){
        header("location:chatbox.php?user=".$reciever_name);


    }else{
        echo $q;
    }
}
?>


      




       