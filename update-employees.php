<?php

    //connect to database
    require_once 'db-connection/db.php';

    $id = $_GET['id'] ?? null;

    if(!$id){
        header('Location: index.php');
        exit;
    }

    //Select from database
    $sql = 'SELECT * FROM employees WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $employee = $statement->fetch(PDO::FETCH_ASSOC);


    $name = $employee['name'];
    $email = $employee['email'];
    $address = $employee['address'];
    $phone = $employee['phone'];

    //Update database
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $name = $_POST['name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];

      $sql = 'UPDATE employees SET name = :name, email = :email, address = :address, phone = :phone WHERE id = :id';
      $statement = $conn->prepare($sql);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':address', $address);
      $statement->bindValue(':phone', $phone);
      $statement->bindValue(':id', $id);
      $statement->execute();
      
      header('Location: index.php');

    }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>CRUD App | Add Employees</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    

    <div class="mytable mt-5">
        <div class="container">
            
            <div class="header mb-4 p-3">
                <h2>Update Details</h2>
                <a class="btn btn-primary my-auto" href="index.php" role="button"><i class="fas fa-home"></i> Home</a>
            </div>

            <div class="employee-form p-5 shadow">

                <form action="" method="POST">
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary submit-button">Update</button>
                </form>

            </div>

            

        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>