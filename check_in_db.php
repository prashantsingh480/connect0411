<?php

$con = mysqli_connect("sql12.freemysqlhosting.net:3306" , "sql12362362", "6GtTPNlghQ", "sql12362362");

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