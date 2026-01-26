<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

$publicPages = [
    '/',
    '/index.php',
    '/login',
    '/register',
    '/pwd'
];

$isLoggedIn = isset($_SESSION['user_id']);

$showAuthButtons = in_array($currentPath, $publicPages) && !$isLoggedIn;
?>

<style>
    .hover-opacity-100:hover {
        opacity: 1 !important;
        transition: opacity 0.3s ease;
    }

    .transition-btn {
        transition: all 0.3s ease;
    }

    .transition-btn:hover {
        transform: translateY(-2px);
    }
</style>

<header class="w-100 px-5 py-3"
    style="z-index: 1000; background: linear-gradient(180deg, #172A3D 0%, #222F39 100%); box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
    <div class="d-flex justify-content-between align-items-center">

        <div class="header-logo">
            <a href="/">
                <img src="/public/assets/DA/ww4h-removebg-preview.png" alt="Web4Heroes Logo" style="height: 100px ; ">
            </a>
        </div>

        <nav class="d-none d-lg-flex gap-5 text-uppercase small" style="letter-spacing: 1px;">
            <a href="#" class="text-white text-decoration-none opacity-75 px-3 hover-opacity-100">Comment ça marche
                ?</a>
            <a href="#" class="text-white text-decoration-none opacity-75 px-3 hover-opacity-100">Recherche</a>
            <a href="/heroes" class="text-white text-decoration-none opacity-75 px-3 hover-opacity-100">Super-héros</a>
        </nav>

        <div class="d-flex gap-2" style="min-width: 200px; justify-content: flex-end;">

            <?php if ($showAuthButtons): ?>
                <a href="/login" class="btn btn-outline-light rounded-pill px-4 btn-sm transition-btn">
                    Connexion
                </a>
                <a href="/register" class="btn btn-primary rounded-pill px-4 btn-sm transition-btn"
                    style="background-color: #2b4c7e; border: none;">
                    Inscription
                </a>

            <?php elseif ($isLoggedIn): ?>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-white small opacity-75 d-none d-md-block">
                        Bonjour, <?= htmlspecialchars($_SESSION['user_firstname'] ?? 'Héros') ?>
                    </span>
                    <a href="/logout" class="btn btn-outline-danger rounded-pill px-4 btn-sm transition-btn">
                        Déconnexion
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </div>
</header>
