<?php 

// connect to database
$host = "localhost";
$user = "root";
$password = "";
$dbName = "shop";
$conn = mysqli_connect($host, $user, $password, $dbName);

//============ CRUD operation (INSERT) ====================//

if(isset($_POST["send"])){
    $name = $_POST["name"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $insert = "INSERT INTO `products` VALUES (NULL, '$name', '$category', $price)";
    $i = mysqli_query($conn, $insert);
}

//============ CRUD operation (READ) ====================//

$select = "SELECT * FROM `products`";
$s = mysqli_query($conn, $select);

//============ CRUD operation (DELETE) ====================//

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $delete = "DELETE FROM `products` WHERE id = $id";
    $d = mysqli_query($conn, $delete);
}

//============ CRUD operation (UPDATE) ====================//

if(isset($_GET["edit"])){
    $id = $_GET["edit"];
    if(isset($_POST["update"])){
        $name = $_POST["name"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $update = "UPDATE `products` SET name = '$name', category =  '$category', price =  $price WHERE id = $id";
        $u = mysqli_query($conn, $update);
    }
}


















?>



<!--html structure-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD operation Task</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center text-info">CRUD Operation</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input name="category" type="text" placeholder="Category" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price" type="text" placeholder="Price" class="form-control">
                    </div>
                    <button name="send" class="btn btn-info my-3 w-100">Send Data</button>
                    <button name="update" class="btn btn-primary my-3 w-100">Update Data</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container col-6 mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($s as $data){?>
                        <tr>
                            <td><?php echo $data["id"] ?></td>
                            <td><?php echo $data["name"] ?></td>
                            <td><?php echo $data["category"] ?></td>
                            <td><?php echo $data["price"] ?></td>
                            <td><a href="index.php?edit=<?php echo $data["id"] ?>" class="btn btn-info">Edit</a>
                                <a href="index.php?delete=<?php echo $data["id"] ?>" class="btn btn-danger">Delete</a>    
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>