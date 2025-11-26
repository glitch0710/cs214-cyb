<?php

include "connection.php";

if (isset($_POST['submitdata'])){
    $categoryname = $_POST['categoryname'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO categories (CategoryName, Description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false){
        die("Error preparing the statements: " . $conn->error);
    }

    $stmt->bind_param("ss", $categoryname, $desc);

    if ($stmt->execute()){
        echo "<script type='text/javascript'>alert('New category created successfully!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!');</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form action="" method="POST">
        <label for="categoryname">Category Name: </label><br>
        <input type="text" name="categoryname" id="categoryname" />
        <br><br>
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="3"></textarea>
        <br><br>
        <button type="submit" name="submitdata">Save</button>
        <a href="categories.php">Cancel</a>
    </form>
</body>
</html>