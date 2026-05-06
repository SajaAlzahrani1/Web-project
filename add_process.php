<?php
session_start();

include 'datab.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Check if the form was submitted
if (isset($_POST['submit_add'])) {
    
    // 1. Sanitize and collect text data to prevent SQL Injection
    $name        = mysqli_real_escape_string($conn, $_POST['place_name']);
    $category    = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $landmarks   = mysqli_real_escape_string($conn, $_POST['landmarks']);
    $activities  = mysqli_real_escape_string($conn, $_POST['activities']);
    $facts       = mysqli_real_escape_string($conn, $_POST['facts']);

    // 2. Define the upload directory
    $target_dir = "images/";
    // 3. Handle Main Image Upload
    $main_image = $_FILES['main_image']['name'];
    $main_target = $target_dir . basename($main_image);
    move_uploaded_file($_FILES['main_image']['tmp_name'], $main_target);

    // 4. Handle Gallery Images Upload (Checking if they exist)
    $g1 = $_FILES['gallery_img1']['name'];
    move_uploaded_file($_FILES['gallery_img1']['tmp_name'], $target_dir . $g1);

    $g2 = !empty($_FILES['gallery_img2']['name']) ? $_FILES['gallery_img2']['name'] : "";
    if ($g2) {
        move_uploaded_file($_FILES['gallery_img2']['tmp_name'], $target_dir . $g2);
    }

    $g3 = !empty($_FILES['gallery_img3']['name']) ? $_FILES['gallery_img3']['name'] : "";
    if ($g3) {
        move_uploaded_file($_FILES['gallery_img3']['tmp_name'], $target_dir . $g3);
    }

    // 5. Prepare SQL Query (Make sure column names match your DB exactly)
    $query = "INSERT INTO regions (name, category, description, main_image, landmarks, activities, facts, gallery_img1, gallery_img2, gallery_img3) 
              VALUES ('$name', '$category', '$description', '$main_image', '$landmarks', '$activities', '$facts', '$g1', '$g2', '$g3')";

    // 6. Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?msg=added_success");
        exit();
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    header("Location: add.php");
    exit();
}
?>