<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: supplierupdate.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Supplier Update</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="resources/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <script src="resources/Jquery/jquery.js"></script>
    <style>html{overflow-y: hidden;}</style>
</head>
<body>
    


    <div id="container">

        <div id="top_bar_wrapper">
            <div id="top_bar">
                <div id="top_bar_left">
                    <div><i class="fa fa-phone"></i><span>0312345678</span></div>
                    <div><i class="fa fa-envelope"></i><span>example@gmail.com</span></div>
                </div>
                <div id="top_bar_right">
                    <div><a href=""><img src="resources/src/facebbok.png" title="Facebook"></a></div>
                    <div><a href=""><img src="resources/src/instagram.png" title="Instagram"></a></div>
                    <div><a href=""><img src="resources/src/twitter.png" title="Twitter"></a></div>
                    <div><a href=""><img src="resources/src/linkedin.png" title="Linkedin"></a></div>
                </div>
            </div>
        </div>

        <div id="navbar_wrapper">
            <div id="navbar">
                <h2>Company Name</h2>
                <div>
                    <a href="home.php" id="nonactive">DASHBOARD</a>
                    <a href="product.php" id="nonactive">PRODUCT MASTER</a>
                    <a href="customer.php" id="nonactive">CUSTOMER</a>
                    <a href="supplier.php" id="active">SUPPLIER</a>
                    <a href="sale.php" id="nonactive">SALE</a>
                </div>
                <span><a href="logout.php" title="Sign out"><i class="fa fa-sign-out"></i>Logout</a></span>
            </div>
        </div>






        <?php
        $con = mysqli_connect("localhost", "root", "", "ims");
        $s_id = $_GET['s_id'];
        $select_query = mysqli_query($con, "SELECT * from supplier where s_id = '$s_id'");
        $get = mysqli_fetch_assoc($select_query);
        ?>


        <div id="product_master">
            <div id="pm_data">
                <h3>SUPPLIER</h3>
                <span id="lblTime"></span>
                
                <div id="pm_d_left">
                    <form action="" method="POST">
                        <h4>Update Supplier</h4>
                        <span>Supplier ID</span><input type="text" placeholder="John Deo" name="s_name" readonly value="S-<?php echo $get['s_id']?>"> <br>
                        <span>Supplier Name</span><input type="text" placeholder="John Deo" name="s_name" value="<?php echo $get['s_name']?>"> <br>
                        <span>Supplier Address</span><input type="text" placeholder="Bristol Near Xyz Street" name="s_addr" value="<?php echo $get['s_addr']?>"> <br>
                        <span>Supplier Phone</span><input type="tel" placeholder="xx-xxx-xxx-xxx" name="s_phone" value="<?php echo $get['s_phone']?>"><br>
                        <span>Supplier Email</span><input type="email" placeholder="suppliername@email.com" name="s_email" value="<?php echo $get['s_email']?>"><br>
                        <span>Company Name</span><input type="text" placeholder="Basmati | Other" name="s_companyname" value="<?php echo $get['s_companyname']?>"><br> 
                        <span>Company Contact</span><input type="tel" placeholder="xx-xxx-xxx-xxx" name="s_companycontact" value="<?php echo $get['s_companycontact']?>"><br> 
                        
                        <button type="submit" style="margin-left: 150px;" name="sub">Update Data</button><button type="button" id="clrf">Clear Feilds</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if(isset($_POST['sub']))
    {
        $s_name = $_POST['s_name'];
        $s_addr = $_POST['s_addr'];
        $s_phone = $_POST['s_phone'];
        $s_email = $_POST['s_email'];
        $s_companyname = $_POST['s_companyname'];
        $s_companycontact = $_POST['s_companycontact'];

        $query = mysqli_query($con, "UPDATE supplier set s_name='$s_name', s_addr = '$s_addr', s_phone='$s_phone', s_email = '$s_email', s_companyname = '$s_companyname', s_companycontact = '$s_companycontact' where s_id = '$s_id'");
        if($query)
        {
            header("Location:supplierrec.php");
        }
        else
        {
            echo "<script>console.log('failed')</script>";
        }
    }
    ?>








    <script src="time.js"></script>
    <script src="sale.js"></script>


</body>
</html>