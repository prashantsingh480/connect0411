<?php 

session_start();
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
$con = mysqli_connect("sql12.freemysqlhosting.net:3306" , "sql12362362", "6GtTPNlghQ", "sql12362362");
if(isset($_SESSION['user_name']) and isset($_GET['user'])){

    if(isset($_POST['text'])){
        if($_POST['text'] != ''){
            $sender_name=$_SESSION['user_name'];
            $reciever_name=$_GET['user'];
            $message=$_POST['text'];
            $date=date("Y-m-d h:i:sa");

            $q= "INSERT INTO `messages` (`id`, `sender_name`, `reciever_name`, `message`, `date_time`) VALUES 
            ('', '".$sender_name."', '".$reciever_name."', '".$message."', '".$date."')";
            $r = mysqli_query($con, $q);

            if($r){
                ?>       
                <div class="sent_message">
                <a href="#">Me</a>
                <p><?php echo $message ; ?></p>
                

            </div>
            <br>
            <?php
            }else{
                echo $q;
            }



        }else{
            echo "please write something first";
        }


    }else{

        echo "problem with text";
    }

}else{
    echo "please login or select a user to send a message.";
}
?>