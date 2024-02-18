<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: outofstock.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Stock</title>
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
                    <a href="product.php" id="active">PRODUCT MASTER</a>
                    <a href="customer.php" id="nonactive">CUSTOMER</a>
                    <a href="supplier.php" id="nonactive">SUPPLIER</a>
                    <a href="sale.php" id="nonactive">SALE</a>
                </div>
                <span><a href="logout.php" title="Sign out"><i class="fa fa-sign-out"></i>Logout</a></span>
            </div>
        </div>










        <div id="product_master">
            <div id="oos_data">
                    <h3>Out Of Stock</h3>
                    <span id="lblTime"></span>
                <table id="o_o_s">
                    <tr>
                        <th>PRODUCT ID</th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUPPLIER</th>
                        <th>DESCRIPTION</th>
                        <th>EDIT RECORDS</th>
                    </tr>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "ims");
                    $query = mysqli_query($con,"SELECT * from product where p_qty <= 0");
                    while($get = mysqli_fetch_assoc($query))
                    {
                        $p_id = $get['p_id'];
                        echo 
                        "
                            <tr>
                                <td>P-".$get['p_id']."</td>
                                <td>".$get['p_name']."</td>
                                <td>".$get['p_type']."</td>
                                <td>".$get['p_price']."</td>
                                <td>".$get['p_qty']."</td>
                                <td>".$get['p_supplier']."</td>
                                <td>".$get['p_desc']."</td>
                                <td><a href='productupdate.php?p_id=$p_id'>Edit</a></td>
                            </tr>
                        "
                        ;
                    }
                    ?>

                </table>

            </div>
        </div>
















        

    <script src="time.js"></script>
    <script src="sale.js"></script>


</body>
</html>