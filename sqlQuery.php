<?php
include "./connection.php";
// // retrieve data
// $retrieveQuery = "SELECT * FROM major";
// $result = $conn->query($retrieveQuery);
// if (!$result) {
//     die("Query failed: " . mysqli_error($conn));
// }

// insert data
if (isset($_POST['btnAdd'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $students = $_POST['students'];

    $insertQuery = "INSERT INTO major (name, price, students) VALUES (?,?,?)";
    $execute = $conn->prepare($insertQuery);
    $execute->bind_param("sss", $name, $price, $students);
    $executeResult = $execute->execute();
    if (!$executeResult) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// delete data
if (isset($_POST['btnDelete'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM major WHERE id =?";
    $execute = $conn->prepare($deleteQuery);
    $execute->bind_param("i", $id);
    $executeResult = $execute->execute();

    if (!$executeResult) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Search data
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $searchQuery = "SELECT * FROM `major` WHERE CONCAT(`id`, `name`, `price`, `students`) LIKE '%" . $valueToSearch . "%'";
    $search_result = $conn->query($searchQuery);
} else {
    // retrieve data
    $searchQuery = "SELECT * FROM `major`";
    $search_result = $conn->query($searchQuery);
}
// update data

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
