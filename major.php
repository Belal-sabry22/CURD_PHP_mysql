<?php
include "./connection.php";
include "./sqlQuery.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Database Practice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Majors database</h2>
        <!-- Search Form -->
        <form class="mb-4" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for major" name="valueToSearch">


                <button class="btn btn-outline-secondary" type="submit" name="search" value="Filter">Search</button>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Students</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($search_result)) { ?>
                    <tr>

                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['students'] ?></td>
                        <td> <a href="./edit_major.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm btnEdit">Edit</a>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm btnDelete" name="btnDelete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form method="post">
            <h2>Add New User</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="students">Students</label>
                <input type="text" class="form-control" id="students" name="students" required>
            </div>
            <button type="submit" class="btn btn-primary btnAdd mt-2" name="btnAdd">Add User</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>