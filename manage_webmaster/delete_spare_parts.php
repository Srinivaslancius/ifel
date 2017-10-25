<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['uid'];
$qry = "DELETE FROM spare_parts WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Spare Parts Data Deleted Successfully');window.location.href='spare_parts.php';</script>";
} else {
   echo "<script>alert('Spare Parts Data Not Deleted');window.location.href='spare_parts.php';</script>";
}
?>