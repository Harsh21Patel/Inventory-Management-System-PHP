<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid mb-4 text-center shadow-lg p-3 mb-3 bg-body rounded">
        <img src="./assets/images/logo2.png" class="img-fluid" alt="">
    </div>

    <div class="container">
        <h2 class="text-center">Add Item Here</h2>

        <body>
            <form method="POST" class="form-inline" action="additem.php">
                <div class="form-group ms-3 mt-3">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="product_name">
                </div>
                <div class="form-group ms-3 mt-3">
                    <label for="name">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group ms-3 mt-3">
                    <label for="name">Quantity</label>
                    <input type="number" class="form-control" name="quant" id="quant" min="1" max="">
                </div>
                <button type="submit" class="btn btn-primary ms-3 mt-3" name="add">Add item</button>
            </form>
        </body>

        <div class="container-fluid mt-4">
            <table class="table text-dark text-center table-striped table-hover table-bordered">
                <thead class="text-uppercase">
                    <tr class="table-active table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "inventorymanagement");
                    $sql = "SELECT * FROM product";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) 
                        {
                            $count = $count + 1;
                    ?>
                    <tr>
                        <th>
                            <?php echo $count ?>
                        </th>
                        <th>
                            <?php echo $row["product_name"] ?>
                        </th>
                        <th>
                            <?php echo $row["price"] ?>
                        </th>
                        <th>
                            <?php echo $row["quantity"] ?>
                        </th>
                        <th> 
                            <a href="up" Edit</a><a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                            <a href="up" Edit</a><a href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a>
                                </th>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>