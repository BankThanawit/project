<?php
@include 'edit-pro-con.php';

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM product WHERE product_id = $id");
	header('location:edit-pro.php');
}
;
?>

<?php
$select = mysqli_query($conn, "SELECT * FROM product");
?>


<!doctype html>
<html lang="en">

<head>
	<title>ADD PRODUCT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style-edit.css">

</head>

<body>
	<section class="ftco-section" style="padding-top:50px;padding-button:50px;height:80vh;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<form action="edit-pro-con.php" method="post">
							<table class="table">
								<thead class="thead-primary">
									<tr>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th>Product</th>
										<th>Price</th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<?php while ($row = mysqli_fetch_assoc($select)) {
									?>
									<tbody>
										<tr class="alert" role="alert">
											<td>
												<label>

												</label>
											</td>
											<td>
												<div class="img">
													<img width="100px" ; src="images/<?php echo $row['imags'] ?>" alt="">
												</div>
											</td>
											<td>
												<div class="email">
													<span>
														<?php echo $row['product_name'] ?>
													</span>
													<span>
														<?php echo $row['product_stype'] ?>
													</span>
												</div>
											</td>
											<td>$
												<?php echo $row['product_price'] ?>
											</td>
											<td>
											</td>
											<td>
												<a href='shop.php'><input type="button"
														style="border-radius: 5px; width: 150px; height:100; color: white; font: size 20px; background-color: #FF4500; border: solid 2px #FF4500"
														value="Buy"></a>
											</td>
										</tr>

									</tbody>

								<?php }
								;
								?>
							</table>
						</form>
					</div>
					<a href="add-porduct.html"><input type="button" class="btn" name="add_product"
							value="add product"></a>
				</div>
			</div>
		</div>

	</section>
</body>

</html>