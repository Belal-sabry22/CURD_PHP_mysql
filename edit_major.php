<?php
include "./connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "No ID provided";
    exit;
}
// Retrieve the major data from the database
$retrieveQuery = "SELECT * FROM major WHERE id = '$id'";
$result = $conn->query($retrieveQuery);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if there are any results
if ($result->num_rows == 0) {
    echo "No results found";
    exit;
}

// Fetch the major data
$row = $result->fetch_assoc();

// Create the editing form
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
    <h2>Edit Major</h2><form method="post">
    <div class="form-group">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="price" name="price" value="<?= $row['price']?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="students" class="col-sm-2 col-form-label">Students</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="students" name="students" value="<?= $row['students']?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 text-left">
            <button type="submit" class="btn btn-primary btnUpdate mt-4" name="btnUpdate">Update</button>
        </div>
    </div>
</form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $students = $_POST['students'];

    $updateQuery = "UPDATE major SET name = ?, price = ?, students = ? WHERE id = '$id'";
    $execute = $conn->prepare($updateQuery);
    $execute->bind_param("sss", $name, $price, $students);
    $executeResult = $execute->execute();

    if (!$executeResult) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: major.php');
        exit;
    }
}
?>