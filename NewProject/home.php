<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="resources/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <script src="resources/Jquery/jquery.js"></script>
    
    <style>
        #dashboard_wrapper
        {
            height: 90vh;
            background-image: url(resources/src/Animated\ Shape.svg);
            background-size: cover;
            background-attachment: fixed;
            padding: 50px 0;
            overflow-x: hidden;
        }
        body
        {
            overflow: hidden;
        }
    </style>

</head>
<body>
    


    <div id="container" style="display: block;"> 

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
                    <a href="" id="active">DASHBOARD</a>
                    <a href="product.php" id="nonactive">PRODUCT MASTER</a>
                    <a href="customer.php" id="nonactive">CUSTOMER</a>
                    <a href="supplier.php" id="nonactive">SUPPLIER</a>
                    <a href="sale.php" id="nonactive">SALE</a>
                </div>
                <span><a href="logout.php" title="Sign out"><i class="fa fa-sign-out"></i>Logout</a></span>
            </div>
        </div>



        <div id="dashboard_wrapper">
            <div id="dashboard">

                <div id="stats">
                    
                    <a href="salerec.php">
                        <div id="stat_box" title="View" id="totalsales">
                            <h4>Total Sales</h3>
                            <h1 class="count">
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "ims");
                                $query = mysqli_query($con, "SELECT count(*) as number from sale");
                                $get = mysqli_fetch_assoc($query);
                                echo $get['number'];
                                ?>
                            </h1>
                        </div>
                    </a>

                    <a href="productrec.php">
                        <div id="stat_box" title="View" id="totalproducts">
                            <h4>Total Products</h3>
                            <h1 class="count">
                                <?php
                                $query = mysqli_query($con, "SELECT sum(p_qty) as number from product");
                                $get = mysqli_fetch_assoc($query);
                                echo $get['number'];
                                ?>
                            </h1>
                        </div>
                    </a>

                    <a href="outofstock.php">
                        <div id="stat_box" title="View" id="outofstock">
                            <h4>Out of Stock</h3>
                            <h1 class="count">
                                <?php
                                $query = mysqli_query($con, "SELECT count(p_qty) as number from product where p_qty <= 0");
                                $get = mysqli_fetch_assoc($query);
                                echo $get['number'];
                                ?>
                            </h1>
                        </div>
                    </a>


                    <a href="lowonstock.php">
                        <div id="stat_box" title="View" id="lowonstock">
                            <h4>Low on Stock</h3>
                            <h1 class="count">
                                <?php
                                $query = mysqli_query($con, "SELECT count(p_qty) as number from product where p_qty between 1 and 10");
                                $get = mysqli_fetch_assoc($query);
                                echo $get['number'];
                                ?>
                            </h1>
                        </div>
                    </a>

                    
                </div>

                <div id="basic_info">
                    <div id="d_clients">
                        <h3>Clients <span><a href="customerrec.php">View All</a></span></h3>

                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Postal Code</th>
                            </tr>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "ims");
                            $query = mysqli_query($con,"SELECT * from customer order by(c_id) desc limit 5");
                            while($get = mysqli_fetch_assoc($query))
                            {
                                echo 
                                "
                                    <tr>
                                        <td>C-".$get['c_id']."</td>
                                        <td>".$get['c_name']."</td>
                                        <td>".$get['c_contact']."</td>
                                        <td>".$get['c_addr']."</td>
                                        <td>".$get['c_postal']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </table>
                    </div>





                    
                    <div id="d_clients">
                        <h3>Product Master <span><a href="productrec.php">View All</a></span></h3>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Supplier</th>
                                <th>Quantity</th>
                            </tr>
                            <?php
                            $query = mysqli_query($con,"SELECT * from product order by(p_id) desc limit 5");
                            while($get = mysqli_fetch_assoc($query))
                            {
                                echo 
                                "
                                    <tr>
                                        <td>P-".$get['p_id']."</td>
                                        <td>".$get['p_name']."</td>
                                        <td>".$get['p_type']."</td>
                                        <td>".$get['p_supplier']."</td>
                                        <td>".$get['p_qty']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </table>
                    </div>

                    <div id="d_clients">
                        <h3>Sale <span><a href="salerec.php">View All</a></span></h3>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Customer</th>
                                <th>Revenue</th>
                            </tr>
                            <?php
                            $query = mysqli_query($con,"SELECT * from sale order by(s_id) desc limit 5");
                            while($get = mysqli_fetch_assoc($query))
                            {
                                echo 
                                "
                                    <tr>
                                        <td>S-".$get['s_id']."</td>
                                        <td>".$get['s_name']."</td>
                                        <td>".$get['s_type']."</td>
                                        <td>".$get['s_customer']."</td>
                                        <td>".$get['s_total']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </table>
                    </div>

                    <div id="d_clients">
                        <h3>Supplier <span><a href="supplierrec.php">View All</a></span></h3>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Company Name</th>
                            </tr>
                            <?php
                            $query = mysqli_query($con,"SELECT * from Supplier order by(s_id) desc limit 5");
                            while($get = mysqli_fetch_assoc($query))
                            {
                                echo 
                                "
                                    <tr>
                                        <td>S-".$get['s_id']."</td>
                                        <td>".$get['s_name']."</td>
                                        <td>".$get['s_phone']."</td>
                                        <td>".$get['s_addr']."</td>
                                        <td>".$get['s_companyname']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </table>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('.count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                },
                {
                    duration: 1500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>


    <!-- <div id="dashpaswrapper"></div>
    <div id="dash_password">
        <input type="password" placeholder="Enter Admin Password to view data" id="dashpas"><br>
        <button id="btn">Enter</button>
    </div>
    <?php
    echo "
        <script>
            $('#btn').click(function(){
            let dp = $('#dashpas').val();
            dps = '123';
            if(dp == dps)
            {
                $('#dash_password').hide();
                $('#dashpaswrapper').hide();
                $('#container').fadeIn(function(){
                    
                    $('.count').each(function () {
                        $(this).prop('Counter',0).animate({
                            Counter: $(this).text()
                        },
                        {
                            duration: 1500,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });
                });
            }
        });
        </script>
        "
    ?> -->
    
    

</body>
</html>