<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row align-items-end mb-5 pb-4 border-bottom border-white border-opacity-10">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="live-badge">
                        <span class="pulse-ring bg-info"></span>
                        SECURE_ID
                    </span>
                    <span class="font-mono text-white-50 x-small"> DATA_ACCESS_GRANTED</span>
                </div>
                <h1 class="display-3 fw-bold text-white text-uppercase tracking-tight leading-none mb-2">
                    Dossier Citoyen
                </h1>
                <p class="text-secondary font-sans fs-5">
                    Consultation des données personnelles et biométriques.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <div class="d-inline-block p-3 border border-white border-opacity-10 rounded bg-black bg-opacity-25">
                    <span class="d-block text-white-50 x-small font-mono text-uppercase mb-1">Dernière Connexion</span>
                    <span class="text-info font-mono"><?= date('d.m.Y H:i') ?></span>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="premium-glass-card h-100 text-center p-5 position-relative overflow-hidden">

                    <div class="card-border-glow" style="--glow-color: #0dcaf0"></div>
                    <div class="bg-spot" style="background: #0dcaf0; top: -20%; left: -20%;"></div>

                    <div class="position-relative d-inline-block mb-4">
                        <div class="avatar-ring"></div>
                        <div class="profile-avatar">
                            <?= strtoupper(mb_substr($user['firstname'], 0, 1)); ?>
                        </div>
                        <div class="status-indicator-absolute bg-success"></div>
                    </div>

                    <h2 class="h3 fw-bold text-white text-uppercase mb-1 title-glow">
                        <?= htmlspecialchars($user['firstname']) ?>
                        <span class="d-block text-info opacity-75"><?= htmlspecialchars($user['lastname']) ?></span>
                    </h2>

                    <div class="mt-3 mb-4">
                        <?php
                        $roles = json_decode($user['role'], true);
                        foreach ($roles as $role):
                            $badgeColor = match ($role) {
                                'ROLE_ADMIN' => 'danger',
                                'ROLE_HERO' => 'warning',
                                default => 'info'
                            };
                            $roleName = match ($role) {
                                'ROLE_ADMIN' => 'ADMINISTRATEUR',
                                'ROLE_HERO' => 'SUPER-HÉROS',
                                'ROLE_HERO_PENDING' => 'CANDIDAT',
                                default => 'CITOYEN'
                            };
                            ?>
                            <span class="role-badge border-<?= $badgeColor ?> text-<?= $badgeColor ?>">
                                <?= $roleName ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <div class="d-flex flex-column gap-3 mt-5">
                        <a href="/profile/edit"
                            class="btn btn-outline-light w-100 font-mono text-uppercase tracking-wide">
                            <i class="bi bi-pencil-square me-2"></i>Mise à jour
                        </a>
                        <a href="/logout"
                            class="btn btn-outline-danger w-100 font-mono text-uppercase tracking-wide btn-danger-glow">
                            <i class="bi bi-power me-2"></i>Déconnexion
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <div class="premium-glass-card h-100 p-0">

                    <div
                        class="p-4 border-bottom border-white border-opacity-10 d-flex justify-content-between align-items-center bg-white bg-opacity-05">
                        <h3 class="h5 text-white text-uppercase mb-0 tracking-wide">
                            <i class="bi bi-cpu me-2 text-white-50"></i>Données Enregistrées
                        </h3>
                        <i class="bi bi-fingerprint text-white-50 fs-4"></i>
                    </div>

                    <div class="p-4 p-md-5">

                        <div class="row g-4 mb-5">
                            <div class="col-12 mb-2">
                                <h4
                                    class="text-secondary text-uppercase x-small tracking-widest border-bottom border-white border-opacity-10 pb-2 mb-3">
                                    Identité Civile</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Prénom</label>
                                    <div class="data-value"><?= htmlspecialchars($user['firstname']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Nom de famille</label>
                                    <div class="data-value"><?= htmlspecialchars($user['lastname']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Date de Naissance</label>
                                    <div class="data-value font-mono"><?= htmlspecialchars($user['birthdate']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Contact Électronique</label>
                                    <div class="data-value text-info font-mono"><?= htmlspecialchars($user['email']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-12 mb-2">
                                <h4
                                    class="text-secondary text-uppercase x-small tracking-widest border-bottom border-white border-opacity-10 pb-2 mb-3">
                                    Localisation</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="data-group d-flex align-items-start gap-3">
                                    <i class="bi bi-geo-alt-fill text-white-50 fs-4 mt-1"></i>
                                    <div>
                                        <div class="data-value mb-1">
                                            <?= htmlspecialchars($user['street_number'] ?? '') ?>
                                            <?= htmlspecialchars($user['street'] ?? '') ?>
                                        </div>
                                        <div class="data-value text-white-50 font-mono">
                                            <?= htmlspecialchars($user['zipcode'] ?? '') ?>
                                            <span
                                                class="text-white text-uppercase"><?= htmlspecialchars($user['city'] ?? '') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="p-3 bg-black bg-opacity-25 border-top border-white border-opacity-10 text-end">
                        <span class="font-mono x-small text-white-50">USER_HASH:
                            <?= substr(md5($user['email']), 0, 12) ?>...</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=JetBrains+Mono:wght@400;500&family=Rajdhani:wght@500;600;700&display=swap');

    :root {
        --bg-void: #030305;
        --card-surface: rgba(255, 255, 255, 0.03);
        --border-subtle: rgba(255, 255, 255, 0.08);
        --text-main: #ffffff;
    }

    .cinematic-wrapper {
        background-color: var(--bg-void);
        background-image:
            linear-gradient(rgba(3, 3, 5, 0.85), rgba(3, 3, 5, 0.95)),
            url('/public/assets/background/Background9.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Rajdhani', sans-serif;
        color: var(--text-main);
        overflow-x: hidden;
        margin-bottom: -1.5rem !important;
        padding-top: 4rem !important;
        padding-bottom: 4rem !important;
    }

    .ambient-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100vh;
        background: radial-gradient(circle at 10% 10%, rgba(13, 202, 240, 0.08), transparent 40%);
        pointer-events: none;
        z-index: 0;
    }

    .noise-texture {
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.07;
        pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }

    .grid-lines {
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 60px 60px;
        mask-image: radial-gradient(circle at center, black 30%, transparent 80%);
    }

    .font-sans {
        font-family: 'Inter', sans-serif;
    }

    .font-mono {
        font-family: 'JetBrains Mono', monospace;
    }

    .tracking-tight {
        letter-spacing: -1px;
    }

    .tracking-wide {
        letter-spacing: 1px;
    }

    .tracking-widest {
        letter-spacing: 3px;
    }

    .leading-none {
        line-height: 1;
    }

    .x-small {
        font-size: 0.75rem;
    }

    .live-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px;
        border-radius: 100px;
        background: rgba(13, 202, 240, 0.1);
        border: 1px solid rgba(13, 202, 240, 0.3);
        color: #0dcaf0;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .pulse-ring {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #0dcaf0;
        box-shadow: 0 0 0 0 rgba(13, 202, 240, 0.7);
        animation: pulse-cyan 2s infinite;
    }

    @keyframes pulse-cyan {
        0% {
            box-shadow: 0 0 0 0 rgba(13, 202, 240, 0.7);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(13, 202, 240, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(13, 202, 240, 0);
        }
    }

    .premium-glass-card {
        background: var(--card-surface);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--border-subtle);
        border-radius: 4px;
        position: relative;
    }

    .card-border-glow {
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        box-shadow: inset 0 0 0 1px var(--glow-color);
        opacity: 0.3;
    }

    .bg-spot {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.1;
        z-index: 0;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2c3e50, #000);
        color: white;
        font-size: 3.5rem;
        font-weight: 700;
        font-family: 'Rajdhani', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        z-index: 2;
    }

    .avatar-ring {
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 1px dashed rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        animation: spin 20s linear infinite;
        z-index: 1;
    }

    .status-indicator-absolute {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 3px solid #1a1a1a;
        box-shadow: 0 0 10px #198754;
        z-index: 3;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .role-badge {
        display: inline-block;
        padding: 6px 16px;
        margin: 0 4px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        font-weight: bold;
        border: 1px solid;
        border-radius: 2px;
        background: rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
    }

    .title-glow {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
    }

    .data-group {
        margin-bottom: 0.5rem;
    }

    .data-label {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.4);
        display: block;
        margin-bottom: 4px;
    }

    .data-value {
        font-size: 1.1rem;
        color: white;
        font-weight: 500;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding-bottom: 8px;
    }

    .btn-danger-glow:hover {
        box-shadow: 0 0 20px rgba(220, 53, 69, 0.4);
    }
</style>