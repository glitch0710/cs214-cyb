<?php

include "connection.php";

if (isset($_GET['q'])){
    $sql = "SELECT * FROM categories WHERE CategoryName LIKE ?";
    $stmt = $conn->prepare($sql);
    $search = '%'.$_GET['q'].'%';
    $stmt->bind_param("s", $search);
}else{
    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
}


$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <form action="" method="GET">
        <label for="q">Search: </label>
        <input type="text" name="q" id="q" />
        <button type="submit">Search</button>
    </form>
    <br><br>
    <table border="1">
        <thead>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Description</th>
        </thead>
        <tbody>
            <?php
                $result = $stmt->get_result();
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['CategoryID']."</td>";
                        echo "<td>".$row['CategoryName']."</td>";
                        echo "<td>".$row['Description']."</td>";
                        echo "</td>";
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Go back</a>
    <?php
        $stmt->close(); 
    ?>
</body>
</html>