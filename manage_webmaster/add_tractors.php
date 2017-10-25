<?php include_once 'admin_includes/main_header.php'; ?>
<?php
if (!isset($_POST['submit']))  {
  //If fail
  echo "fail";
} else  {
  //If success
  $title = $_POST['title'];
  $model = $_POST['model'];
  $quantity = $_POST['quantity'];
   
  $sql = "INSERT INTO tractors (`title`,`model`,`quantity`) VALUES ('$title','$model', '$quantity')";
  if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>window.location='tractors.php?msg=success'</script>";
  }else {
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
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Title</label>
                    <input type="text" class="form-control" id="form-control-2" name="title" placeholder="Title" data-error="Please enter Title." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Model</label>
                    <input type="text" class="form-control" id="form-control-2" name="model" placeholder="Model" data-error="Please enter Model." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Quantity</label>
                    <input type="text" class="form-control" id="form-control-2" name="quantity" placeholder="Quantity" data-error="Please enter Quantity." required>
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