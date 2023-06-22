<?php

$item_name = "";
$item_price = "";

$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['add'])) {
  echo "connect";
  $item_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $item_price = mysqli_real_escape_string($db, $_POST['price']);
  $quant = mysqli_real_escape_string($db, $_POST['quant']);

  $query = "INSERT INTO product (product_name,price,quantity) 
  			  VALUES('$item_name','$item_price','$quant')";
  if (mysqli_query($db, $query)) {
    echo "<script>alert('Successfully stored');</script>";

  } else {
    echo "<script>alert('Somthing wrong!!!');</script>";
  }

  require('./table.php');

}
?>