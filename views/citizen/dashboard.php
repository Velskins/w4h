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

