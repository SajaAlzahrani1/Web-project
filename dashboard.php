<?php
session_start();
include 'datab.php';

// Protect page - only admin can access
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$message = "";

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $query = "DELETE FROM regions WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $message = "تم حذف السجل بنجاح";
    }
}

// Get all regions from database
$result = mysqli_query($conn, "SELECT * FROM regions");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo">لوحة تحكم المشرف</div>
        <nav>
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><button id="night-mode-btn" onclick="toggleNightMode()">الوضع الليلي</button></li>
                <li><a href="logout.php" class="btn-logout">تسجيل الخروج</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="dashboard-main">

    <?php if($message != ""): ?>
        <div class="success-msg"><?php echo $message; ?></div>
    <?php endif; ?>

    <div class="dashboard-container">
        <h2>إدارة المحتوى</h2>
        <p>استخدم هذه الصفحة لإدارة محتوى الموقع من خلال عرض السجلات وإضافة أو تعديل أو حذف المحتوى</p>

        <a href="add.php" class="btn-add">إضافة محتوى جديد</a>

        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>المنطقة</th>
                    <th>التصنيف</th>
                    <th>الوصف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-edit">تعديل</a>
                        <a href="dashboard.php?delete=<?php echo $row['id']; ?>" 
                           class="btn-delete"
                           onclick="return confirm('هل تريد حذف هذا السجل؟')">حذف</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<footer id="footer-tag">
    <p>© اكتشف السعودية - جامعة الملك سعود</p>
</footer>

<script src="script.js"></script>
</body>
</html>