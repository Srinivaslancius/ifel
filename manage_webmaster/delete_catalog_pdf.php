<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getCatalogPdfData = getDataFromTables('catalog_pdf',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);  
$id = $_GET['uid'];
$target_dir = '../uploads/catalog_pdf/';
$getImgUnlink = getImageUnlink('pdf_name','catalog_pdf','id',$id,$target_dir);
$qry = "DELETE FROM catalog_pdf WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Pdf Deleted Successfully');window.location.href='catalog_pdf.php';</script>";
} else {
   echo "<script>alert('Pdf Not Deleted');window.location.href='catalog_pdf.php';</script>";
}
?>