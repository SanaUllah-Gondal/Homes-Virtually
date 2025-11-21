<<<<<<< HEAD
<?php
// index.php
$page = $_GET['page'] ?? 'home'; // Default to 'home'
$valid_pages = ['home', 'features', 'about', 'team', 'contact'];

if (!in_array($page, $valid_pages)) {
    http_response_code(404);
    die("404 Page Not Found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Tour — <?= ucfirst($page) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <?php
        // Dynamically include section
        include "sections/{$page}.php";
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
=======
<?php
// index.php
$page = $_GET['page'] ?? 'home'; // Default to 'home'
$valid_pages = ['home', 'features', 'about', 'team', 'contact'];

if (!in_array($page, $valid_pages)) {
    http_response_code(404);
    die("404 Page Not Found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Tour — <?= ucfirst($page) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <?php
        // Dynamically include section
        include "sections/{$page}.php";
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
>>>>>>> e9205999f144a3c24b0148e92489a2565d5136ef
</html>