<div class="container py-5">
    
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-uppercase text-black" style="letter-spacing: 2px;">Incidents en cours</h1>
        <p class="lead text-black-50">Restez informés des interventions de nos super-héros près de chez vous.</p>
    </div>

    <div class="d-flex justify-content-center gap-3 mb-5">
        <button class="btn btn-outline-light rounded-pill px-4 active">Tous</button>
        <button class="btn btn-outline-danger rounded-pill px-4">Urgences</button>
        <button class="btn btn-outline-info rounded-pill px-4">En cours</button>
    </div>

    <div class="row g-4">
        
        <?php if (empty($incidents)): ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-shield-check display-1 text-success mb-3"></i>
                <h3 class="text-white">Tout est calme !</h3>
                <p class="text-white-50">Aucun incident n'est signalé pour le moment.</p>
            </div>
        <?php else: ?>
            
            <?php foreach ($incidents as $incident): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-white position-relative overflow-hidden" 
                         style="background-color: #162435; border-radius: 15px; transition: transform 0.3s ease;">
                        
                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <span class="badge rounded-pill bg-primary text-uppercase small shadow">
                                <?= htmlspecialchars($incident['type']) ?>
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center text-white-50 mb-3 small text-uppercase fw-bold">
                                <i class="bi bi-geo-alt-fill me-1 text-danger"></i>
                                <?= htmlspecialchars($incident['city']) ?>
                                <span class="mx-2">•</span>
                                <?= date('d/m H:i', strtotime($incident['date'])) ?>
                            </div>

                            <h4 class="card-title fw-bold mb-3"><?= htmlspecialchars($incident['title']) ?></h4>

                            <p class="card-text text-white-50 mb-4 flex-grow-1">
                                <?= substr(htmlspecialchars($incident['description']), 0, 100) ?>...
                            </p>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top border-secondary">
                                <?php 
                                    $statusColor = match($incident['status']) {
                                        'En attente' => 'text-warning',
                                        'Validé' => 'text-info',
                                        'En cours' => 'text-primary',
                                        'Terminé' => 'text-success',
                                        default => 'text-secondary'
                                    };
                                ?>
                                <span class="d-flex align-items-center fw-bold small <?= $statusColor ?>">
                                    <i class="bi bi-circle-fill me-2" style="font-size: 8px;"></i>
                                    <?= htmlspecialchars($incident['status']) ?>
                                </span>

                                <a href="/incident/show?id=<?= $incident['id'] ?>" class="btn btn-sm btn-light rounded-pill px-3 fw-bold">
                                    Voir <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>