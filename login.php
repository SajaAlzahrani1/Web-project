<?php
session_start();
include 'datab.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول المشرف</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo">لوحة المشرف</div>
        <nav>
            <ul>
                <li><a href="index.php">زيارة الموقع</a></li>
                <li><button id="night-mode-btn" onclick="toggleNightMode()">الوضع الليلي</button></li>
            </ul>
        </nav>
    </div>
</header>

<main class="login-main">
    <div class="login-box">
        <div class="login-box-header">تسجيل دخول المشرف</div>
        <div class="login-box-body">

            <?php if($error != ""): ?>
                <p class="error-msg"><?php echo $error; ?></p>
            <?php endif; ?>

            <form method="POST">
                <label>اسم المستخدم</label>
                <input type="text" name="username" placeholder="مثال: admin" required>

                <label>كلمة المرور</label>
                <input type="password" name="password" placeholder="••••••••" required>

                <button type="submit">دخول</button>
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