<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$l_username = $_POST['name'];
$query = mysqli_query($con, "SELECT * from login where l_username = '$l_username'");
if(mysqli_num_rows($query))
{
    echo "<i class='fa fa-check'></i>";
}
else
{
    echo "<i class='fa fa-close'></i>";
}
?>