<div class="container-fluid p-4 min-vh-100 citizen-dashboard-bg position-relative">

    <div class="tech-grid-overlay"></div>

    <div class="position-relative z-2">

        <div class="row mb-5 align-items-end">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="pulse-dot bg-danger"></span> <span
                        class="text-danger text-uppercase letter-spacing-2 small fw-bold">Niveau d'Accréditation :
                        ALPHA</span>
                </div>

                <h1 class="display-4 fw-bolder text-white text-uppercase mb-1 title-glow">
                    Dashboard <span class="text-stroke">Administrateur</span>
                </h1>

                <p class="text-white-50 mt-2 mb-0 fs-5 fw-light" style="max-width: 600px;">
                    Panneau de contrôle central. Surveillance des effectifs et validation des alertes prioritaires.
                </p>
            </div>

        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-info"></div>
                    <div class="icon-box-premium text-info">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0"><?= $total_users ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Citoyens
                            Inscrits</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-danger"></div>
                    <div class="icon-box-premium text-danger">
                        <i class="bi bi-radioactive"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0"><?= $total_villains ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Vilains
                            Identifiés</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="premium-glass-card p-4 d-flex align-items-center gap-4 h-100 position-relative overflow-hidden group-hover">
                    <div class="card-glow-effect bg-warning"></div>
                    <div class="icon-box-premium text-warning">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h3 class="display-6 fw-bold text-white mb-0"><?= $total_incidents ?></h3>
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-2">Incidents
                            Traités</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-8 d-flex flex-column gap-4">

                <div class="premium-glass-card p-0">
                    <div
                        class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center">
                        <h2
                            class="h6 fw-bold text-white mb-0 text-uppercase letter-spacing-2 d-flex align-items-center">
                            <i class="bi bi-person-plus-fill me-2 text-primary"></i>Candidatures Héros
                        </h2>
                        <span
                            class="badge bg-primary bg-opacity-25 text-primary border border-primary font-mono">PENDING</span>
                    </div>

                    <div class="p-4">
                        <?php if (empty($pending_heroes)): ?>
                            <div class="text-center py-5 opacity-50">
                                <i class="bi bi-inbox display-4 mb-3 text-white-50"></i>
                                <p class="text-white-50 small text-uppercase letter-spacing-1">Aucune candidature en attente
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table hud-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Identité</th>
                                            <th>Date Naissance</th>
                                            <th>Statut</th>
                                            <th class="text-end">Protocole</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pending_heroes as $hero): ?>
                                            <tr>
                                                <td class="fw-bold text-white">
                                                    <?= htmlspecialchars($hero['firstname'] . ' ' . $hero['lastname']) ?>
                                                </td>
                                                <td class="font-mono text-white-50 small">
                                                    <?= htmlspecialchars($hero['birthdate']) ?>
                                                </td>
                                                <td>
                                                    <span class="status-indicator status-warning">En attente</span>
                                                </td>
                                                <td class="text-end">
                                                    <form action="/admin/hero/validate" method="POST"
                                                        class="d-inline-flex gap-2">
                                                        <input type="hidden" name="user_id" value="<?= $hero['id'] ?>">

                                                        <button type="submit" name="decision" value="approve"
                                                            class="btn btn-sm btn-outline-info rounded-pill px-3 fw-bold small"
                                                            title="Approuver">
                                                            <i class="bi bi-check-lg me-1"></i>APPROVE
                                                        </button>

                                                        <button type="submit" name="decision" value="reject"
                                                            class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold small"
                                                            title="Rejeter"
                                                            onclick="return confirm('Refuser cette candidature ?');">
                                                            <i class="bi bi-x-lg"></i>
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

                <div class="premium-glass-card p-0">
                    <div
                        class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center">
                        <h2
                            class="h6 fw-bold text-white mb-0 text-uppercase letter-spacing-2 d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle me-2 text-warning"></i>Incidents à Valider
                        </h2>
                        <span
                            class="badge bg-warning bg-opacity-25 text-warning border border-warning font-mono">ALERT</span>
                    </div>

                    <div class="p-4">
                        <?php if (empty($pending_incidents)): ?>
                            <div class="text-center py-5 opacity-50">
                                <i class="bi bi-shield-check display-4 mb-3 text-white-50"></i>
                                <p class="text-white-50 small text-uppercase letter-spacing-1">Tous les incidents sont
                                    traités</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table hud-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Horodatage</th>
                                            <th>Incident</th>
                                            <th>Zone</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pending_incidents as $incident): ?>
                                            <tr>
                                                <td class="font-mono text-white-50 small">
                                                    <?= date('d/m H:i', strtotime($incident['date'])) ?>
                                                </td>
                                                <td>
                                                    <div class="fw-bold text-white mb-1">
                                                        <?= htmlspecialchars($incident['title']) ?></div>
                                                    <div
                                                        class="badge bg-secondary border border-light border-opacity-25 text-light x-small">
                                                        <?= htmlspecialchars($incident['type']) ?>
                                                    </div>
                                                </td>
                                                <td class="text-white-50 small">
                                                    <div class="text-uppercase"><?= htmlspecialchars($incident['city']) ?></div>
                                                    <div class="font-mono x-small opacity-75">
                                                        <?= htmlspecialchars($incident['zipcode']) ?></div>
                                                </td>
                                                <td class="text-end">
                                                    <form action="/admin/incident/validate" method="POST"
                                                        class="d-inline-flex gap-2">
                                                        <input type="hidden" name="id" value="<?= $incident['id'] ?>">

                                                        <button type="submit" name="status" value="Validé"
                                                            class="btn btn-sm btn-success rounded-pill px-3 fw-bold small text-uppercase"
                                                            title="Valider et Publier">
                                                            <i class="bi bi-broadcast me-1"></i>Publier
                                                        </button>

                                                        <button type="submit" name="status" value="Refusé"
                                                            class="btn btn-sm btn-outline-secondary rounded-pill px-2"
                                                            title="Classer sans suite">
                                                            <i class="bi bi-archive"></i>
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

