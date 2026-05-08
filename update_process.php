<?php
session_start();
include 'datab.php';

// make sure admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit_update'])) {
    // $_POST to get input
    // mysqli_real_escape_string to treat all input as text not SQL commands
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['place_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $landmarks = mysqli_real_escape_string($conn, $_POST['landmarks']);
    $activities = mysqli_real_escape_string($conn, $_POST['activities']);
    $facts = mysqli_real_escape_string($conn, $_POST['facts']);

    
    $old_data_query = mysqli_query($conn, "SELECT * FROM regions WHERE id = $id");
    $old_data = mysqli_fetch_assoc($old_data_query);

    $target_dir = "images/";

    function handleUpload($fileName, $oldName, $target_dir) {
    
        if ( !empty($_FILES[$fileName]['name']) ) { // $_FILES for multipart/form-data

            $new_name = basename($_FILES[$fileName]['name']);
            move_uploaded_file($_FILES[$fileName]['tmp_name'], $target_dir . $new_name);
            return $new_name;
        }
        return $oldName; // if no new images, use the old ones
    }

    $main_image = handleUpload('main_image', $old_data['main_image'], $target_dir);
    $g1 = handleUpload('gallery_img1', $old_data['gallery_img1'], $target_dir);
    $g2 = handleUpload('gallery_img2', $old_data['gallery_img2'], $target_dir);
    $g3 = handleUpload('gallery_img3', $old_data['gallery_img3'], $target_dir);

    $update_query = "UPDATE regions SET 
        name = '$name', 
        category = '$category', 
        description = '$description', 
        main_image = '$main_image', 
        landmarks = '$landmarks', 
        activities = '$activities', 
        facts = '$facts', 
        gallery_img1 = '$g1', 
        gallery_img2 = '$g2', 
        gallery_img3 = '$g3' 
        WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: dashboard.php?msg=updated_success");
        exit();
    } else {
        echo "خطأ في التحديث: " . mysqli_error($conn);
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
