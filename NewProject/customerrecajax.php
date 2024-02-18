<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$search = $_POST['search'];
$query = mysqli_query($con, "SELECT * from customer where c_id like '%$search%' OR c_name like '%$search%' OR c_addr like '%$search%' ");
$agequery = mysqli_query($con, "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), c_cussince)), '%Y') + 1 AS age from customer where c_id like '%$search%' OR c_name like '%$search%' OR c_addr like '%$search%'");

echo 
    "
    <table>
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
    "
    ;
while($get = mysqli_fetch_assoc($query) and $age = mysqli_fetch_assoc($agequery))
{
    $c_id = $get['c_id'];
    echo 
    "
        <tr>
            <td>P-".$get['c_id']."</td>
            <td>".$get['c_name']."</td>
            <td>".$get['c_contact']."</td>
            <td>".$get['c_debit']."</td>
            <td>".$get['c_credit']."</td>
            <td>".$get['c_gender']."</td>
            <td>".$get['c_addr']."</td>
            <td>".$get['c_postal']."</td>
            <td>".$age['age']." Years</td>
            <td><a href='customerupdate.php?c_id=$c_id'>EDIT</a></td>
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