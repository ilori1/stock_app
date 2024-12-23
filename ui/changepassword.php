<?php

include_once'connectdb.php';
session_start();



if($_SESSION['useremail']==""){

  header('location:../index.php');
  
  }

  if($_SESSION['role']=="Admin"){

    include_once"header.php";

  }else{

    include_once"header.php";

  }





// step 1 -get out values from user when the  click on update password into a variables

if (isset($_POST['btnupdate'])) {

    $oldpassword_txt = $_POST['txt_oldpassword'];
    $newpassword_txt = $_POST['txt_newpassword'];
    $confirmpassword_txt = $_POST['txt_confirmpassword'];

//echo $oldpassword_txt."-".$newpassword_txt."-".$confirmpassword_txt;

// step 2 -using of select query, we will get out values from the database records according to useremail.
$email = $_SESSION["useremail"];  // this is session value which

$select =$pdo->prepare("select * from tbl_user where useremail='$email'");

$select ->execute();   // it execute the sql command in db
$row=$select->fetch(PDO::FETCH_ASSOC);     // fetch data from the record

$useremail_db=$row['useremail'];
$password_db= $row['userpassword'];




// step 3 compare both values


if($oldpassword_txt== $password_db){
if($newpassword_txt== $confirmpassword_txt){



  //step 4     run updates querry if values match


$update=$pdo->prepare("update tbl_user set userpassword=:pass where useremail=:email");

$update->bindparam(':pass',$confirmpassword_txt);
$update->bindparam(':email',$email);

if($update->execute()){
$_SESSION['status']="Password Updated Successfully";
$_SESSION['status_code']="success";





}else{

$_SESSION['status']="Password Does Not UPDATED Successfully";
$_SESSION['status_code']="error";

}

 



  // $_SESSION['status']="New Password Matched";
  // $_SESSION['status_code']="success";

}else{

  $_SESSION['status']="New Password Does Not  Matched";
  $_SESSION['status_code']="error";


}





  // $_SESSION['status']="Password Matched";
  // $_SESSION['status_code']="success";
 }else{

  $_SESSION['status']="Password Does Not  Matched";
  $_SESSION['status_code']="error";

 }





}

 

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

          
                  <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Old Password" name="txt_oldpassword">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="New Password" name="txt_newpassword">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="txt_confirmpassword">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="btnupdate">Update Password</button>
                
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <?php



include_once "footer.php";

?>



<?php
if(isset($_SESSION['status']) && $_SESSION['status']!='')

{

?>
<script>

      swal.fire({
        icon: '<?php echo $_SESSION['status_code'];?>',
        title: '<?php echo $_SESSION['status'];?>'
      });

</script>
<?php

unset($_SESSION['status']);
}

?>
