<?php

    //connect to database
    require_once 'db-connection/db.php';

    //Select from database
    $sql = 'SELECT * FROM employees';
    $statement = $conn->prepare($sql);
    $statement->execute();
    $employees = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
  <head>
    <title>CRUD App</title>
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
                <h2>Manage Employees</h2>
                <a class="btn btn-primary my-auto" href="new-employees.php" role="button"><i class="fas fa-plus"></i> Add New Employee</a>
            </div>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($employees as $i => $employee) : ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['address']; ?></td>
                        <td><?php echo $employee['phone']; ?></td>
                        <td>
                            <a href="update-employees.php?id=<?php echo $employee['id']; ?>" class="btn btn-outline-success btn-sm">Edit</a>
                            <form style="display: inline-block;" action="delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach; ?>
                    
                </tbody>
            </table>

        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>