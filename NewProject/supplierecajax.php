<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$search = $_POST['search'];
$query = mysqli_query($con, "SELECT * from supplier where s_id like '%$search%' OR s_name like '%$search%' OR s_companyname like '%$search%'");

echo 
    "
    <table>
        <tr>
            <th>SUPPLIER ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>COMPANY NAME</th>
            <th>COMPANY CONTACT</th>
            <th>EDIT</th>
        </tr>
    "
    ;
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
echo
    "
        </table>
    "
    ;
?>