<div class="premium-glass-card p-4 mb-4 position-relative overflow-hidden">
                    <div class="recruit-bg-glow" style="background: radial-gradient(circle, rgba(13, 202, 240, 0.1) 0%, transparent 70%);"></div>

                    <h2 class="h6 fw-bold text-white mb-4 text-uppercase border-bottom border-light border-opacity-10 pb-2 letter-spacing-2">
                        <i class="bi bi-graph-up me-2 text-info"></i>Analyse des Menaces
                    </h2>

                    <?php if (empty($stats_by_type)): ?>
                        <p class="text-white-50 small text-center">Aucune donnée suffisante pour l'analyse.</p>
                    <?php else: ?>
                        <?php foreach (array_slice($stats_by_type, 0, 5) as $stat): ?>
                            <?php
                                $colorClass = 'info'; 
                                $typeLower = strtolower($stat['type']);
                                
                                if (str_contains($typeLower, 'meurtre') || str_contains($typeLower, 'attaque') || str_contains($typeLower, 'terrorisme')) {
                                    $colorClass = 'danger'; 
                                } elseif (str_contains($typeLower, 'vol') || str_contains($typeLower, 'cambriolage')) {
                                    $colorClass = 'warning'; 
                                }
                            ?>

                            <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded bg-black bg-opacity-25">
                                <span class="text-white-50 small text-uppercase">
                                    <?= htmlspecialchars($stat['type']) ?>
                                </span>
                                <span class="badge bg-<?= $colorClass ?> bg-opacity-10 text-<?= $colorClass ?> border border-<?= $colorClass ?>">
                                    <?= $stat['percent'] ?>%
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="mt-4 pt-3 border-top border-light border-opacity-10">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-cpu text-white-50"></i>
                            <span class="text-white-50 x-small font-mono">CPU SYSTEM: STABLE</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-wifi text-success"></i>
                            <span class="text-success x-small font-mono">NETWORK: SECURE (AES-256)</span>
                        </div>
                    </div>
                </div>

                <div class="premium-glass-card p-4 text-center">
                    <i class="bi bi-fingerprint display-1 text-white opacity-25 mb-3"></i>
                    <h4 class="h6 text-uppercase text-white letter-spacing-2 mb-2">Accès Sécurisé</h4>
                    <p class="text-white-50 x-small mb-0">
                        Session chiffrée. Toute modification est loguée dans les archives du SHIELD.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>