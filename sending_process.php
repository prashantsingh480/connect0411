<?php 

session_start();
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