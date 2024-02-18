<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: customerrec.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Customer Records</title>
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
            <div id="oos_data">
                <h3>
                    All Customer Records
                    <span>
                        <div id="al-searchbar-input">
                            <i class="fa fa-search"></i>
                            <input type="text" placeholder="Search Records" id="search">
                        </div>
                    </span>
                </h3>
                <span id="lblTime"></span>

                <div id="result"></div>

                <table id="o_o_s">
                    <tr>
                        <th>CUSTOMER ID</th>
                        <th>NAME</th>
                        <th>CONTACT</th>
                        <th>DEBIT</th>
                        <th>CREDIT</th>
                        <th>GENDER</th>
                        <th>ADDRESS</th>
                        <th>POSTAL</th>
                        <th>CUSTOMER FOR</th>
                        <th>EDIT</th>
                    </tr>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "ims");
                    $query = mysqli_query($con,"SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), c_cussince)), '%Y') + 1 AS age from customer order by (c_id) desc");
                    while($get = mysqli_fetch_assoc($query))
                    {
                        $c_id = $get['c_id'];
                        echo 
                        "
                            <tr>
                                <td>C-".$get['c_id']."</td>
                                <td>".$get['c_name']."</td>
                                <td>".$get['c_contact']."</td>
                                <td>".$get['c_debit']."</td>
                                <td>".$get['c_credit']."</td>
                                <td>".$get['c_gender']."</td>
                                <td>".$get['c_addr']."</td>
                                <td>".$get['c_postal']."</td>
                                <td>".$get['age']." Years</td>
                                <td><a href='customerupdate.php?c_id=$c_id'>Edit</a></td>
                            </tr>
                            
                        "
                        ;
                    }
                    $getcdquery = mysqli_query($con, "select sum(c_credit) as cc, sum(c_debit) as cd from customer");
                    $getcd = mysqli_fetch_assoc($getcdquery);
                    echo 
                        "
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Total : ".$getcd['cd']."</td>
                                <td>Total : ".$getcd['cc']."</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        ";
                    ?>
                    

                </table>

            </div>
        </div>
















    <script src="customerrecajax.js"></script>
    <script src="allrechideshowdata.js"></script>
    <script src="time.js"></script>

</body>
</html>