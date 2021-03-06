<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(0);  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "fail";
    } else  {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_password = encryptPassword($_POST['user_password']);
            $user_mobile = $_POST['user_mobile'];
            $status = $_POST['status'];
            $sql = "UPDATE `users` SET user_name='$user_name', user_email='$user_email',user_password='$user_password', user_mobile='$user_mobile',status = '$status' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script type='text/javascript'>window.location='users.php?msg=success'</script>";
            } else {
               echo "<script type='text/javascript'>window.location='users.php?msg=fail'</script>";
            }
        }
?>
<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Users</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getUsers = getDataFromTables('users',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getUsers1 = $getUsers->fetch_assoc(); ?>
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name" data-error="Please enter a valid User Name" required value="<?php echo $getUsers1['user_name'];?>" onkeyup="checkUser()">
                    <span id="user_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Email" data-error="Please enter a valid email address." required value="<?php echo $getUsers1['user_email'];?>" onkeyup="checkemail()">
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter Correct Password." required value="<?php echo decryptPassword($getUsers1['user_password']);?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="user_mobile" class="form-control" id="user_mobile" placeholder="Mobile" data-error="Please enter Correct Mobile Number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['user_mobile'];?>" onkeyup="checkMobile()">
                    <span id="mobile_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getUsers1['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
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
<script type="text/javascript">
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<!--Script for already existed mobile number checking -->
<script>
  function checkUser() {
      var user1 = document.getElementById("user_name").value;
      if (user1){
        $.ajax({
        type: "POST",
        url: "check_user_avail.php",
        data: {
          user_name:user1,
        },
        success: function (response) {
          $( '#user_status' ).html(response);
          if (response == "User Name Already Exist"){
            $("#user_name").val("");
          }
          }
         });
      }
    }
  function checkMobile() {
      var mobile1 = document.getElementById("user_mobile").value;
      if (mobile1){
        $.ajax({
        type: "POST",
        url: "check_mobile_avail.php",
        data: {
          user_mobile:mobile1,
        },
        success: function (response) {
          $( '#mobile_status' ).html(response);
          if (response == "Mobile Number Already Exist"){
            $("#user_mobile").val("");
          }
          }
         });
      }
    }
    function checkemail() {
    var email1 = document.getElementById("user_email").value;
    if (email1){
      $.ajax({
      type: "POST",
      url: "check_email_avail.php",
      data: {
        user_email:email1,
      },
      success: function (response) {
        $( '#email_status' ).html(response);
        if (response == "Email Already Exist"){
          $("#user_email").val("");
        }
        }
       });
    }
  }
</script>