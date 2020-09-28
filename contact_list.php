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
$con = mysqli_connect("sm9j2j5q6c8bpgyq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306" , "a7dr1ys3d4pwbb1e", "unc1z5um4r8hpn5u", "z7a8z9kunm4932uy");
$q='SELECT DISTINCT `reciever_name`, `sender_name`
FROM `messages` WHERE
`sender_name`="'.$_SESSION['user_name'].'" OR
`reciever_name`="'.$_SESSION['user_name'].'"
ORDER BY `date_time` DESC';

$r = mysqli_query($con, $q);
if($r){

    if(mysqli_num_rows($r)>0){
        $counter=0;

        $added_user=array();

        while($row=mysqli_fetch_assoc($r)){
            $sender_name=$row['sender_name'];
            $reciever_name=$row['reciever_name'];

            if($_SESSION['user_name']==$sender_name){
                //add people
                if(in_array($reciever_name, $added_user)){
                    
                }else{
                    ?>
                    <div class="contact">
                <img src="images/shield.png" class="contact_profile">
                <br>
                <?php echo '<a href="?user='.$reciever_name.'">'.$reciever_name.'</a>';?>
            </div>
            <br>
            <?php

            $added_user = array($counter => $reciever_name);
            $counter++;

                }
            }elseif($_SESSION['user_name']==$reciever_name){
                //add people
                if(in_array($sender_name, $added_user)){
                    
                }else{
                    ?>
                    <div class="contact">
                <img src="images/shield.png" class="contact_profile">
                <br>
                <?php echo '<a href="?user='.$sender_name.'">'.$sender_name.'</a>';?>
            </div>
            <br>
            <?php

            $added_user = array($counter => $sender_name);
            $counter++;

                }
            }
        }
    }
}else{
    echo $q;

}

?>