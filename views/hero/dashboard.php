<div class="container-fluid p-4 min-vh-100 citizen-dashboard-bg position-relative">

    <div class="tech-grid-overlay"></div>

    <div class="position-relative z-2">

        <div class="row mb-5 align-items-end">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="pulse-dot bg-warning"></span>
                    <span class="text-warning text-uppercase letter-spacing-2 small fw-bold">Statut Héroïque:
                        ACTIF</span>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <div
                        style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 2px solid rgba(255,255,255,0.8); box-shadow: 0 0 20px rgba(255, 193, 7, 0.3);">
                        <img src="<?= htmlspecialchars($hero['photo_path'] ?: '/assets/images/default_hero.png') ?>"
                            alt="<?= htmlspecialchars($hero['alias']) ?>"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div>
                        <h1 class="display-5 fw-bolder text-white text-uppercase mb-0 title-glow">
                            <?= htmlspecialchars($hero['alias']) ?>
                        </h1>
                        <div class="d-flex gap-3 text-white-50 small text-uppercase mt-2 font-mono">
                            <span><i
                                    class="bi bi-geo-alt me-1 text-info"></i><?= htmlspecialchars($hero['sector'] ?? 'Secteur Inconnu') ?></span>
                            <span><i
                                    class="bi bi-stars me-1 text-warning"></i><?= htmlspecialchars($hero['specialty']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="/incident/create"
                    class="btn btn-danger-neon btn-lg px-5 py-3 fw-bold rounded-pill d-inline-flex align-items-center gap-2">
                    <i class="bi bi-megaphone-fill"></i>
                    DÉCLARER UN INCIDENT
                </a>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-info"></div>
                    <div class="icon-box-premium text-info">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0"><?= count($my_interventions) ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Interventions</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-danger"></div>
                    <div class="icon-box-premium text-danger">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0">0</h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Vilains
                            Capturés</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-primary"></div>
                    <div class="icon-box-premium text-primary">
                        <i class="bi bi-hand-thumbs-up-fill"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0">4.8</h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Réputation</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-warning"></div>
                    <div class="icon-box-premium text-warning">
                        <i class="bi bi-film"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0">0</h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Films</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-8">
                <div class="premium-glass-card p-0 h-100 d-flex flex-column">
                    <div
                        class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center">
                        <h2
                            class="h6 fw-bold text-white mb-0 text-uppercase letter-spacing-2 d-flex align-items-center">
                            <i class="bi bi-shield-exclamation me-2 text-danger"></i>Incidents en cours
                        </h2>
                        <span
                            class="badge bg-danger bg-opacity-25 text-danger border border-danger font-mono animate-pulse">LIVE
                            ACTION</span>
                    </div>

                    <div class="p-4 flex-grow-1">
                        <?php if (empty($available_incidents)): ?>
                            <div
                                class="text-center py-5 h-100 d-flex flex-column justify-content-center align-items-center opacity-50">
                                <i class="bi bi-cup-hot display-1 mb-3 text-white-50"></i>
                                <h5 class="text-white fw-light letter-spacing-1">Aucun incident critique</h5>
                                <p class="text-white-50 small">La ville est calme. Profitez-en pour vous entraîner.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table hud-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Lieu</th>
                                            <th>Super-Vilain</th>
                                            <th class="text-center">Priorité</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($available_incidents as $index => $incident): ?>
                                            <tr>
                                                <td class="fw-bold text-white ps-4">
                                                    <?= htmlspecialchars($incident['type']) ?>
                                                </td>
                                                <td class="text-white-50 small text-uppercase">
                                                    <?= htmlspecialchars($incident['city']) ?>
                                                </td>
                                                <td class="font-mono text-info x-small">
                                                    <?= htmlspecialchars($incident['villain_name'] ?? 'NON IDENTIFIÉ') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($incident['priority'] === 'Haute'): ?>
                                                        <span class="status-indicator status-warning">URGENT</span>
                                                    <?php elseif ($incident['priority'] === 'Moyenne'): ?>
                                                        <span class="status-indicator status-info">MOYEN</span>
                                                    <?php else: ?>
                                                        <span class="status-indicator status-success">FAIBLE</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <form action="/hero/take" method="POST">
                                                        <input type="hidden" name="incident_id" value="<?= $incident['id'] ?>">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-warning rounded-pill px-4 fw-bold text-uppercase btn-tech-hover">
                                                            GO !
                                                        </button>
                                                    </form>
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
                <div class="premium-glass-card p-4 h-100 position-relative overflow-hidden">
                    <div class="recruit-bg-glow"
                        style="background: radial-gradient(circle, rgba(255, 193, 7, 0.1) 0%, transparent 70%);"></div>

                    <h2
                        class="h6 fw-bold text-white mb-4 text-uppercase border-bottom border-light border-opacity-10 pb-2 letter-spacing-2">
                        <i class="bi bi-bar-chart me-2 text-warning"></i>Statistiques Globales
                    </h2>

                    <div class="d-flex flex-column gap-3">
                        <div
                            class="d-flex justify-content-between align-items-center p-2 rounded bg-black bg-opacity-25">
                            <span class="text-white-50 small text-uppercase">Vols en tout genre</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary">38 %</span>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center p-2 rounded bg-black bg-opacity-25">
                            <span class="text-white-50 small text-uppercase">Actes terroristes</span>
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">13 %</span>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center p-2 rounded bg-black bg-opacity-25">
                            <span class="text-white-50 small text-uppercase">Invasions extraterrestre</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">24 %</span>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center p-2 rounded bg-black bg-opacity-25">
                            <span class="text-white-50 small text-uppercase">Meurtres</span>
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">25 %</span>
                        </div>

                        <div class="mt-3 pt-3 border-top border-light border-opacity-10">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white-50 small">Citoyens secourus</span>
                                <span class="text-white fw-bold font-mono">294</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white-50 small">Top des meilleurs super-héros</span>
                                <span class="text-warning fw-bold font-mono">#1</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-white-50 small">Premier rôle dans les films</span>
                                <span class="text-white fw-bold font-mono">18</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* STYLES PARTAGÉS AVEC LE DASHBOARD ADMIN ET CITOYEN */

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

    .font-mono {
        font-family: 'JetBrains Mono', monospace;
    }

    .letter-spacing-1 {
        letter-spacing: 1px;
    }

    .letter-spacing-2 {
        letter-spacing: 2px;
    }

    .x-small {
        font-size: 0.65rem;
    }

    .citizen-dashboard-bg {
        background-color: var(--dark-depth);
        background-image:
            radial-gradient(circle at 15% 50%, rgba(0, 242, 255, 0.08), transparent 25%),
            radial-gradient(circle at 85% 30%, rgba(255, 42, 42, 0.08), transparent 25%),
            url('/public/assets/background/Background9.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        box-shadow: inset 0 0 150px rgba(0, 0, 0, 0.8);
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
        -webkit-text-stroke: 1px rgba(255, 255, 255, 0.3);
        color: #e2e8f0;
    }

    .premium-glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 4px;
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
        position: relative;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .premium-glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    }

    .group-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.6);
    }

    .card-glow-effect {
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0;
        top: -20%;
        right: -20%;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .group-hover:hover .card-glow-effect {
        opacity: 0.4;
    }

    .icon-box-premium {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        border-radius: 4px;
        box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .btn-danger-neon {
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid #dc3545;
        color: #ff8fa3;
        transition: all 0.3s ease;
        text-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.2);
    }

    .btn-danger-neon:hover {
        background: #dc3545;
        color: white;
        box-shadow: 0 0 30px rgba(220, 53, 69, 0.6);
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
        animation: pulse-white 2s infinite;
    }

    .btn-tech-hover {
        border: 1px solid var(--neon-yellow);
        color: var(--neon-yellow);
        background: transparent;
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
    }

    .btn-tech-hover:hover {
        background: var(--neon-yellow);
        color: black;
        box-shadow: 0 0 20px var(--neon-yellow);
    }

    .hud-table {
        --bs-table-bg: transparent;
        --bs-table-color: #e2e8f0;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .hud-table thead th {
        border: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #94a3b8;
        padding-left: 1.5rem;
    }

    .hud-table tbody tr {
        background: rgba(255, 255, 255, 0.02);
        transition: background 0.2s;
    }

    .hud-table tbody tr td:first-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
        padding-left: 1.5rem;
    }

    .hud-table tbody tr td:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        padding-right: 1.5rem;
    }

    .hud-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .hud-table td {
        border: none;
        padding: 1rem 0.5rem;
        font-size: 0.9rem;
    }

    .status-indicator {
        display: inline-flex;
        align-items: center;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
    }

    .status-indicator::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        margin-right: 8px;
    }

    .status-warning {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
        border: 1px solid rgba(255, 193, 7, 0.2);
    }

    .status-warning::before {
        background: #ffc107;
        box-shadow: 0 0 8px #ffc107;
    }

    .status-info {
        background: rgba(13, 202, 240, 0.1);
        color: #0dcaf0;
        border: 1px solid rgba(13, 202, 240, 0.2);
    }

    .status-info::before {
        background: #0dcaf0;
        box-shadow: 0 0 8px #0dcaf0;
    }

    .status-success {
        background: rgba(25, 135, 84, 0.1);
        color: #20c997;
        border: 1px solid rgba(32, 201, 151, 0.2);
    }

    .status-success::before {
        background: #20c997;
        box-shadow: 0 0 8px #20c997;
    }

    .recruit-bg-glow {
        position: absolute;
        inset: -50%;
        background: radial-gradient(circle, rgba(255, 193, 7, 0.1) 0%, transparent 60%);
        animation: spin 10s linear infinite;
        z-index: 0;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes pulse-white {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
        }

        70% {
            box-shadow: 0 0 0 6px rgba(255, 255, 255, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }
</style>