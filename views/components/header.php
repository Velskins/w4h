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

<header class="w-100 px-4 px-md-5 py-3"
    style="z-index: 1000; background: linear-gradient(180deg, #172A3D 0%, #222F39 100%); box-shadow: 0 4px 10px rgba(0,0,0,0.3); border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="d-flex justify-content-between align-items-center">

        <div class="header-logo">
            <a href="<?= $isLoggedIn ? $dashboardLink : '/' ?>">
                <img src="/../public/assets/DA/logo.svg" alt="Web4Heroes Logo" style="height: 50px;">
            </a>
        </div>

        <nav class="d-none d-lg-flex gap-4 text-uppercase small font-mono" style="letter-spacing: 1px;">

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

        <div class="d-flex gap-2 align-items-center" style="min-width: 200px; justify-content: flex-end;">

            <?php if (!$isLoggedIn): ?>
                <a href="/login" class="btn btn-outline-light rounded-pill px-4 btn-sm transition-btn fw-bold">
                    CONNEXION
                </a>
                <a href="/register" class="btn btn-primary rounded-pill px-4 btn-sm transition-btn fw-bold"
                    style="background-color: #2b4c7e; border: none; box-shadow: 0 0 15px rgba(43, 76, 126, 0.4);">
                    INSCRIPTION
                </a>

            <?php else: ?>

                <div class="d-flex align-items-center gap-3">

                    <div class="text-end lh-1 d-none d-md-block">
                        <span class="d-block text-white-50 text-uppercase"
                            style="font-size: 0.6rem; letter-spacing: 1px;">Session active</span>
                        <span class="text-white fw-bold small">
                            <?= htmlspecialchars($_SESSION['user_firstname'] ?? 'Citoyen') ?>
                        </span>
                    </div>

                    <div class="vr bg-white opacity-25 mx-1 d-none d-md-block" style="height: 25px;"></div>

                    <a href="/logout"
                        class="btn btn-sm d-flex align-items-center gap-2 rounded-pill px-3 py-1 transition-btn"
                        style="background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.3); color: #ff8fa3;"
                        onmouseover="this.style.background='#dc3545'; this.style.color='white'; this.style.boxShadow='0 0 15px rgba(220,53,69,0.5)';"
                        onmouseout="this.style.background='rgba(220, 53, 69, 0.1)'; this.style.color='#ff8fa3'; this.style.boxShadow='none';">

                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-none d-lg-inline small text-uppercase fw-bold"
                            style="letter-spacing: 0.5px;">Déconnexion</span>
                    </a>
                </div>

            <?php endif; ?>

        </div>

    </div>
</header>

<style>
    .font-mono {
        font-family: 'JetBrains Mono', monospace, sans-serif;
    }

    .nav-link-custom {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: all 0.3s ease;
        padding-bottom: 2px;
        border-bottom: 2px solid transparent;
    }

    .nav-link-custom:hover,
    .nav-link-custom.active {
        color: white;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .nav-link-custom.active {
        border-bottom-color: #0dcaf0;
    }

    .transition-btn {
        transition: all 0.3s ease;
    }
</style>