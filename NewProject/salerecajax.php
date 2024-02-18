<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$search = $_POST['search'];
$query = mysqli_query($con, "SELECT * from sale where s_id like '%$search%' OR s_name like '%$search%' OR s_supplier like '%$search%' OR s_customer like '%$search%'");


echo 
    "
    <table>
        <tr>
            <th>SALE ID</th>
            <th>NAME</th>
            <th>CUSTOMER</th>
            <th>TYPE</th>
            <th>SUPPLIER</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
            <th>MONEY RECIEVED</th>
        </tr>
    "
    ;
while($get = mysqli_fetch_assoc($query))
{
    echo 
    "
        <tr>
            <td>S-".$get['s_id']."</td>
            <td>".$get['s_name']."</td>
            <td>".$get['s_customer']."</td>
            <td>".$get['s_type']."</td>
            <td>".$get['s_supplier']."</td>
            <td>".$get['s_price']."</td>
            <td>".$get['s_qty']."</td>
            <td>".$get['s_total']."</td>
            <td>".$get['s_moneyrecieved']."</td>
        </tr>
    "
    ;
}
echo
    "
        </table>
    "
    ;
?>