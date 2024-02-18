<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$search = $_POST['search'];
$query = mysqli_query($con, "SELECT * from product where p_id like '%$search%' OR p_name like '%$search%' OR p_supplier like '%$search%' ");


echo 
    "
    <table>
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
    "
    ;
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
echo
    "
        </table>
    "
    ;
?>