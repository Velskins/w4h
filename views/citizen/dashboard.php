<div class="container-fluid p-4 min-vh-100 citizen-dashboard-bg">

    <div class="row mb-5 align-items-center">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold text-black text-uppercase mb-0">
                Espace Citoyen
            </h1>
            <p class="text-black-50 mt-2 mb-0">
                Bienvenue, <span
                    class="text-info fw-bold"><?= htmlspecialchars($_SESSION['user_firstname'] ?? 'Citoyen') ?></span>.
                Aidez-nous à garder la ville sûre.
            </p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="/incident/create" class="btn btn-danger btn-lg rounded-pill px-5 fw-bold shadow-lg transition-btn">
                <i class="bi bi-megaphone-fill me-2"></i>SIGNALER UN DANGER
            </a>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="citizen-stat-card p-3 d-flex align-items-center gap-3">
                <div class="icon-box bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-send"></i>
                </div>
                <div>
                    <h3 class="h2 fw-bold text-white mb-0"><?= count($my_incidents ?? []) ?></h3>
                    <span class="text-white-50 small text-uppercase">Signalements</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="citizen-stat-card p-3 d-flex align-items-center gap-3">
                <div class="icon-box bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <?php
                    $pending = 0;
                    if (isset($my_incidents)) {
                        foreach ($my_incidents as $i)
                            if ($i['status'] === 'En attente' || $i['status'] === 'En cours')
                                $pending++;
                    }
                    ?>
                    <h3 class="h2 fw-bold text-white mb-0"><?= $pending ?></h3>
                    <span class="text-white-50 small text-uppercase">En cours de traitement</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="citizen-stat-card p-3 d-flex align-items-center gap-3">
                <div class="icon-box bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <?php
                    $solved = 0;
                    if (isset($my_incidents)) {
                        foreach ($my_incidents as $i)
                            if ($i['status'] === 'Terminé' || $i['status'] === 'Validé')
                                $solved++;
                    }
                    ?>
                    <h3 class="h2 fw-bold text-white mb-0"><?= $solved ?></h3>
                    <span class="text-white-50 small text-uppercase">Incidents Résolus</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-8">
            <div class="admin-card p-4 h-100">
                <h2 class="h5 fw-bold text-white mb-4 text-uppercase border-bottom border-secondary pb-2">
                    <i class="bi bi-clock-history me-2"></i>Vos derniers signalements
                </h2>

                <?php if (empty($my_incidents)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-clipboard-check text-muted opacity-25" style="font-size: 4rem;"></i>
                        <p class="text-white-50 mt-3">Aucun signalement pour le moment.<br>La ville semble calme grâce à
                            vous !</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle custom-table small">
                            <thead>
                                <tr class="text-secondary text-uppercase">
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Lieu</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($my_incidents as $incident): ?>
                                    <tr>
                                        <td class="text-white-50"><?= date('d/m/Y', strtotime($incident['date'])) ?></td>
                                        <td class="fw-bold text-white"><?= htmlspecialchars($incident['type']) ?></td>
                                        <td class="text-white-50"><?= htmlspecialchars($incident['city']) ?></td>
                                        <td>
                                            <?php if ($incident['status'] === 'En attente'): ?>
                                                <span class="badge bg-warning text-dark">Analyse en cours</span>
                                            <?php elseif ($incident['status'] === 'En cours'): ?>
                                                <span class="badge bg-primary animate-pulse">Héros en route</span>
                                            <?php elseif ($incident['status'] === 'Terminé'): ?>
                                                <span class="badge bg-success">Résolu</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?= htmlspecialchars($incident['status']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="hero-recruit-card p-4 mb-4 text-center position-relative overflow-hidden">
                <div class="recruit-bg-glow"></div>

                <i class="bi bi-shield-fill text-warning mb-3 d-block" style="font-size: 3rem;"></i>
                <h3 class="h5 fw-bold text-white text-uppercase">L'Initiative a besoin de vous</h3>
                <p class="text-white-50 small mb-4">
                    Vous possédez des capacités hors du commun ? Ne restez pas dans l'ombre.
                </p>
                <a href="/hero/create"
                    class="btn btn-outline-warning btn-sm rounded-pill px-4 text-uppercase fw-bold stretched-link transition-btn">
                    Déposer une candidature
                </a>
            </div>

            <div class="admin-card p-4">
                <h3 class="h6 fw-bold text-white text-uppercase mb-3 text-info">
                    <i class="bi bi-info-circle me-2"></i>En cas d'urgence
                </h3>
                <ul class="list-unstyled text-white-50 small mb-0 d-flex flex-column gap-2">
                    <li class="d-flex justify-content-between border-bottom border-secondary pb-2">
                        <span>Police / Pompiers</span>
                        <span class="text-white fw-bold">911</span>
                    </li>
                    <li class="d-flex justify-content-between border-bottom border-secondary pb-2">
                        <span>Ligne Anti-Vilains</span>
                        <span class="text-white fw-bold">0800-HERO</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Support Web4Heroes</span>
                        <span class="text-white fw-bold">support@w4h.com</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>

<style>
    .citizen-dashboard-bg {
        background: linear-gradient(rgba(23, 32, 42, 0.5), rgba(23, 32, 42, 0.8)), url('/public/assets/background/Background9.png');
        
        background-size: cover;
        background-position: center top;
        background-attachment: fixed;
        min-height: 100vh;
        
        margin-top: -1.5rem !important; 
        margin-bottom: -1.5rem !important;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .citizen-stat-card {
        background-color: #1A2634;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: transform 0.3s;
    }

    .citizen-stat-card:hover {
        transform: translateY(-5px);
        background-color: #202e3e;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .hero-recruit-card {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        border: 1px solid rgba(255, 193, 7, 0.3);
        border-radius: 12px;
    }

    .recruit-bg-glow {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 193, 7, 0.1) 0%, rgba(0, 0, 0, 0) 70%);
        animation: spin 10s linear infinite;
        pointer-events: none;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .admin-card {
        background-color: #1A2634;
        border-radius: 12px;
    }

    .custom-table tbody tr {
        background-color: transparent;
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }
</style>