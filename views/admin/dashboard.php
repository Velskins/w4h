

<div class="container-fluid p-4">
    <h1 class="display-3 fw-bold mb-5 text-uppercase text-white"><?= htmlspecialchars($title) ?></h1>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="admin-card p-4 h-100">
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
                                                <td><?= htmlspecialchars($hero['birthdate']) ?></td> <td>En attente</td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-info">Approuver</button>
                                                        <button class="btn btn-outline-danger">Refuser</button>
                                                    </div>
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
                <div class="stat-row d-flex justify-content-between align-items-center">
                    <span>Actes terroristes</span>
                    <span class="badge bg-primary">13%</span>
                </div>
                <div class="stat-row d-flex justify-content-between align-items-center">
                    <span>Meurtres</span>
                    <span class="badge bg-primary">24%</span>
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