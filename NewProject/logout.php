<?php
session_start();
session_destroy();
// unset($_SESSION['ims']);
header("Location: index.php");
?>