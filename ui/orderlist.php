<?php
include_once'connectdb.php';
session_start();


if($_SESSION['useremail']==""){

  header('location:../index.php');
  
  }

include_once"header.php";


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

          <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><center>Sales</center></h5>
              </div>
              <div class="card-body">



              <table class="table table-striped table-hover"id="table_orderlist" >
<thead>
<tr>

  <td>Invoice ID</td>
  <td>Order Date</td>
  <td>Total</td>
  <td>Paid</td>
  <td>Due</td>
  <td>Payment Type</td>

<td>Sales By</td> <!-- New Header -->
<td>Action Icons</td>
 

</tr>
</thead>

<tbody>

<?php

$select = $pdo->prepare("select * from tbl_invoice order by invoice_id ASC");
$select->execute();

while ($row=$select->fetch(PDO::FETCH_OBJ))
{

  echo"
  <tr>
<td>".$row->invoice_id."</td>
<td>".$row->order_date."</td>
<td>".$row->total."</td>
<td>".$row->paid."</td>
<td>".$row->due."</td>";

if($row->payment_type =="Cash"){
  echo'<td><span class="badge badge-warning">'.$row->payment_type.'</td></span></td>';

}else if ($row->payment_type =="Card"){

  echo'<td><span class="badge badge-success">'.$row->payment_type.'</td></span></td>';

}else{

echo'<td><span class="badge badge-danger">'.$row->payment_type.'</td></span></td>';

}
echo"<td>".$row->sales_by."</td>";

echo"
<td>
<div class='btn-group'>
<a href='printbill.php?id=".$row->invoice_id."' class='btn btn-warning ' role='button'><span class='fa fa-print' style='color:#ffffff' data-toggle='tooltip' title='Print Bill'></span></a>


<a href='editorderpos.php?id=".$row->invoice_id." 'class='btn btn-success ' role='button'><span class='fa fa-eye' style='color:#ffffff' data-toggle='tooltip' title='View Order'></span></a>

 


 </div>

 </td>

  </tr>";

}
?>

</tbody>

</table>



              
              </div>
            </div>
            

            
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



include_once"footer.php";

?>



<script>
$(document).ready( function () {
$('[data-toggle="tooltip"]').tooltip();
} );

</script>




<script>
$(document).ready(function () {
  $('.btndelete').click(function() {

    var tdh = $(this);
    var id = $(this).attr('id');


    Swal.fire({
  title: "Do you really want to delete this product?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {


    $.ajax({
      url:'productdelete.php',
      type:"POST", 
      data:{
        pidd: id
      },
      success:function(data){
      tdh.parents('tr').hide();
      }

    });




    Swal.fire({
      title: "Deleted!",
      text: "Your product has been deleted.",
      icon: "success"
    });
  }
});




    

  });

});

</script>


<script>
$(document).ready( function () {
$('#table_orderlist').DataTable({

"order":[[0,"desc"]]


});
} );

</script>
