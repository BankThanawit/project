<?php
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_stype = $_POST['product_stype'];
$product_image = $_FILES['imags']['name'];
$product_image_tmp_name = $_FILES['imags']['tmp_name'];
$product_image_folder = 'images/' . $product_image;

$conn = new mysqli('localhost', 'root', '', 'mnp');
if (empty($product_name) || empty($product_price) || empty($product_stype) || empty($product_image)) {
   $message[] = 'please fill out all';
} else {
   $insert = "INSERT INTO product(product_name, product_price, product_stype, imags) VALUES('$product_name', '$product_price', '$product_stype', '$product_image')";
   $upload = mysqli_query($conn, $insert);
   if ($upload) {
      move_uploaded_file($product_image_tmp_name, $product_image_folder);
      echo '<script>alert("new product added successfully");
                window.location.href = "http://localhost/mini/edit-pro.php"
                </script>';
   } else {
      echo '<script>alert("could not add the product");
                window.location.href = "http://localhost/mini/add-product.html"
                </script>';
   }
}
?>