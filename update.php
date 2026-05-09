<?php
session_start();
include 'datab.php';

// make sure admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// make sure there is an ID for the selected region
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);
$query = "SELECT * FROM regions WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>تحديث المحتوى - <?php echo $row['name']; ?></title>
   
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="logo">لوحة المشرف</div>
           <nav>
            <ul>
                <li><button id="night-mode-btn" onclick="toggleNightMode()">الوضع الليلي</button></li>
                <li><a href="logout.php" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')" class="btn-logout">تسجيل الخروج</a></li>
            </ul>
           </nav>
        </div>
    </header>

    <main class="update-main">
        <nav class="breadcrumb">
           <a href="dashboard.php">لوحة التحكم</a>
           <span> &gt; </span> 
           <span>تحديث مكان</span>
           <span> &gt; </span> 
           <span><?php echo $row['name']; ?></span>

        </nav>
        
        <div class="admin-container update-layout" style="display: flex; gap: 30px;">
            <div class="current-info" style="flex: 1; padding: 20px; border-radius: 10px;">
                <h3>المكان المحدد للتحديث</h3>
                <p><strong>اسم المكان:</strong></p>
                <h2 style="margin-top: 0;"><?php echo $row['name']; ?></h2>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                    
                    <a href="details.php?id=<?php echo $row['id']; ?>" 
                       target="_blank" 
                       class="btn-main" 
                       style="padding: 6px 12px; font-size: 14px; margin-top: 0; width: auto;">عرض الصفحة</a>

                    <a href="dashboard.php?delete=<?php echo $row['id']; ?>" 
                       class="btn-delete"  
                       onclick="return confirm('هل أنت متأكد من حذف هذا السجل نهائياً؟')">حذف المكان</a>

                </div>



                <label style="text-align: right;">الصورة الرئيسية الحالية:</label>
                <img src="images/<?php echo $row['main_image']; ?>" style="width: 100%; border-radius: 8px; margin-bottom: 15px;">
                
                <label style="text-align: right; display: block;">صور المعرض الحالية:</label>
                <div style="display: flex; gap: 5px;">
                    <?php if($row['gallery_img1']) echo "<img src='images/{$row['gallery_img1']}' style='width: 32%; border-radius: 4px; object-fit: cover; height: 80px;'>"; ?>
                    <?php if($row['gallery_img2']) echo "<img src='images/{$row['gallery_img2']}' style='width: 32%; border-radius: 4px; object-fit: cover; height: 80px;'>"; ?>
                    <?php if($row['gallery_img3']) echo "<img src='images/{$row['gallery_img3']}' style='width: 32%; border-radius: 4px; object-fit: cover; height: 80px;'>"; ?>
                </div>
            </div>

            <div class="form-section" style="flex: 2;">
                <h2>تعديل البيانات</h2>
                <form action="update_process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label>اسم المكان:</label>
                    <input type="text" name="place_name" value="<?php echo $row['name']; ?>" required>

                    <label>المنطقة:</label>
                    <select name="category" required>
                        <option value="الوسطى" <?php if($row['category'] == 'الوسطى') echo 'selected'; ?>>المنطقة الوسطى</option>
                        <option value="الغربية" <?php if($row['category'] == 'الغربية') echo 'selected'; ?>>المنطقة الغربية</option>
                        <option value="الشرقية" <?php if($row['category'] == 'الشرقية') echo 'selected'; ?>>المنطقة الشرقية</option>
                        <option value="الشمالية" <?php if($row['category'] == 'الشمالية') echo 'selected'; ?>>المنطقة الشمالية</option>
                        <option value="الجنوبية" <?php if($row['category'] == 'الجنوبية') echo 'selected'; ?>>المنطقة الجنوبية</option>
                    </select>

                    <label>الوصف المختصر:</label>
                    <textarea name="description" rows="2" required><?php echo $row['description']; ?></textarea>

                    
                    <label>المعالم (افصل بينهم بفاصلة):</label>
                    <input type="text" name="landmarks" value="<?php echo $row['landmarks']; ?>" required>

                    <label>حقائق سريعة:</label>
                    <textarea name="fun_facts" rows="3" required><?php echo $row['fun_facts']; ?></textarea>

                    <hr>
                    <h3>تحديث الصور (اتركها فارغة للاحتفاظ بالصور القديمة)</h3>
                    
                    <label>تغيير الصورة الرئيسية:</label>
                    <input type="file" name="main_image">

                    <label>تحديث صور المعرض:</label>
                    <input type="file" name="gallery_img1">
                    <input type="file" name="gallery_img2">
                    <input type="file" name="gallery_img3">

                    <button type="submit" name="submit_update" class="btn-main">حفظ التعديلات</button>
                </form>
            </div>
        </div>

    </main>

    <footer id="footer-tag">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>
    <script src="script.js"></script>

</body>
</html>
