<?php
include 'datab.php'; 
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اكتشف السعودية - معرض المناطق</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="body-tag">

    <header>
        <div class="nav-container">
            <div class="logo">اكتشف السعودية</div>
            <nav>
                <ul>
                    <li><a href="index.php">الرئيسية</a></li>
                    <li><a href="gallery.php">معرض المناطق</a></li>
                    <li><a href="login.php">دخول المشرف</a></li>
                    <li><button id="night-mode-btn" onclick="toggleNightMode()">الوضع الليلي</button></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero-gallery">
            <div class="hero-content-gallery">
                <h1 id="welcome-heading">معرض المناطق</h1>
                <p>ابحث أو صف النتائج ثم اضغط على أي منطقة للانتقال إلى صفحة التفاصيل</p>
            </div>

            <div class="controls" >    
                
                <div class="search-container">
                        <input type="text" id="search-input" placeholder="ابحث عن منطقة او مدينة..." onkeyup="searchRegions()">
                </div>

                <div class="filter-container">
                    <select id="region-filter" onchange="filterRegions()">
                        <option value="all">كل المناطق</option>
                        <option value="الوسطى">الوسطى</option>
                        <option value="الغربية">الغربية</option>
                        <option value="الشرقية">الشرقية</option>
                        <option value="الشمالية">الشمالية</option>
                        <option value="الجنوبية">الجنوبية</option>
                    </select>
                </div>

                    <?php
                    $count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM regions"); // count regions
                    $count_data = mysqli_fetch_assoc($count_query); // turn result into php readable (list)
                    $total_regions = $count_data['total'];
                    ?>
                    <p>عدد النتائج: <span id="result-count"><?php echo $total_regions; ?></span></p>

            </div>

        </section>

        <section class="regions-container">
            <?php
            $query = "SELECT * FROM regions";
            $result = mysqli_query($conn, $query);

            if ( $result && mysqli_num_rows($result) > 0 ) {
                while( $row = mysqli_fetch_assoc($result) ) {
                    echo '<a href="details.php?id=' . $row['id'] . '" class="region-card" data-category="' . $row['category'] . '">';
                    echo '  <img src="images/' . $row['main_image'] . '" alt="' . $row['name'] . '">';
                    echo '  <div class="card-info">';
                    echo '      <span class="category">' . $row['category'] . '</span>';
                    echo '      <h3>' . $row['name'] . '</h3>';
                    echo '      <p>' . $row['description'] . '</p>';
                    echo '  </div>';
                    echo '</a>';
                }
            } else {
                echo "<p>لا توجد مناطق مضافة حالياً.</p>";
            }
            ?>

        </section>

    </main>

    <footer id="footer-tag">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
