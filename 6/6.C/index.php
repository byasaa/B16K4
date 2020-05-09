<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .shadow{
            box-shadow: 3px 3px 2px rgba(0,0,0,0.4);
            padding: 10px;
        }
        .fa-edit{
            color:green;
        }
        .fa-trash{
            color:red;
        }
    </style>
    <title>Arkademy Android Developer Test</title>
</head>
<body>
    <nav class="navbar navbar-light-bg-light border-bottom shadow">
        <a href="#" class="navbar-brand">
            <img src="img/logo.png" alt="logo" height="40" class="d-inline-block align-top">
        </a>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formAdd">
            Add
          </button>  
    </nav>
    <div class="container">
        <table class="table mt-5 shadow">
            <thead class="bg-warning">
                <tr>
                    <td>No</td>
                    <td>Cashier</td>
                    <td>Product</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    $data = $conn->query('SELECT product.id as id, cashier.name as cashier, product.name as product, category.name as category, product.price FROM product INNER JOIN category ON product.id_category = category.id INNER JOIN cashier ON product.id_cashier = cashier.id');
                    foreach ($data as $item) {
                ?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $item['cashier'];?></td>
                    <td><?php echo $item['product'];?></td>
                    <td><?php echo $item['category'];?></td>
                    <td><?php echo idr_format($item['price']);?></td>
                    <td>
                        <button class="btn btn-link" data-toggle="modal" data-target="#formEdit" ><span class="fa fa-fw fa-edit"></span></button>
                        <button class="btn btn-link" data-toggle="modal" data-target="#formHapus" ><span class="fa fa-fw fa-trash"></span></button>
                    </td>
                </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>
    
	<div id="formAdd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                    <h4>Add</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
                <form action="./" method="POST">
                    <div class="form-group">
                        <select name="cashier" id="cashir" class="form-control">
                           <?php 
                           $data = $conn->query('SELECT * FROM cashier');
                           foreach($data as $item){
                            ?>
                            <option value="<?= $item['id'];?>"><?= $item['name'];?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                        <?php 
                           $data = $conn->query('SELECT * FROM category');
                           foreach($data as $item){
                            ?>
                            <option value="<?= $item['id'];?>"><?= $item['name'];?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="product" id="product" class="form-control" placeholder="Masukan Product">
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" id="price" class="form-control" placeholder="Masukan Harga">
                    </div>
                    <button type="submit"name="add" class="btn btn-warning" style="float: right;">Add</button>
                </form>    
				</div>
			</div>
		</div>
    </div>
    <?php 
        if (isset($_POST['add'])) {
            $product = $_POST['product'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $cashier = $_POST['cashier'];

            $data = $conn->query("INSERT INTO product VALUES(null,'$product','$price','$category','$cashier')");
            if ($data) {
                return true;
            }else{
                echo 'ERROR : '.$conn->error;
            }
        }
    ?>
    <div id="formEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="./" method="POST">
                        <div class="form-group">
                            <select name="cashier" id="cashir" class="form-control">
                                <option value="1">Pevita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option value="1">Food</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="product" id="product" class="form-control" placeholder="Masukan Product">
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" id="price" class="form-control" placeholder="Masukan Harga">
                        </div>
                        <button type="submit" class="btn btn-warning" style="float: right;">Add</button>
                    </form>    
                    </div>
            </div>
        </div>
    </div>
    <div id="formHapus" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body mx-auto">
                    <h3>Data Pevita</h3>
                    <div class="pl-4 pb-2">
                        <img src="img/checklist.png" width="110" height="110" alt="Success">
                    </div>
                    <h4>Berhasil Dihapus</h4>
				</div>
			</div>
		</div>
    </div>
</body>
</html>