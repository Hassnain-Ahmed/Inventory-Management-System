<?php
session_start();
if(!isset($_SESSION["ims"]))
{
    header("Location: productupdate.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/src/IMS.png">
    <title>IMS - Product Update</title>
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






        <?php
        $con = mysqli_connect("localhost", "root", "", "ims");
        $p_id = $_GET['p_id'];
        $select_query = mysqli_query($con, "SELECT * from product where p_id = '$p_id'");
        $ret = mysqli_fetch_assoc($select_query);
        
        ?>


        <div id="product_master">
            <div id="pm_data">
                <h3>PRODUCTS</h3>
                <span id="lblTime"></span>
                
                <div id="pm_d_left">
                    <form action="" method="POST">
                        <h4>Update Products</h4>
                        <span>Product ID</span><input type="text" placeholder="" name="" value="P-<?php echo $ret['p_id']?>" required readonly><br>
                        <span>Product Name</span><input type="text" placeholder="Basmati" value="<?php echo $ret['p_name'] ?>" name="p_name" required><br>
                        <span>Product Type</span><input type="text" placeholder="Cooking Oil || Home Decore" name="p_type" value="<?php echo $ret['p_type'] ?>"><br>
                        
                        <span>Product Supplier</span>
                        <!-- <input type="text" placeholder="Supplier A" required name="p_supplier"> -->
                        <select required name="suppliernames">
                            <option value="<?php echo $ret['p_supplier']?>" ><?php echo $ret['p_supplier']?></option>
                            <?php
                            $con = mysqli_connect("localhost","root","","ims");
                            $query = mysqli_query($con, "SELECT s_name from supplier");
                            while($sup=mysqli_fetch_assoc($query))
                            {
                                echo
                                    "
                                        <option value='".$sup['s_name']."'>".$sup['s_name']."</option>
                                    "
                                ;
                            }
                            ?>
                        </select>
                        <br>

                        <span>Product Price (Unit)</span><input type="number" placeholder="xxxx" name="p_price" value="<?php echo $ret['p_price']?>"><br>
                        <span>Product Quantity</span><input type="number" placeholder="xxx" name="p_qty" value="<?php echo $ret['p_qty']?>"> <br>
                        <span>Product Description</span><input placeholder="Description" name="p_desc" value="<?php echo $ret['p_desc']?>"></inp><br>
                        
                        <button type="submit" style="margin-left: 150px;" name="sub">Update Data</button><button type="button" id="clrf">Clear Feilds</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    $con = mysqli_connect("localhost","root","","ims");
    if(isset($_POST['sub']))
    {
        $p_name = $_POST['p_name'];
        $p_type = $_POST['p_type'];
        $p_price = $_POST['p_price'];
        $p_qty = $_POST['p_qty'];
        $p_desc = $_POST['p_desc'];
        $suppliernames = $_POST['suppliernames'];

        $query = mysqli_query($con, "UPDATE product set p_name='$p_name', p_type='$p_type', p_price='$p_price', p_qty='$p_qty', p_desc='$p_desc', p_supplier='$suppliernames' where p_id='$p_id' ");
        if($query)
        {
            echo "<script>window.location.href='product.php'</script>";
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