<?php
include_once('../manage_webmaster/admin_includes/config.php');
include_once('../manage_webmaster/admin_includes/common_functions.php');
if(isset($_POST['user_mobile'])) {
	$mobile=$_POST['user_mobile'];
	$checkdata=" SELECT user_mobile FROM users WHERE user_mobile='$mobile' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Mobile Number Already Exist";
	} else {
	}
exit();
}