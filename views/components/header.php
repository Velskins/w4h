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

$dashboardLink = '/citizen/dashboard';

if ($isLoggedIn && isset($_SESSION['user_role'])) {
    $roles = json_decode($_SESSION['user_role'], true);

    if (is_array($roles)) {
        if (in_array('ROLE_ADMIN', $roles)) {
            $dashboardLink = '/admin';
        } elseif (in_array('ROLE_HERO', $roles)) {
            $dashboardLink = '/hero/dashboard';
        }
    }
}

$showAuthButtons = in_array($currentPath, $publicPages) && !$isLoggedIn;
?>

<header class="w-100 px-5 py-3"
    style="z-index: 1000; background: linear-gradient(180deg, #172A3D 0%, #222F39 100%); box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
    <div class="d-flex justify-content-between align-items-center">

        <div class="header-logo">
            <a href="<?= $isLoggedIn ? $dashboardLink : '/' ?>">
                <img src="/../public/assets/DA/logo.svg" alt="Web4Heroes Logo" style="height: 60px;">
            </a>
        </div>

        <nav class="d-none d-lg-flex gap-4 text-uppercase small" style="letter-spacing: 1px;">

            <?php if ($isLoggedIn): ?>
                <a href="<?= $dashboardLink ?>"
                    class="nav-link-custom <?= $currentPath === $dashboardLink ? 'active' : '' ?>">
                    Dashboard
                </a>
                <a href="/incident" class="nav-link-custom <?= str_contains($currentPath, '/incident') ? 'active' : '' ?>">
                    Incidents
                </a>
                <a href="/hero/liste" class="nav-link-custom <?= $currentPath === '/contact' ? 'active' : '' ?>">
                    Super-héros
                </a>
                <a href="/profile" class="nav-link-custom <?= str_contains($currentPath, '/profile') ? 'active' : '' ?>">
                    Profil
                </a>

            <?php else: ?>
                <a href="/#how-it-works" class="nav-link-custom hover-opacity-100">
                    Comment ça marche ?
                </a>
                <a href="/#search" class="nav-link-custom hover-opacity-100">
                    Recherche
                </a>
                <a href="/hero/liste" class="nav-link-custom hover-opacity-100">
                    Super-héros
                </a>
            <?php endif; ?>

        </nav>

        <div class="d-flex gap-2" style="min-width: 200px; justify-content: flex-end;">

            <?php if (!$isLoggedIn): ?>
                <a href="/login" class="btn btn-outline-light rounded-pill px-4 btn-sm transition-btn">
                    Connexion
                </a>
                <a href="/register" class="btn btn-primary rounded-pill px-4 btn-sm transition-btn"
                    style="background-color: #2b4c7e; border: none;">
                    Inscription
                </a>

            <?php else: ?>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-white small opacity-75 d-none d-md-block text-end">
                        Bonjour, <span
                            class="fw-bold text-white"><?= htmlspecialchars($_SESSION['user_firstname'] ?? 'Héros') ?></span>
                    </span>
                    <a href="/logout" class="btn btn-outline-danger rounded-pill px-4 btn-sm transition-btn"
                        title="Se déconnecter">
                        <i class="bi bi-power"></i>
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </div>
</header>