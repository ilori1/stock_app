<?php


include_once'connectdb.php';
session_start();


include_once"header.php";

if(isset($_POST['btnsave'])){

$category = $_POST['txtcategory'];

if(empty($category)){

    $_SESSION['status']="Category Field is Empty";
    $_SESSION['status_code']="warning";
  


}else{

$insert=$pdo->prepare("insert into tbl_category (category) values(:cat)");

$insert->bindParam(':cat',$category);

if($insert->execute()){
    $_SESSION['status']="Category Added Successfully";
    $_SESSION['status_code']="success";

}else{

    $_SESSION['status']="Category Added Failed";
    $_SESSION['status_code']="danger";
}
}}








if(isset($_POST['btnupdate'])){

  $category = $_POST['txtcategory'];
  $id = $_POST['txtcatid'];

  if(empty($category)){
  
      $_SESSION['status']="Category Field is Empty";
      $_SESSION['status_code']="warning";
    
  
  
  }else{
  
  $update=$pdo->prepare("update tbl_category set category=:cat where catid=".$id);
  
  $update->bindParam(':cat',$category);
  
  if($update->execute()){
      $_SESSION['status']="Category Update Successfully";
      $_SESSION['status_code']="success";
  
  }else{
  
      $_SESSION['status']="Category Update Failed";
      $_SESSION['status_code']="danger";
  }
  }}


if(isset($_POST['btndelete'])){

$delete=$pdo->prepare("delete from tbl_category where catid=".$_POST['btndelete']);

if($delete->execute()){
  $_SESSION['status']="Category deleted Successfully";
  $_SESSION['status_code']="success";



}else{

  $_SESSION['status']="Failed to Delete Category";
  $_SESSION['status_code']="swarning";


}



}else{





}








?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="card card-warning card-outline">
              

              
              <form action="" method="post">
              <div class="card-body">

<div class="row">


<?php

if(isset($_POST['btnedit'])){

$select=$pdo->prepare("select * from tbl_category where catid =".$_POST['btnedit']);

$select->execute();

if($select){
$row=$select->fetch(PDO::FETCH_OBJ);

echo'<div class="col-md-4">


<div class="form-group">
  <label for="ExampleInputEmail">Category</label>

  
  <input type="hidden" class="form-control" placeholder="Enter Category" value="'.$row->catid.'" name="txtcatid" >


  <input type="text" class="form-control" placeholder="Enter Category" value="'.$row->category.'" name="txtcategory" >
</div>


<div class="card-footer">
<button type="submit" class="btn btn-info" name="btnupdate">Update</button>
</div>



</div>';




}





}else{

echo'<div class="col-md-4">


<div class="form-group">
  <label for="ExampleInputEmail">Category</label>
  <input type="text" class="form-control" placeholder="Enter Category" name="txtcategory" >
</div>


<div class="card-footer">
<button type="submit" class="btn btn-warning" name="btnsave">Save</button>
</div>



</div>';




}




?>


















<div class="col-md-8">

<table id="table_category"   class="table table-striped table-hover">
<thead>
<tr>
  <td>#</td>
  <td>Category</td>
  <td>Edit</td>
  <td>Delete</td>
  
</tr>
</thead>

<tbody>




<?php

$select = $pdo->prepare("select * from tbl_category order by catid ASC");
$select->execute();

while ($row=$select->fetch(PDO::FETCH_OBJ))
{

echo"
<tr>
<td>".$row->catid."</td>
<td>".$row->category."</td>

 <td>

 <button type='submit' class='btn btn-primary'value='".$row->catid."' name='btnedit'>Edit</button>
 
 </td>

 <td>

 <button type='submit' class='btn btn-danger'value='".$row->catid."' name='btndelete'>Delete</button>

 </td>

  </tr>";

}

?>


</tbody>


<tfoot>

<thead>
<tr>
  <td>#</td>
  <td>Category</td>
  <td>Edit</td>
  <td>Delete</td>
  
</tr>

</tfoot>



</table>




</div>





                
              </div>

              </form>


              </div>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <?php



include_once"footer.php";

?>

<?php



include_once"footer.php";

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



<script>


$(document).ready( function () {
$('#table_category').DataTable();
} );

</script>