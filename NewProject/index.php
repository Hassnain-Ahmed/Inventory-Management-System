<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS logo.png">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="index.css">
    <script src="resources/Jquery/jquery.js"></script>
    <link rel="stylesheet" href="resources/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">

    <style>
        body
        {
            background-image: url(resources/src/Animated\ Shape.svg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        #login_form span
        {
            position: absolute;
            margin: 10px 0 0 -25px;
            color: #333;
        }

    </style>

</head>
<body>



    <div id="login_form">
        <form action="" method="post">
            <h1>Login</h1> <br>
            <input type="text" placeholder="Username" id="name" name="l_username"><span id="n_span"></span>
            <input type="password" placeholder="Password" id="pass" name="l_password"><span id="p_span"></span> <br>
            <button id="login_btn" type="submit" name="sub">Login</button>
            <p>INVENTORY MANAGEMENT SYSTEM BY <b>HASSNAIN AHMED</b></p>
        </form>
    </div>
    <script src="index.js"></script>
    
    <?php
    $con = mysqli_connect("localhost", "root", "", "ims");
    session_start();
    if(isset($_POST['sub']))
    {
        $_SESSION['ims'] = "ims";
        $l_username = $_POST['l_username'];
        $l_password = $_POST['l_password'];


        $string = $l_password;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "4311";
        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);



        $query = mysqli_query($con, "SELECT * from login where l_username = '$l_username' and l_password = '$encryption'");
        if(mysqli_num_rows($query))
        {
            header("Location:home.php");
        }
    }
    ?>



    
</body>
</html>