<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getTractorsData = getDataFromTables('tractors',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);  
$id = $_GET['uid'];
$qry = "DELETE FROM tractors WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Tractor Deleted Successfully');window.location.href='tractors.php';</script>";
} else {
   echo "<script>alert('Tractor Not Deleted');window.location.href='tractors.php';</script>";
}
?>