<div class="container-fluid p-4 min-vh-100 citizen-dashboard-bg position-relative">

    <div class="tech-grid-overlay"></div>

    <div class="position-relative z-2">

        <div class="row mb-5 align-items-end">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="pulse-dot bg-success"></span>
                    <span class="text-info text-uppercase letter-spacing-2 small fw-bold">Système Connecté v2.4</span>
                </div>

                <h1 class="display-4 fw-bolder text-white text-uppercase mb-1 title-glow">
                    Bonjour, <span class="text-stroke"><?= htmlspecialchars($_SESSION['user_firstname'] ?? 'Citoyen') ?></span>
                </h1>

                <p class="text-white-50 mt-2 mb-0 fs-5 fw-light" style="max-width: 600px;">
                    Bienvenue sur votre interface de gestion. La ville compte sur votre vigilance aujourd'hui.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="/incident/create" class="btn btn-danger-neon btn-lg px-5 py-3 fw-bold rounded-pill d-inline-flex align-items-center gap-2">
                    <i class="bi bi-megaphone-fill"></i>
                    SIGNALER UN DANGER
                </a>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-primary"></div>
                    <div class="icon-box-premium text-primary">
                        <i class="bi bi-send-fill"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0"><?= count($my_incidents ?? []) ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Signalements</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-warning"></div>
                    <div class="icon-box-premium text-warning">
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
                        <h3 class="display-6 fw-bold text-white mb-0"><?= $pending ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">En traitement</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-success"></div>
                    <div class="icon-box-premium text-success">
                        <i class="bi bi-check-circle-fill"></i>
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
                        <h3 class="display-6 fw-bold text-white mb-0"><?= $solved ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Résolus</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-8">
                <div class="premium-glass-card p-0 h-100 d-flex flex-column">
                    <div class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center">
                        <h2 class="h6 fw-bold text-white mb-0 text-uppercase letter-spacing-2 d-flex align-items-center">
                            <i class="bi bi-activity me-2 text-info"></i>Activité Récente
                        </h2>
                        <div class="d-flex gap-1">
                            <span class="badge bg-dark border border-secondary text-secondary font-mono">LIVE FEED</span>
                        </div>
                    </div>

                    <div class="p-4 flex-grow-1">
                        <?php if (empty($my_incidents)): ?>
                            <div class="text-center py-5 h-100 d-flex flex-column justify-content-center align-items-center opacity-50">
                                <i class="bi bi-shield-lock display-1 mb-3 text-white-50"></i>
                                <h5 class="text-white fw-light letter-spacing-1">Aucune activité détectée</h5>
                                <p class="text-white-50 small">Le secteur est calme. Restez vigilant.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table hud-table align-middle mb-0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Incident</th>
                                        <th>Zone</th>
                                        <th>État</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($my_incidents as $incident): ?>
                                        <tr>
                                            <td class="font-mono text-info opacity-75"><?= date('d.m.Y', strtotime($incident['date'])) ?></td>
                                            <td class="fw-bold text-white"><?= htmlspecialchars($incident['type']) ?></td>
                                            <td class="text-white-50 small text-uppercase"><?= htmlspecialchars($incident['city']) ?></td>
                                            <td>
                                                <?php if ($incident['status'] === 'En attente'): ?>
                                                    <span class="status-indicator status-warning">Analyse</span>
                                                <?php elseif ($incident['status'] === 'En cours'): ?>
                                                    <span class="status-indicator status-info animate-pulse">En cours</span>
                                                <?php elseif ($incident['status'] === 'Terminé'): ?>
                                                    <span class="status-indicator status-success">Clôturé</span>
                                                <?php else: ?>
                                                    <span class="status-indicator status-secondary"><?= htmlspecialchars($incident['status']) ?></span>
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
            </div>

            <div class="col-lg-4">

                <div class="premium-glass-card mb-4 position-relative overflow-hidden border-warning-subtle recruit-card-hover p-0">
                    <div class="p-5 text-center position-relative z-2">
                        <div class="mb-4 position-relative d-inline-block">
                            <div class="icon-circle-glow"></div>
                            <i class="bi bi-shield-fill-exclamation text-warning display-3 position-relative z-2"></i>
                        </div>
                        <h3 class="h5 fw-bolder text-white text-uppercase letter-spacing-2 mb-2">Appel aux Héros</h3>
                        <p class="text-white-50 small mb-4 px-3">
                            L'Initiative recherche des talents exceptionnels. Votre profil correspond à nos critères.
                        </p>
                        <a href="/hero/create" class="btn btn-outline-warning rounded-0 text-uppercase fw-bold px-4 py-2 letter-spacing-2 btn-tech-hover stretched-link">
                            Candidater
                        </a>
                    </div>

                    <div class="radar-scan"></div>
                    <div class="recruit-bg-glow"></div>
                </div>

                <div class="premium-glass-card p-4">
                    <h3 class="h6 fw-bold text-white text-uppercase mb-4 text-danger letter-spacing-2 d-flex align-items-center">
                        <i class="bi bi-broadcast me-2 animate-pulse"></i>Canaux d'Urgence
                    </h3>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                        <li class="emergency-row">
                            <div class="d-flex flex-column">
                                <span class="text-uppercase text-white-50 x-small fw-bold">Services Publics</span>
                                <span class="text-white fw-bold">Police / Pompiers</span>
                            </div>
                            <span class="emergency-number">911</span>
                        </li>
                        <li class="emergency-row border-warning-subtle">
                            <div class="d-flex flex-column">
                                <span class="text-uppercase text-warning opacity-75 x-small fw-bold">Ligne Directe</span>
                                <span class="text-white fw-bold">Anti-Vilains</span>
                            </div>
                            <span class="emergency-number text-warning">0800-HERO</span>
                        </li>
                        <li class="emergency-row">
                            <div class="d-flex flex-column">
                                <span class="text-uppercase text-white-50 x-small fw-bold">Support Technique</span>
                                <span class="text-white fw-bold">Web4Heroes</span>
                            </div>
                            <span class="text-info font-mono small">help@w4h.com</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<style>

    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&family=Rajdhani:wght@400;500;600;700&display=swap');

    :root {
        --glass-bg: rgba(13, 18, 30, 0.65);
        --glass-border: rgba(255, 255, 255, 0.08);
        --neon-blue: #00f2ff;
        --neon-red: #ff2a2a;
        --neon-yellow: #ffc107;
        --dark-depth: #050910;
    }

    body {
        font-family: "Segoe UI", Arial, sans-serif;

    }

    .font-mono { font-family: 'JetBrains Mono', monospace; }
    .letter-spacing-1 { letter-spacing: 1px; }
    .letter-spacing-2 { letter-spacing: 2px; }
    .x-small { font-size: 0.65rem; }


    .citizen-dashboard-bg {

        background-color: var(--dark-depth);
        background-image:
                radial-gradient(circle at 15% 50%, rgba(0, 242, 255, 0.08), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(255, 42, 42, 0.08), transparent 25%),
                url('/public/assets/DA/americaxy.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        box-shadow: inset 0 0 150px rgba(0,0,0,0.8);


        margin-bottom: -1.5rem !important;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
        overflow-x: hidden;
    }


    .tech-grid-overlay {
        position: absolute;
        inset: 0;
        background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        pointer-events: none;
        z-index: 0;
    }



    .text-stroke {
        -webkit-text-stroke: 1px rgba(255,255,255,0.3);
        color: #e2e8f0;
    }




    .premium-glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 4px;
        box-shadow: 0 10px 40px -10px rgba(0,0,0,0.5);
        position: relative;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    .premium-glass-card::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    }
    .group-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(255,255,255,0.2);
        box-shadow: 0 20px 50px -10px rgba(0,0,0,0.6);
    }


    .card-glow-effect {
        position: absolute; width: 150px; height: 150px; border-radius: 50%;
        filter: blur(60px); opacity: 0; top: -20%; right: -20%;
        transition: opacity 0.5s ease; pointer-events: none;
    }
    .group-hover:hover .card-glow-effect { opacity: 0.4; }


    .icon-box-premium {
        width: 60px; height: 60px;
        background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; border-radius: 4px; box-shadow: inset 0 0 20px rgba(0,0,0,0.2);
    }


    .btn-danger-neon {
        background: rgba(220, 53, 69, 0.1); border: 1px solid #dc3545; color: #ff8fa3;
        transition: all 0.3s ease; text-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.2);
    }
    .btn-danger-neon:hover {
        background: #dc3545; color: white; box-shadow: 0 0 30px rgba(220, 53, 69, 0.6);
    }
    .pulse-dot {
        width: 8px; height: 8px; border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
        animation: pulse-white 2s infinite;
    }

    .btn-tech-hover {
        border: 1px solid var(--neon-yellow); color: var(--neon-yellow);
        background: transparent; position: relative; overflow: hidden; transition: all 0.3s;
    }
    .btn-tech-hover:hover {
        background: var(--neon-yellow); color: black; box-shadow: 0 0 20px var(--neon-yellow);
    }


    .hud-table {
        --bs-table-bg: transparent; --bs-table-color: #e2e8f0;
        border-collapse: separate; border-spacing: 0 8px;
    }
    .hud-table thead th {
        border: none; text-transform: uppercase; font-size: 0.75rem;
        letter-spacing: 1px; color: #94a3b8; padding-left: 1.5rem;
    }
    .hud-table tbody tr {
        background: rgba(255,255,255,0.02); transition: background 0.2s;
    }
    .hud-table tbody tr td:first-child { border-top-left-radius: 4px; border-bottom-left-radius: 4px; padding-left: 1.5rem; }
    .hud-table tbody tr td:last-child { border-top-right-radius: 4px; border-bottom-right-radius: 4px; }
    .hud-table tbody tr:hover { background: rgba(255,255,255,0.05); }
    .hud-table td { border: none; padding: 1rem 0.5rem; font-size: 0.9rem; }


    .status-indicator {
        display: inline-flex; align-items: center; padding: 4px 12px;
        border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
        position: relative;
    }
    .status-indicator::before {
        content: ''; width: 6px; height: 6px; border-radius: 50%; margin-right: 8px;
    }
    .status-warning { background: rgba(255, 193, 7, 0.1); color: #ffc107; border: 1px solid rgba(255, 193, 7, 0.2); }
    .status-warning::before { background: #ffc107; box-shadow: 0 0 8px #ffc107; }

    .status-info { background: rgba(13, 202, 240, 0.1); color: #0dcaf0; border: 1px solid rgba(13, 202, 240, 0.2); }
    .status-info::before { background: #0dcaf0; box-shadow: 0 0 8px #0dcaf0; }

    .status-success { background: rgba(25, 135, 84, 0.1); color: #20c997; border: 1px solid rgba(32, 201, 151, 0.2); }
    .status-success::before { background: #20c997; box-shadow: 0 0 8px #20c997; }


    .radar-scan {
        position: absolute; inset: 0;
        background: linear-gradient(180deg, transparent, rgba(255, 193, 7, 0.1), transparent);
        height: 100%; width: 100%; transform: translateY(-100%);
        animation: radar-swipe 4s linear infinite; pointer-events: none; z-index: 1;
    }
    .recruit-bg-glow {
        position: absolute; inset: -50%;
        background: radial-gradient(circle, rgba(255, 193, 7, 0.1) 0%, transparent 60%);
        animation: spin 10s linear infinite; z-index: 0;
    }
    .icon-circle-glow {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 80px; height: 80px; border-radius: 50%;
        border: 1px dashed rgba(255, 193, 7, 0.3);
        animation: spin-reverse 8s linear infinite;
    }


    .emergency-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 15px; background: rgba(0,0,0,0.3);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 4px;
        transition: all 0.2s;
    }
    .emergency-row:hover { background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.2); }
    .emergency-number { font-family: 'JetBrains Mono', monospace; font-size: 1.2rem; letter-spacing: -1px; }


    @keyframes spin { 100% { transform: rotate(360deg); } }
    @keyframes spin-reverse { 100% { transform: translate(-50%, -50%) rotate(-360deg); } }
    @keyframes radar-swipe { 0% { transform: translateY(-100%); } 100% { transform: translateY(100%); } }
    @keyframes pulse-white { 0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); } 70% { box-shadow: 0 0 0 6px rgba(255, 255, 255, 0); } 100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); } }
    .animate-pulse { animation: pulse 2s infinite; }
</style>
