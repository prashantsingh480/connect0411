<?php
ob_start();
ini_set('session.save_handler', 'memcached');
ini_set('session.save_path', getenv('mc4.dev.ec2.memcachier.com'));
if(version_compare(phpversion('memcached'), '3', '>=')) {
    ini_set('memcached.sess_persistent', 1);
    ini_set('memcached.sess_binary_protocol', 1);
} else {
    ini_set('session.save_path', 'PERSISTENT=myapp_session ' . ini_get('session.save_path'));
    ini_set('memcached.sess_binary', 1);
}
ini_set('memcached.sess_sasl_username', getenv('D76E0C'));
ini_set('memcached.sess_sasl_password', getenv('4C84DD99E28CD60E4AB69E5ABDD18966'));
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#messages_box').load("messages.php");
        setInterval(function(){
            $('#messages_box').load("messages.php");
        },1000)
    })
</script>

<div class="right_chatbox" id ="right_chatbox">

     <div class="messages" id="messages_box"></div>
     
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


      




       