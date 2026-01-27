<div class="container-fluid p-4">
    <h1 class="display-3 fw-bold mb-5 text-uppercase text-white"><?= htmlspecialchars($title) ?></h1>

    <div class="row g-4">
        <div class="col-lg-8">

            <div class="admin-card p-4 mb-4">
                <h2 class="h4 mb-4 text-uppercase border-bottom pb-2">Demandes de super-héros</h2>
                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom align-middle">
                        <thead class="text-secondary text-uppercase small">
                            <tr>
                                <th>Citoyen</th>
                                <th>Date de demande</th>
                                <th>Situation</th>
                                <th class="text-center">Décision</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pending_heroes)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Aucune demande en attente.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pending_heroes as $hero): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($hero['firstname'] . ' ' . $hero['lastname']) ?></td>
                                        <td><?= htmlspecialchars($hero['birthdate']) ?></td>
                                        <td><span class="badge bg-warning text-dark">En attente</span></td>
                                        <td class="text-center">
                                            <form action="/admin/hero/validate" method="POST">
                                                <input type="hidden" name="user_id" value="<?= $hero['id'] ?>">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" name="decision" value="approve"
                                                        class="btn btn-outline-info" title="Valider ce héros">
                                                        <i class="bi bi-check-lg"></i> Approuver
                                                    </button>
                                                    <button type="submit" name="decision" value="reject"
                                                        class="btn btn-outline-danger" title="Refuser la demande"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir refuser cette candidature ?');">
                                                        <i class="bi bi-x-lg"></i> Refuser
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-card p-4">
                <h2 class="h4 mb-4 text-uppercase border-bottom pb-2 text-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>Incidents Signalés
                </h2>

                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom align-middle">
                        <thead class="text-secondary text-uppercase small">
                            <tr>
                                <th>Date</th>
                                <th>Incident</th>
                                <th>Lieu</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pending_incidents)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Aucun incident à valider. Tout va
                                        bien !</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pending_incidents as $incident): ?>
                                    <tr>
                                        <td class="text-white-50 small">
                                            <?= date('d/m H:i', strtotime($incident['date'])) ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold"><?= htmlspecialchars($incident['title']) ?></div>
                                            <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                                <?= htmlspecialchars($incident['description']) ?>
                                            </small>
                                            <span
                                                class="badge bg-secondary small mt-1"><?= htmlspecialchars($incident['type']) ?></span>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($incident['city']) ?><br>
                                            <small class="text-muted"><?= htmlspecialchars($incident['zipcode']) ?></small>
                                        </td>
                                        <td class="text-center">
                                            <form action="/admin/incident/validate" method="POST">
                                                <input type="hidden" name="id" value="<?= $incident['id'] ?>">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" name="status" value="Validé" class="btn btn-success"
                                                        title="Valider">
                                                        <i class="bi bi-check-lg"></i>
                                                    </button>
                                                    <button type="submit" name="status" value="Refusé"
                                                        class="btn btn-outline-danger" title="Refuser">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="admin-card p-4 h-100">
                <h2 class="h4 mb-4 text-uppercase border-bottom pb-2">Statistiques</h2>

                <div class="stat-row d-flex justify-content-between align-items-center">
                    <span>Vols en tout genre</span>
                    <span class="badge bg-primary">38%</span>
                </div>
                <div class="mt-4 pt-3 border-top border-secondary">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Citoyens secourus</span>
                        <span class="fw-bold text-info"><?= $total_users ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sup-vilains identifiés</span>
                        <span class="fw-bold text-danger"><?= $total_villains ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Incidents traités</span>
                        <span class="fw-bold text-warning"><?= $total_incidents ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>