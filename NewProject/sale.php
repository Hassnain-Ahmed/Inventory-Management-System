<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: sale.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Sale</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="resources/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <script src="resources/Jquery/jquery.js"></script>
    
    <style>html{overflow-y: hidden;}</style>
</head>
<body>
    


    <!-- <div id="cartspace">
        <i class="fa fa-close"></i>
        <form action="" method="POST">
            <div id="atc-records">
                <table id="atc-table">
                    <tr>
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Type</th>
                        <th>Supplier</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </table>
                
            </div>
            
            <div id="cartspace-btn"><button type="submit" name="submit" >&emsp;Sale&emsp;</button></div>
        </form>
    </div> -->


    <?php
    $con = mysqli_connect("localhost","root","","ims");

    if(isset($_POST['submit']))
    {
        $pname = $_POST['pro_name'];
        $cusname = $_POST['cus_name'];
        $ptype = $_POST['pro_type'];
        $psupplier = $_POST['pro_supplier'];
        $pprice = $_POST['pro_price'];
        $pqty = $_POST['pro_qty'];
        $ptotal = $_POST['pro_total'];
        
        if($pname and $pqty)
        {
            $querry = mysqli_query($con, "INSERT into sale(s_id, s_name, s_type, s_supplier, s_price, s_qty, s_total, s_customer) values('','$pname', '$ptype', '$psupplier', '$pprice', '$pqty', '$ptotal', '$cusname')");
            if($querry)
            {
                echo '<script>$("#cartspace").fadeOut();
                $("#container").css({"filter":"blur(0px)","transition":".25s"});</script>';
            }
        }
        else
        {
            echo "error";
        }
    }
    ?>






    <div id="container" style="display:block">

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
                    <a href="supplier.php" id="nonactive">SUPPLIER</a>
                    <a href="sale.php" id="active">SALE</a>
                </div>
                <span><a href="logout.php" title="Sign out"><i class="fa fa-sign-out"></i>Logout</a></span>
            </div>
        </div>


        <div id="product_master">
            <div id="pm_data">
                <h3>SALE 
                    <!-- <span id="carticon"><i class="fa fa-cart-shopping"></i>CART</span><span id="count_product">0</span> -->
                </h3>
                <span id="lblTime"></span>
                <div id="pm_d_left">
                    <form action="" method="POST">
                        <h4>Make Sales</h4>
                        <span>Product Name</span><input type="text" placeholder="Basmati" value="" required class="p_name" name="s_name"><br>
                        <span>Customer</span><input type="text" placeholder="Jhon Doe" value="" class="c_name" name="s_customer"><br>
                        <span>Debit</span><input type="number" placeholder="xxx" value="" class="c_debit" name="c_debit" readonly><br>
                        <span>Credit</span><input type="number" placeholder="xxxx" value="" class="c_credit" name="c_credit" readonly><br>
                        <span>Type</span><input type="text" placeholder="Cooking Oil || Home Decore" class="p_type" readonly name="s_type"><br>
                        <span>Supplier</span> <input type="text" placeholder="Supplier A"  class="p_supplier" readonly name="s_supplier"><br>
                        <span>Price (Unit)</span><input type="number" placeholder="xxxx" id="p_price" readonly name="s_price"><br>
                        <span>Quantity</span><input type="number" placeholder="xxx" id="s_qty" name="s_qty" required> <br>
                        <span>Total</span><input type="number" placeholder="xxx" id="s_total" readonly name="s_total"> <br>
                        <span>Money Recieved</span><input type="number" placeholder="xxx" id="" class="s_moneyrecieved" value="0" name="s_moneyrecieved"> <br>
                        
                        <input value="" name="c_id" class="c_id" style="position: absolute; z-index: -1; visibility: hidden;" readonly>

                        <button type="submit" style="margin-left: 150px;" class="sub" name="sub" onclick="printsingle()">&emsp;Sale&emsp;</button><button type="button" id="clrf">Clear Feilds</button>
                        <!-- <button type="button" style="margin-left: 150px;" id="atc">Add to Cart</button> -->
                    </form>
                </div>
                <form action="" method="post">
                    <div id="msgs">
                        <p id="msgbox1">&nbsp;</p>
                        <p id="msgbox3">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox2">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                        <p id="msgbox0">&nbsp;</p>
                    </div>
                </form>
            </div>
        </div>
    </div>




    






    <?php
    $queryy = mysqli_query($con, "SELECT count(s_id) as id from sale");
    $id = mysqli_fetch_assoc($queryy);
    $addid = $id['id']+1;
    ?>

    <div id="recipt">
        <h2 id="heading_title">Company_Name</h1>
        
        <div id="customer_info">
            <h3>Bill To</h3>
            <h4>Customer Name: </h4><span id="customer_name"></span>
        </div>

        <div id="bill_info">
            <h4>Reciept Id: </h4><span id="recipt_no">S-<?php echo $addid?></span>
            <h4>Reciept Date:</h4><span id="recipt_date"></span>
        </div>

        <div id="bill_table">
            <table>
                <tr>
                    <th>QTY</th> <th>DESCRIPTION</th> <th>UNIT PRICE</th> <th>AMOUNT</th>
                </tr>
                <tr id="records">
                    <td id="print_sale_qty"></td>
                    <td id="print_sale_name"></td>
                    <td id="print_sale_up"></td>
                    <td id="print_sale_tprice"></td>
                </tr>
            </table>
        </div>

        

        <br>
        <div id="total">
            <table>
                <tr>
                    <td>Total: <b id="tt"></b></td>
                </tr>
                <tr>
                    <td>Money Recieved: <b id="mr"></b></td>
                </tr>
            </table>
        </div>

        <div id="store_details">
            <br>
            <h3>TERMS & CONDITIONS</h3>
            <p>Payment is due within 10 days</p>
            <p>No Return or Exchange After 10 days</p>
        </div>
    </div>



    
    <?php
    $con = mysqli_connect("localhost","root","","ims");
    if(isset($_POST['sub']))
    {
        $c_id = $_POST['c_id'];
        $s_name = $_POST['s_name'];
        $s_type = $_POST['s_type'];
        $s_supplier = $_POST['s_supplier'];
        $s_price = $_POST['s_price'];
        $s_qty = $_POST['s_qty'];
        $s_total = $_POST['s_total'];
        $s_customer = $_POST['s_customer'];
        $s_moneyrecieved = $_POST['s_moneyrecieved'];

        $c_debit = $_POST['c_debit'];
        $c_credit = $_POST['c_credit'];

        $cusquery = mysqli_query($con, "SELECT * FROM customer where c_id = '$c_id'");
        if($cusquery)
        {
            mysqli_query($con, "UPDATE CUSTOMER set c_debit = '$c_debit', c_credit = '$c_credit' where c_id = '$c_id'");
        }
        else
        {
            echo "<script>alert('!found')</script>";
        }


        $query = mysqli_query($con, "INSERT into sale(s_id, s_name, s_type, s_supplier, s_price, s_qty, s_total, s_customer, s_moneyrecieved) values('', '$s_name', '$s_type', '$s_supplier', '$s_price', '$s_qty', '$s_total', '$s_customer', '$s_moneyrecieved')");
        if($query)
        {
            echo "<script>console.log('success')</script>";
        }
        else
        {
            echo "<script>console.log('failed')</script>";
        }

        mysqli_query($con, "UPDATE product set p_qty = (p_qty-$s_qty) where p_name = '$s_name'");

    }
    ?>





    <script src="time.js"></script>
    <script src="sale.js"></script>


</body>
</html>