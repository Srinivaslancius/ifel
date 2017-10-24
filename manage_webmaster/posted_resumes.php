<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getPostedResumesData = getAllData('posted_resumes'); $i=1; ?>
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <!-- <a href="add_posted_resumes.php" style="float:right">Add Posted Resumes</a> -->
            <h3 class="m-t-0 m-b-5">Posted Resumes</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Resumes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getPostedResumesData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['resume_title'];?></td>
                    <td><?php echo substr(strip_tags($row['resume_description']), 0,150);?></td>
                    <td><a href="<?php echo $row['resumes'];?>"><img src="../uploads/index.jpg" alt="" height="60"></a></td>
                  </tr>
                  <?php  $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>