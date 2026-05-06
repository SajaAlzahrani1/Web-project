<?php 
// Linking the logic file
include 'dashboard_process.php'; 
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - اكتشف السعودية</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo">لوحة تحكم المشرف</div>
        <nav>
            <ul>
                <li><button id="night-mode-btn" onclick="toggleNightMode()">الوضع الليلي</button></li>
                <li><a href="logout.php" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')" class="btn-logout">تسجيل الخروج</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="dashboard-main">

   

    <div class="dashboard-container">
        <h2>إدارة المحتوى</h2>
        <p>استخدم هذه الصفحة لإدارة محتوى الموقع من خلال عرض السجلات وإضافة أو تعديل أو حذف المحتوى</p>
         
        <a href="add.php" class="btn-add"> إضافة محتوى جديد</a>

        <?php if($message != ""): ?>
             <div class="success-msg">               
                <?php echo $message; ?>
             </div>
        <?php endif; ?>


        <div class="table-responsive">
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
                    <?php 
                    // Check if there are results to display
                    if ($result && mysqli_num_rows($result) > 0): 
                        while($row = mysqli_fetch_assoc($result)): 
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><strong><?php echo $row['name']; ?></strong></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td class="actions-cell">
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-edit">تعديل</a>
                            
                            <a href="dashboard.php?delete=<?php echo $row['id']; ?>" 
                               class="btn-delete"
                               onclick="return confirm('هل أنت متأكد من حذف هذا السجل نهائياً؟')">حذف</a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else: 
                    ?>
                    <tr>
                        <td colspan="5" style="text-align:center; padding: 20px;">لا توجد بيانات حالياً. اضغط على "إضافة محتوى" للبدء.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer id="footer-tag">
    <p>© اكتشف السعودية - جامعة الملك سعود</p>
</footer>

<script src="script.js"></script>
</body>
</html>