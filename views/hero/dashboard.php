<div class="container-fluid p-4">
    
    <div class="row mb-5">
        <div class="col-12">
            <div class="admin-card p-4 text-white d-flex align-items-center gap-4" style="background: linear-gradient(90deg, #162435 0%, #1f3a52 100%); border-left: 5px solid #ffc107;">
                
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; border: 3px solid #fff;">
                    <img src="<?= htmlspecialchars($hero['photo_path'] ?: '/assets/images/default_hero.png') ?>" 
                         alt="<?= htmlspecialchars($hero['alias']) ?>" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <div>
                    <h1 class="h2 text-uppercase fw-bold mb-1"><?= htmlspecialchars($hero['alias']) ?></h1>
                    <div class="d-flex gap-3 text-white-50 small text-uppercase">
                        <span><i class="bi bi-geo-alt me-1"></i><?= htmlspecialchars($hero['sector'] ?? 'Secteur Inconnu') ?></span>
                        <span><i class="bi bi-stars me-1"></i><?= htmlspecialchars($hero['specialty']) ?></span>
                    </div>
                </div>

                <div class="ms-auto text-end d-none d-md-block">
                    <span class="display-6 fw-bold text-warning"><?= count($my_interventions) ?></span>
                    <span class="d-block small text-uppercase opacity-75">Missions totales</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-7">
            <div class="admin-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                    <h2 class="h4 text-uppercase text-danger mb-0">
                        <i class="bi bi-broadcast me-2 animate-pulse"></i>Alertes Prioritaires
                    </h2>
                    <span class="badge bg-danger rounded-pill"><?= count($available_incidents) ?></span>
                </div>

                <?php if (empty($available_incidents)): ?>
                    <div class="text-center py-5 text-muted opacity-50">
                        <i class="bi bi-shield-check display-1"></i>
                        <p class="mt-3">Aucun incident signalé. La ville est calme... pour le moment.</p>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-column gap-3">
                        <?php foreach ($available_incidents as $incident): ?>
                            <div class="p-3 rounded border border-secondary bg-dark text-white position-relative overflow-hidden">
                                <div class="position-absolute top-0 start-0 bottom-0" style="width: 5px; background-color: <?= $incident['priority'] === 'Haute' ? '#dc3545' : ($incident['priority'] === 'Moyenne' ? '#ffc107' : '#0dcaf0') ?>;"></div>
                                
                                <div class="d-flex justify-content-between align-items-start ps-2">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-secondary"><?= htmlspecialchars($incident['type']) ?></span>
                                            <span class="small text-muted"><i class="bi bi-clock me-1"></i><?= date('H:i', strtotime($incident['date'])) ?></span>
                                        </div>
                                        <h3 class="h5 fw-bold mb-1"><?= htmlspecialchars($incident['title']) ?></h3>
                                        <p class="mb-2 text-white-50 small"><?= htmlspecialchars($incident['city']) ?> (<?= htmlspecialchars($incident['zipcode']) ?>)</p>
                                        <p class="mb-0 small text-truncate" style="max-width: 400px;"><?= htmlspecialchars($incident['description']) ?></p>
                                    </div>

                                    <form action="/hero/take" method="POST">
                                        <input type="hidden" name="incident_id" value="<?= $incident['id'] ?>">
                                        <button type="submit" class="btn btn-warning fw-bold text-uppercase btn-sm shadow-sm">
                                            <i class="bi bi-lightning-charge-fill me-1"></i>Intervenir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="admin-card p-4 h-100">
                <h2 class="h4 mb-4 text-uppercase border-bottom pb-2 text-info">
                    <i class="bi bi-journal-text me-2"></i>Journal de Bord
                </h2>

                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom align-middle small">
                        <thead class="text-secondary text-uppercase">
                            <tr>
                                <th>Mission</th>
                                <th>Statut</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($my_interventions)): ?>
                                <tr><td colspan="3" class="text-center py-4 text-muted">Vous n'avez pas encore effectué de mission.</td></tr>
                            <?php else: ?>
                                <?php foreach ($my_interventions as $intervention): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= htmlspecialchars($intervention['title']) ?></div>
                                            <div class="text-muted"><?= date('d/m/Y', strtotime($intervention['date_open'])) ?></div>
                                        </td>
                                        
                                        <td>
                                            <?php if ($intervention['status'] === 'En Cours'): ?>
                                                <span class="badge bg-primary animate-pulse">En Cours</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Terminée</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-end">
                                            <?php if ($intervention['status'] === 'En Cours'): ?>
                                                <form action="/hero/resolve" method="POST">
                                                    <input type="hidden" name="intervention_id" value="<?= $intervention['id'] ?>">
                                                    <input type="hidden" name="incident_id" value="<?= $intervention['incidents_id'] ?>">
                                                    <button type="submit" class="btn btn-outline-success btn-sm" title="Marquer comme résolu">
                                                        <i class="bi bi-check-lg me-1"></i>Terminer
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <span class="text-success"><i class="bi bi-trophy-fill"></i></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.6; }
    100% { opacity: 1; }
}
.animate-pulse {
    animation: pulse 2s infinite;
}
</style>