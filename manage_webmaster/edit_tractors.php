<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
    echo "fail";
  } else  {
    $title = $_POST['title'];
    $model = $_POST['model'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE `tractors` SET title = '$title',model = '$model', quantity = '$quantity' WHERE id = '$id' ";
    if($conn->query($sql) === TRUE){
      echo "<script type='text/javascript'>window.location='tractors.php?msg=success'</script>";
    } else {
      echo "<script type='text/javascript'>window.location='tractors.php?msg=fail'</script>";
    }
  }   
?>
<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Tractors</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getTractors = getDataFromTables('tractors',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getTractors1 = $getTractors->fetch_assoc(); ?>
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Title</label>
                    <input type="text" class="form-control" id="form-control-2" name="title" required value="<?php echo $getTractors1['title'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Model</label>
                    <input type="text" class="form-control" id="form-control-2" name="model" required value="<?php echo $getTractors1['model'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Quantity</label>
                    <input type="text" class="form-control" id="form-control-2" name="quantity" required value="<?php echo $getTractors1['quantity'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
<?php include_once 'admin_includes/footer.php'; ?>
<!-- Below script for ck editor -->
<!-- <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' ); 
</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>