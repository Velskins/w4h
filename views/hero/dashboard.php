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