<div class="container py-5">

    <div class="mb-4">
        <a href="/incident"
            class="d-inline-flex align-items-center text-black-50 text-decoration-none transition-link">
            <i class="bi bi-arrow-left me-2"></i> <- Retour aux incidents
        </a>
    </div>

    <div class="row g-5">

        <div class="col-lg-7">

            <div class="mb-4">
                <span class="badge bg-primary text-uppercase mb-2"><?= htmlspecialchars($incident['type']) ?></span>
                <h1 class="display-4 fw-bold text-white mb-2"><?= htmlspecialchars($incident['title']) ?></h1>
                <div class="d-flex align-items-center text-white-50 gap-3">
                    <span><i
                            class="bi bi-calendar3 me-2"></i><?= date('d/m/Y à H:i', strtotime($incident['date'])) ?></span>
                    <span><i class="bi bi-person-circle me-2"></i>Signalé par
                        <?= htmlspecialchars($incident['reporter_firstname'] ?? 'Anonyme') ?></span>
                </div>
            </div>

            <div class="card border-0 mb-4"
                style="background: linear-gradient(90deg, #1c3d5a 0%, #162435 100%); border-radius: 10px;">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <small class="text-uppercase text-white-50 fw-bold">Statut actuel</small>
                        <h3 class="text-white fw-bold mb-0 text-uppercase mt-1">
                            <?= htmlspecialchars($incident['status']) ?></h3>
                    </div>
                    <?php if ($incident['status'] === 'En cours'): ?>
                        <div class="text-end">
                            <span class="badge bg-danger p-2 animate-pulse">INTERVENTION EN COURS</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-5">
                <h4 class="text-white fw-bold border-bottom border-secondary pb-2 mb-3">Détails de la situation</h4>
                <p class="text-white lead lh-lg">
                    <?= nl2br(htmlspecialchars($incident['description'])) ?>
                </p>
            </div>

            <?php if (!empty($incident['villain_name'])): ?>
                <div class="alert alert-danger border-0 d-flex align-items-center shadow-lg" role="alert"
                    style="background-color: rgba(220, 53, 69, 0.1); border-left: 4px solid #dc3545 !important;">
                    <i class="bi bi-radioactive fs-1 me-3 text-danger"></i>
                    <div>
                        <h5 class="alert-heading fw-bold mb-1 text-danger">Vilain Identifié !</h5>
                        <p class="mb-0 text-white-50">Attention, <strong
                                class="text-white"><?= htmlspecialchars($incident['villain_name']) ?></strong>
                            (<?= htmlspecialchars($incident['villain_alias']) ?>) a été repéré sur les lieux.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-5">
            <div class="sticky-top" style="top: 100px;">

                <div class="card border-0 shadow-lg text-white mb-4"
                    style="background-color: #162435; border-radius: 15px;">
                    <div class="card-header bg-transparent border-secondary py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-danger"></i>Localisation</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="bg-dark d-flex align-items-center justify-content-center text-white-50"
                            style="height: 250px;">
                            <span><i class="bi bi-map fs-1"></i><br>Map Component</span>
                        </div>
                        <div class="p-4">
                            <h5 class="fw-bold"><?= htmlspecialchars($incident['city']) ?></h5>
                            <p class="text-white-50 mb-0">
                                <?= htmlspecialchars($incident['numero'] . ' ' . ($incident['complement_numero'] ?? '') . ' ' . $incident['street']) ?><br>
                                <?= htmlspecialchars($incident['zipcode']) ?> <?= htmlspecialchars($incident['city']) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-outline-light py-3 fw-bold text-uppercase" disabled>
                        Se porter volontaire (Bientôt)
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    .hover-white:hover {
        color: white !important;
    }

    .transition-link {
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .transition-link:hover {
        transform: translateX(-5px);
    }


    @keyframes pulse {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }
</style>