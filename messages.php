
<?php
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


$con = mysqli_connect("sm9j2j5q6c8bpgyq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306" , "a7dr1ys3d4pwbb1e", "unc1z5um4r8hpn5u", "z7a8z9kunm4932uy");
            $no_message=false;
            if(isset($_GET['user'])){
                $_GET['user'] = $_GET['user'];

            }
            else{
                $q = 'SELECT `sender_name`, `reciever_name` FROM `messages`
                WHERE `sender_name` = "'.$_SESSION['user_name'].'"
                or `reciever_name`= "'.$_SESSION['user_name'].'"
                ORDER BY `date_time` DESC LIMIT 1';
                $r = mysqli_query($con, $q);

                if($r){

                    if(mysqli_num_rows($r)>0){
                        while($row = mysqli_fetch_assoc($r)){
                            $sender_name=$row['sender_name'];
                            $reciever_name=$row['reciever_name'];

                            if($_SESSION["user_name"]==$sender_name){
                                $_GET['user'] = $reciever_name;

                            }else{
                                $_GET['user']= $sender_name;
                            }
                        }
                    }
                    else{
                        echo "No messages form you.";
                        $no_message = true;
                    }
                }
                else{
                    echo $q;              
                  }
                
            }

            ?>
            <div class="text">
                <?php
            if($no_message == false){

            
            $q ='SELECT * FROM `messages` WHERE
            `sender_name`="'.$_SESSION['user_name'].'"
            AND 
            `reciever_name`="'.$_GET['user'].'"
            OR
            `sender_name`="'.$_GET['user'].'"
            AND 
            `reciever_name`="'.$_SESSION['user_name'].'" ';
            $r = mysqli_query($con, $q);

            if($r){
                while($row = mysqli_fetch_assoc($r)){
                    $sender_name=$row['sender_name'];
                    $reciever_name=$row['reciever_name'];
                    $message= $row['message'];

                    if($sender_name==$_SESSION['user_name']){
                        ?>
                        <head><meta a ></head>
                    <div class="sent_message">
                        <a href="#" class="chat_name_text">Me</a>
                        <p class="text_message"><?php echo $message;?></p>
                    </div>
                    <?php
                    }else{
                        ?>
                    <div class="recieved_message">
                        <a href="#" class="chat_name_text"><?php echo $sender_name;?></a>
                        <p class="text_message"><?php echo $message;?></p>
                    </div>
                    <?php
                     }
                }

            }else{
                echo $q;
            }

        }
        
   ?>

</div>