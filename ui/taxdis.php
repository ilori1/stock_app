<?php
include_once 'connectdb.php';
session_start();
include_once "header.php";

if(isset($_POST['btnsave'])){
    $sgst = $_POST['txtsgst'];
    $cgst = $_POST['txtcgst'];
    $discount = $_POST['txtdiscount'];

    if(empty($sgst)){
        $insert = $pdo->prepare("INSERT INTO tbl_taxdis (sgst, cgst, discount) VALUES (:sgst, :cgst, :discount)");
        $insert->bindParam(':sgst', $sgst);
        $insert->bindParam(':cgst', $cgst);
        $insert->bindParam(':discount', $discount);
        if($insert->execute()){
            $_SESSION['status'] = "Tax and Discount Added Successfully";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Failed";
            $_SESSION['status_code'] = "danger";
        }
    } else {
     
        $_SESSION['status'] = "Field is Empty";
        $_SESSION['status_code'] = "warning";

        if($insert->execute()){
            $_SESSION['status'] = "Tax and Discount Added Successfully";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Failed";
            $_SESSION['status_code'] = "danger";
        }
    }
}

if(isset($_POST['btnupdate'])){
    $sgst = $_POST['txtsgst'];
    $cgst = $_POST['txtcgst'];
    $discount = $_POST['txtdiscount'];
    $id = $_POST['txtdis_id'];

    if(empty($sgst)){
        $_SESSION['status'] = "Field is Empty";
        $_SESSION['status_code'] = "warning";
    } else {
        $update = $pdo->prepare("UPDATE tbl_taxdis SET sgst=:sgst, cgst=:cgst, discount=:discount WHERE taxdis_id=:id");
        $update->bindParam(':sgst', $sgst);
        $update->bindParam(':cgst', $cgst);
        $update->bindParam(':discount', $discount);
        $update->bindParam(':id', $id);

        if($update->execute()){
            $_SESSION['status'] = "Tax And Discount Updated Successfully";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Failed";
            $_SESSION['status_code'] = "danger";
        }
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">TAX AND DISCOUNT</h1>
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

            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h5 class="m-0">TAX AND DISCOUNT FORM </h5>
                </div>

                <form action="" method="post">
                    <div class="card-body">
                        <div class="row">

                            <?php
                            if(isset($_POST['btnedit'])){
                                $select = $pdo->prepare("SELECT * FROM tbl_taxdis WHERE taxdis_id =".$_POST['btnedit']);
                                $select->execute();
                                if($select){
                                    $row = $select->fetch(PDO::FETCH_OBJ);

                                    echo '<div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="Enter Category" value="'.$row->taxdis_id.'" name="txtdis_id">
                                            <div class="form-group">
                                                <label for="ExampleInputEmail">SGST(%)</label>
                                                <input type="text" class="form-control" placeholder="Enter SGST" value="'.$row->sgst.'" name="txtsgst">
                                            </div>
                                            <div class="form-group">
                                                <label for="ExampleInputEmail">CGST(%)</label>
                                                <input type="text" class="form-control" placeholder="Enter CGST" value="'.$row->cgst.'" name="txtcgst">
                                            </div>
                                            <div class="form-group">
                                                <label for="ExampleInputEmail">Discount(%)</label>
                                                <input type="text" class="form-control" placeholder="Enter Discount" value="'.$row->discount.'" name="txtdiscount">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info" name="btnupdate">Update</button>
                                        </div>
                                    </div>';
                                }
                            } else {
                                echo '<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ExampleInputEmail">SGST(%)</label>
                                            <input type="text" class="form-control" placeholder="Enter SGST" name="txtsgst">
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputEmail">CGST(%)</label>
                                            <input type="text" class="form-control" placeholder="Enter CGST" name="txtcgst">
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputEmail">Discount(%)</label>
                                            <input type="text" class="form-control" placeholder="Enter Discount" name="txtdiscount">
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
                                        </div>
                                    </div>';
                            }
                            ?>

                            <div class="col-md-8">
                                <table id="table_tax" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>SGST</td>
                                        <td>CGST</td>
                                        <td>Discount</td>
                                        <td>Edit</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $select = $pdo->prepare("SELECT * FROM tbl_taxdis ORDER BY taxdis_id ASC");
                                    $select->execute();
                                    while ($row = $select->fetch(PDO::FETCH_OBJ)){
                                        echo "<tr>
                                                <td>".$row->taxdis_id."</td>
                                                <td>".$row->sgst."</td>
                                                <td>".$row->cgst."</td>
                                                <td>".$row->discount."</td>
                                                <td>
                                                    <button type='submit' class='btn btn-primary' value='".$row->taxdis_id."' name='btnedit'>Edit</button>
                                                </td>
                                            </tr>";
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>SGST</td>
                                        <td>CGST</td>
                                        <td>Discount</td>
                                        <td>Edit</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>

<?php
if(isset($_SESSION['status']) && $_SESSION['status']!=''){
    echo '<script>
                swal.fire({
                    icon: "'.$_SESSION['status_code'].'",
                    title: "'.$_SESSION['status'].'"
                });
            </script>';
    unset($_SESSION['status']);
}
?>

<script>
    $(document).ready(function() {
        $('#table_tax').DataTable();
    });
</script>
