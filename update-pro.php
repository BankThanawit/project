<?php
@include 'update-pro-con.php';
$id = $_GET['edit'];

if (isset($_POST['update_product'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_stype = $_POST['product_stype'];
   $product_image = $_FILES['imags']['name'];
   $product_image_tmp_name = $_FILES['imags']['tmp_name'];
   $product_image_folder = 'images/' . $product_image;
   if (empty($product_name) || empty($product_price) || empty($product_stype) || empty($product_image)) {
      $message[] = 'please fill out all';
   } else {

      $update = "UPDATE product SET product_name='$product_name', product_price='$product_price', product_stype='$product_stype',
        imags='$product_image'  WHERE product_id = $id";
      $upload = mysqli_query($conn, $update);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:edit-pro.php');
      } else {
         $$message[] = 'please fill out all!';
      }

   }
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Updateproduct
   </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/style-add.css">
</head>

<body>
   <div class="container" style="justify-content:center;padding-top:200px;padding-bottom:200px;height:100vh;">
      <div class="admin-product-form-container">
         <?php
         $select = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {
            ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3>Update product</h3>
               <input type="text" placeholder="enter product name" value="<?php echo $row['product_name']; ?>"
                  name="product_name" class="box">
               <input type="number" placeholder="enter product price" value="<?php echo $row['product_price']; ?>"
                  name="product_price" class="box">
               <input type="text" placeholder="enter product explain" value="<?php echo $row['product_stype']; ?>"
                  name="product_stype" class="box">
               <input type="file" accept="image/png, image/jpeg, image/jpg" name="imags" class="box">
               <input type="submit" class="btn" name="update_product" value="update product">
               <a href="edit-pro.php" class="btn">Back</a>
            </form>
            <?php
         }
         ;
         ?>
      </div>
   </div>

</body>

</html>