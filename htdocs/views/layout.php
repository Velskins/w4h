<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"
    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/tether/dist/js/tether.min.js"></script>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    >
    <title>Web4Heroes</title>
</head>
<body>
<header>
    <?php require_once __DIR__ . '/components/header.php' ?>
</header>
<main>
    <?php include $viewFile; ?>
</main>
<footer>
    <?php require_once __DIR__ . '/components/footer.php' ?>
</footer>
</body>
</html>
