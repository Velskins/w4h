<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
          <link rel="stylesheet" href="../public/css/styles.css">
    <title>Web 4 Heroes</title>
</head>
<body>
<?php include __DIR__ . "/components/header.php"; ?>

<main>
   <?php if (isset($view) && file_exists($view)) {
    require $view;
    } else {
    echo "<p>Vue introuvable.</p>";
    }
    ?>
</main>
<?php include __DIR__ . "/components/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
