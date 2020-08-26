<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Yourself</title>
    <link rel="stylesheet" type="text/css" href="register.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Roboto+Slab|Roboto:100,200,300,400,500,700"
        rel="stylesheet" />

</head>

<body>
    <header>
        <div class="logo">
            <img src="images/Connect.png" class="image">
        </div>

        <div class="top">
            <ul class="icons">

                <li class="whitetext"><a href="new.php">HOME</a></li>
                <li class="whitetext"><a href="#">FAQs</a></li>
                <li class="blacktext"><a href="#">ABOUT US</a></li>
                <li class="blacktext"><a href="#">GET STARTED</a></li>

            </ul>

        </div>



    </header>
    <div class="createheadingmain">
        <p class="bighead">Create an account</p>
        <p class="smallhead">It's free and always will be</p>

    </div>
    <div class="black">

    </div>
    <div class="bgimg">

    </div>

    <div class="textform">
        <form method="POST" >
            <p>

                <input type="text" placeholder="First Name" id="firstname" name="firstname" size="20">
                <input type="text" placeholder="Last Name" id="Lastname" name="lastname" size="20">


            </p>
            <p>

                <input type="email" placeholder="E-mail" id="email" name="email" size="46">

            </p>
            <p>
                <input type="email" placeholder="Re enter E-mail" id="reenteremail" name="email" size="46">
            </p>
            <p>
                <input type="password" placeholder="Password" id="password" name="password" size="46">
            </p>
            <p>
                <input type="date" placeholder="Date of birth" id="dob" name="dob" size="46">
            </p>
            <p>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

            </p>
            <p class="warning">
                By clicking Create Account, you agree to our terms and contitons and that you have read our data policy.
            </p>
            <p>
            <input class="createbutton" type="submit" id="createaccount" name="createaccount" value="Create account">
        </p>
        
        </form>
        

        <?php
        $con = mysqli_connect("sql12.freemysqlhosting.net:3306" , "sql12362362", "6GtTPNlghQ", "sql12362362");
        if(isset($_POST['createaccount'])){
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $user_name=$_POST['email'];
            $password=$_POST['password'];
            
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            //check if account exist.
            $check="SELECT * FROM `users` WHERE `user_name`='".$user_name."'";
            $result=mysqli_query($con, $check);
            $count=mysqli_num_rows($result);
            if($count>0){
                echo 'account already exists.';
            }else{
                //insert values to DB.
            $q="INSERT INTO `users`(`id`, `firstname`, `lastname`, `user_name`, `password`, `dob`, `gender`)
            VALUES('', '".$firstname."', '".$lastname."', '".$user_name."','".$password."','".$dob."','".$gender."')";
             $r=mysqli_query($con, $q);

             if($r){
                 echo 'you have successfully registered.';  //need to add style in echo.
             }else{
                 echo $q;
             }
        }

    }

        
?>

        
    </div>

</body>

</html>