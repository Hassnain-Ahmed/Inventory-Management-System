<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: supplierrec.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Supplier Records</title>
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










        <div id="product_master">
            <div id="oos_data">
                <h3>
                    All Supplier Records
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
                        <th>SUPPLIER ID</th>
                        <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>COMPNAY NAME</th>
                        <th>COMPANY CONTACT</th>
                        <th>EDIT</th>
                    </tr>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "ims");
                    $query = mysqli_query($con,"SELECT *from supplier order by (s_id) desc");
                    while($get = mysqli_fetch_assoc($query))
                    {
                        $s_id = $get['s_id'];
                        echo 
                        "
                            <tr>
                                <td>S-".$get['s_id']."</td>
                                <td>".$get['s_name']."</td>
                                <td>".$get['s_addr']."</td>
                                <td>".$get['s_phone']."</td>
                                <td>".$get['s_email']."</td>
                                <td>".$get['s_companyname']."</td>
                                <td>".$get['s_companycontact']."</td>
                                <td><a href='supplierupdate.php?s_id=$s_id'>Edit</a></td>
                            </tr>
                            
                        "
                        ;
                    }
                    ?>
                    

                </table>

            </div>
        </div>
















    <script src="supplierrec.js"></script>
    <script src="allrechideshowdata.js"></script>
    <script src="time.js"></script>

</body>
</html>