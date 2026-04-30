<?php
include 'datab.php';

// check if an ID is in the URL If not go back to the gallery
if ( !isset($_GET['id']) || empty($_GET['id']) ) {
    header("Location: gallery.php");
    exit();
}

$region_id = intval($_GET['id']);

$query = "SELECT * FROM regions WHERE id = $region_id";
$result = mysqli_query($conn, $query);

// check if the region exists in the database
if ( mysqli_num_rows($result) > 0 ) {
    $region = mysqli_fetch_assoc($result);
} else {
    echo "<h2 style='text-align:center; margin-top:50px;'>المنطقة غير موجودة.</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اكتشف السعودية - <?php echo htmlspecialchars($region['name']); ?></title>
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

    <main class="details-page-main">
        <article class="details-card-large">
            
            <img src="images/<?php echo $region['main_image']; ?>" 
                alt="<?php echo $region['name']; ?>"
                class="details-main-img">
            
            <div class="details-card-content">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h1 style="color: var(--primary-green); font-size: 2.5rem; margin: 0;">
                        <?php echo $region['name']; ?></h1>
                    <span class="category-badge">
                        <?php echo $region['category']; ?>
                    </span>
                </div>
                
                <p class="details-description"><?php echo $region['details']; ?></p>

                <div class="info-grid">
                    <!-- Fun Facts -->
                    <div class="info-column">
                        <h3 class="info-title">معلومات سريعة</h3>
                        <ul>
                            <?php 
                            if (!empty($region['fun_facts'])) {
                                $facts_array = explode(',', $region['fun_facts']);
                                foreach ($facts_array as $fact) {
                                    echo "<li>" . trim($fact) . "</li>";
                                }
                            } else {
                                echo "<li>لا توجد معلومات مضافة حالياً.</li>";
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Landmarks Section -->
                    <div class="info-column">
                        <h3 class="info-title">أبرز المعالم</h3>
                        <ul>
                            <?php 
                            if (!empty($region['landmarks'])) {
                                $landmarks_array = explode(',', $region['landmarks']);
                                foreach ($landmarks_array as $landmark) {
                                    echo "<li>" . trim($landmark) . "</li>";
                                }
                            } else {
                                echo "<li>لا توجد معالم مضافة حالياً.</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <!-- Image Gallery -->
                <h3 class="info-title" style="margin-top: 40px;">معرض الصور</h3>
                <div class="mini-gallery">
                    <?php if(!empty($region['gallery_img1'])): ?>
                        <img src="images/<?php echo $region['gallery_img1']; ?>" alt="صورة 1">
                    <?php endif; ?>
                    
                    <?php if(!empty($region['gallery_img2'])): ?>
                        <img src="images/<?php echo $region['gallery_img2']; ?>" alt="صورة 2">
                    <?php endif; ?>

                    <?php if(!empty($region['gallery_img3'])): ?>
                        <img src="images/<?php echo $region['gallery_img3']; ?>" alt="صورة 3">
                    <?php endif; ?>
                </div>

            </div>
        </article>
    </main>

    <footer id="footer-tag">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>