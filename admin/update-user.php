<?php 
include "header.php"; 

if(isset($_POST['submit']))
{
    include "config.php";
    $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
    $firstname=mysqli_real_escape_string($conn,$_POST['f_name']);
    $lastname=mysqli_real_escape_string($conn,$_POST['l_name']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);

    $sql="UPDATE `user` SET `first_name`='$firstname',`last_name`='$lastname',`username`='$username',`role`='$role' WHERE `user_id`='$userid' ";
    $result =mysqli_query($conn,$sql);
    if($result==1)
    {
        
        echo "<p style='display:flex;justify-content:center;text-align:center;'> User update Successfully </p>";
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
              <?php
                  include 'config.php';
                  $user_id=$_GET['id'];
                $sql="SELECT * FROM `user` where user_id='$user_id' ";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
                ?>


                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $user_id ;?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text"us name="f_name" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role'];?>">
                             <?php 
                             if($row['role'] == '1') 
                               {
                               echo "<option value='1' selected>Admin</option>";
                               echo "<option value='0'>User</option>";                             
                               }else
                               {
                                echo "<option value='1' >Admin</option>";
                                echo "<option value='0' selected>User</option>";
                               }                             
                             ?>
                             
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>

                  <?php 
                  }
                }?>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
