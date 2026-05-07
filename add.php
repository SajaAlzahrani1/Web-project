
<?php
session_start();
include 'datab.php';

// make sure admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>إضافة مكان جديد</title>
   
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

    <main class="add-main">
        <nav class="breadcrumb">
           <a href="dashboard.php">لوحة التحكم</a>
           <span> &gt; </span> <span>إضافة مكان جديد</span>
        </nav>

        <div class="admin-container">
            <h2>إضافة مكان جديد</h2>
            <form name="addForm" action="add_process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label>* اسم المكان:</label>
                <input type="text" name="place_name" placeholder="مثال: رجال ألمع" required>

                <label>* الصورة الرئيسية:</label>
                <input type="file" name="main_image" required>

                <label>* الوصف:</label>
                <textarea name="description" placeholder="اكتب وصفا تفصيليا..." rows="2" required></textarea>

                <label>* المنطقة:</label>
                <select name="category" required id="category-select">
                    <option value="">اختر المنطقة...</option>
                    <option value="الوسطى">المنطقة الوسطى</option>
                    <option value="الغربية">المنطقة الغربية</option>
                    <option value="الشرقية">المنطقة الشرقية</option>
                    <option value="الشمالية">المنطقة الشمالية</option>
                    <option value="الجنوبية">المنطقة الجنوبية</option>
                </select>

                <label>* الأنشطة (افصل بينهم بفاصلة):</label>
                <input type="text" name="activities" placeholder="مثال: تخييم، تسلق جبال، تصوير" required>

                <label>* المعالم (افصل بينهم بفاصلة):</label>
                <input type="text" name="landmarks" placeholder="آثار، متاحف..." required>

                <label>* حقائق (افصل بينهم بفاصلة):</label>
                <textarea name="facts" placeholder="حقائق سريعة عن المكان..." rows="3" required></textarea>

                <hr>
                <h3>صور المعرض</h3>
                <label>الصورة *1</label>
                <input type="file" name="gallery_img1" required>
                <label>الصورة 2 (اختياري)</label>
                <input type="file" name="gallery_img2" > 
                <label>الصورة 3 (اختياري)</label>
                <input type="file" name="gallery_img3"> 

                <button type="submit" name="submit_add" class="btn-main">حفظ في قاعدة البيانات</button>
            </form>
        </div>
    </main>
    <script src="script.js"></script>

</body>
</html>
