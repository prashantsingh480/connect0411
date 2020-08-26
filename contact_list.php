<?php

session_start();
$con = mysqli_connect("sql12.freemysqlhosting.net:3306" , "sql12362362", "6GtTPNlghQ", "sql12362362");
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