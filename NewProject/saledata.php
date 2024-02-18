<?php
$con = mysqli_connect("localhost","root","","ims");
$p_name = $_POST['p_name'];
$c_name = $_POST['c_name'];
$query = mysqli_query($con, "SELECT p_supplier,p_type,p_price,p_qty from product where p_name = '$p_name'");
$get = mysqli_fetch_assoc($query);

$getcusquery = mysqli_query($con, "SELECT c_id, c_debit, c_credit from customer where c_name = '$c_name'");
$getcus = mysqli_fetch_assoc($getcusquery);

$c_debit = 0;
$c_credit = 0;
$c_id = '';
if(mysqli_num_rows($query))
{

    $space = '&nbsp;';
    $type = $get['p_type'];
    $supplier = $get['p_supplier'];
    $price = $get['p_price'];
    $qty = $get['p_qty'];
    
    if(mysqli_num_rows($getcusquery))
    {
        $c_debit = $getcus['c_debit'];
        $c_credit = $getcus['c_credit'];
        $c_id = $getcus['c_id'];
    }

    echo "$space".","."$type".",".$supplier.",".$price.",".$qty.",".$c_debit.",".$c_credit.",".$c_id;

}
else
{
    echo "Following Item does not exist";
}
?>