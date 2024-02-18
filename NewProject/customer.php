<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: customer.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Customer</title>
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
                    <a href="customer.php" id="active">CUSTOMER</a>
                    <a href="supplier.php" id="nonactive">SUPPLIER</a>
                    <a href="sale.php" id="nonactive">SALE</a>
                </div>
                <span><a href="logout.php" title="Sign out"><i class="fa fa-sign-out"></i>Logout</a></span>
            </div>
        </div>


        <div id="product_master">
            <div id="pm_data">
                <h3>CUSTOMER</h3>
                <span id="lblTime"></span>
                <div id="pm_d_left">
                    <form action="" method="POST"> <br><br>
                        <h4>Add Customer Details</h4>
                        <span>Customer Name</span><input type="text" placeholder="John Doe" name="c_name" required><br>
                        <span>Contact</span> <input type="tel" placeholder="xx-xxx-xxx-xxx" name="c_contact"><br>
                        <span>Debit</span> <input type="number" placeholder="xxxx" name="c_debit"><br>
                        <span>Credit</span> <input type="number" placeholder="xxxxx" name="c_credit"><br>
                        <span>Gender</span> <input type="text" placeholder="Male | Female | Other" name="c_gender"><br>
                        <span>Address</span> <input type="text" placeholder="Address near dash Street" name="c_addr"><br>
                        <span>Postal Code</span> <input type="text" placeholder="xx-xxx" name="c_postal"><br>
                        <span>Customer Since</span><input type="date" placeholder="" name="c_cussince"><br>
                        
                        <button type="submit" style="margin-left: 150px;" name="sub">Enter Data</button><button type="button" id="clrf">Clear Feilds</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php
    $con = mysqli_connect("localhost","root","","ims");
    if(isset($_POST['sub']))
    {
        $c_name = $_POST['c_name'];
        $c_contact = $_POST['c_contact'];
        $c_gender = $_POST['c_gender'];
        $c_addr = $_POST['c_addr'];
        $c_postal = $_POST['c_postal'];
        $c_cussince = $_POST['c_cussince'];

        $c_debit = $_POST['c_debit'];
        $c_credit = $_POST['c_credit'];


        $query = mysqli_query($con, "insert into customer(c_id, c_name, c_contact, c_gender, c_addr, c_postal, c_cussince, c_debit, c_credit) values('', '$c_name', '$c_contact', '$c_gender', '$c_addr', '$c_postal', '$c_cussince', '$c_debit', '$c_credit')");
        if($query)
        {
            echo "<script>console.log('success')</script>";
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