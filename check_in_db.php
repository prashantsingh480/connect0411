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

if(isset($_POST['user'])){
    $q= 'SELECT * FROM `users` WHERE `user_name`= "'.$_POST['user'].'"';
    $r = mysqli_query($con, $q) ;
    if($r){
        if(mysqli_num_rows($r)>0){

            while($row = mysqli_fetch_assoc($r)){
                $user_name = $row['user_name'];
                echo '<option value = "'.$user_name.'" >';
            }

        }else{
            echo '<option value = "no user" >';
        }
    }else{
        echo $q;
    }
}

?>