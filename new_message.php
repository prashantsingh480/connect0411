<div id="new_chat_modal" class="new_chat_modal_class">
        <a href="#">&times;</a>
        <form method="POST" class="new_chat_form">
            <input type="text" placeholder="Username" size="80" class="newchatusername" name="user_name" id="user_name" onkeyup="check_in_db()">

            <datalist id="user"></datalist> <br><br>
            
            <textarea class="newchattextarea" placeholder="Write your message" name="message" id="message"></textarea><br><br>
            <div class="sendcancel">
                <input type="submit" value="Send" class="send" id="send" name="send">
            </div>
            
        </form>


    </div>

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

    if(isset($_POST['send'])){
        $con = mysqli_connect("sm9j2j5q6c8bpgyq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306" , "a7dr1ys3d4pwbb1e", "unc1z5um4r8hpn5u", "z7a8z9kunm4932uy");
        $sender_name=$_SESSION['user_name'];
        $reciever_name=$_POST['user_name'];
        $message=$_POST['message'];
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



    <script src="jquery.js"></script>
    <script>

        function check_in_db(){
            var user_name = document.getElementById("user_name").value ;
            $.post("check_in_db.php",
            {
                user : user_name
            },
            function(data, status){
               // alert(data) ;
               if(data == '<option value = "no user" >'){
                document.getElementById("send").disabled=true;
               }else{
                document.getElementById("send").disabled=false;
               }
               document.getElementById('user').innerHTML = data; 
            }
            );

        }
    </script>