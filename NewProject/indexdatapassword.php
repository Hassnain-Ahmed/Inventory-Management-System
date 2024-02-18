<?php
$con = mysqli_connect("localhost", "root", "", "ims");
$l_password = $_POST['pass'];

$string = $l_password;
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "4311";
$encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
$query = mysqli_query($con, "SELECT * from login where l_password = '$encryption'");
if(mysqli_num_rows($query))
{
    echo "<i class='fa fa-check'></i>";
}
else
{
    echo "<i class='fa fa-close'></i>";
}
?>