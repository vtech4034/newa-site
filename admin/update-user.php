<?php 
include "header.php"; 

if(isset($_POST['submit']))
{
    include "config.php";
    $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
    $firstname=mysqli_real_escape_string($conn,$_POST['fname']);
    $lastname=mysqli_real_escape_string($conn,$_POST['lname']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);

    $sql="UPDATE `user` SET `first_name`='firstname',`last_name`='lastname',`username`='username',`role`='$role' WHERE `user_id`='$userid' ";
    $result =mysqli_query($sql);
    if($result==1)
    {
        header("Location: http://localhost/news-site/admin/update-user.php");
    }

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="1" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text"us name="f_name" class="form-control" value="Ram" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="Sharma" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="ram" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                              <option value="0">normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
