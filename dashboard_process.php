<?php
// PHP (admin) - Start session and protect the page
session_start();

// Sessions - Check if admin is logged in (Requirement)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'datab.php';

// Initialize variables to avoid "Undefined variable" errors
$message = "";
$result = null;

// PHP (admin) - Handle Delete logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete_query = "DELETE FROM regions WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        // Redirect after delete to refresh page and show message
        header("Location: dashboard.php?msg=deleted");
        exit();
    }
}

// PHP (admin) - Retrieve data from database to display in dashboard
$result = mysqli_query($conn, "SELECT * FROM regions ORDER BY id DESC");

// Handle success messages from URL parameters
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'added_success') {
        $message = "✅ تم إضافة السجل بنجاح إلى قاعدة البيانات!";
    } elseif ($_GET['msg'] == 'updated_success') {
        $message = " تم تحديث البيانات بنجاح!";
    } elseif ($_GET['msg'] == 'deleted') {
        $message = " تم حذف السجل بنجاح!";
    }
}
?>