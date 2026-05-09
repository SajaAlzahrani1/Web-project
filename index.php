<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اكتشف السعودية - الرئيسية</title>
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
        <section class="hero">
            <div class="hero-image">
                 <img id="main-image" src="images\ksa.jpg" alt="الرياض">
            </div>
            <div class="hero-content">
                <h1 id="welcome-heading"> تــمــشــى </h1>
                <h2>موقع ثقافي تفاعلي للتعريف بالمملكة</h2>
                <p>استكشف مناطق المملكة العربية السعودية وتعرف على أهم المعالم التاريخية والثقافية.</p>
                <a href="gallery.php" class="btn-main">ابدأ الاستكشاف</a>
            </div>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3>الهدف</h3>
                <p>تقديم معلومات عربية موثوقة عن أهم الوجهات.</p>
            </div>
            <div class="feature-card">
                <h3>المناطق</h3>
                <p>تصفح تفاعلي لمناطق المملكة (صور + عناوين + روابط).</p>
            </div>
            <div class="feature-card">
                <h3>التفاصيل</h3>
                <p>صفحة تعرض وصفاً وصوراً ومعلومات تاريخية عن المكان المختار.</p>
            </div>
        </section>
    </main>

    <footer id="footer-tag">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
