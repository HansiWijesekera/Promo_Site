<?php
session_start();
if ($_SESSION['userType'] == "1") {
	header('location:Admin/companyPlatform.php');
} else if ($_SESSION['userType'] == "2") {
	header('location:Company/promotionPlatform.php');
} else if ($_SESSION['userType'] == "3") {
	echo "<script type='text/javascript'>alert('Expired User - Please Contact Admin');location.href='index.php'</script>";
}
