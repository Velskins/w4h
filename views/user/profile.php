<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row align-items-end mb-5 pb-4 border-bottom border-white border-opacity-10">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="live-badge">
                        <span class="pulse-ring bg-info"></span>
                        SECURE_ID
                    </span>
                    <span class="font-mono text-white-50 x-small"> DATA_ACCESS_GRANTED</span>
                </div>
                <h1 class="display-3 fw-bold text-white text-uppercase tracking-tight leading-none mb-2">
                    Dossier Citoyen
                </h1>
                <p class="text-secondary font-sans fs-5">
                    Consultation des données personnelles et biométriques.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <div class="d-inline-block p-3 border border-white border-opacity-10 rounded bg-black bg-opacity-25">
                    <span class="d-block text-white-50 x-small font-mono text-uppercase mb-1">Dernière Connexion</span>
                    <span class="text-info font-mono"><?= date('d.m.Y H:i') ?></span>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="premium-glass-card h-100 text-center p-5 position-relative overflow-hidden">
                    
                    <div class="card-border-glow" style="--glow-color: #0dcaf0"></div>
                    <div class="bg-spot" style="background: #0dcaf0; top: -20%; left: -20%;"></div>

                    <div class="position-relative z-2">

                        <div class="position-relative d-inline-block mb-4">
                            <div class="avatar-ring"></div>
                            <div class="profile-avatar">
                                <?= strtoupper(mb_substr($user['firstname'], 0, 1)); ?>
                            </div>
                            <div class="status-indicator-absolute bg-success"></div>
                        </div>

                        <h2 class="h3 fw-bold text-white text-uppercase mb-1 title-glow">
                            <?= htmlspecialchars($user['firstname']) ?>
                            <span class="d-block text-info opacity-75"><?= htmlspecialchars($user['lastname']) ?></span>
                        </h2>

                        <div class="mt-3 mb-4">
                            <?php 
                                $roles = json_decode($user['role'], true);
                                foreach($roles as $role): 
                                    $badgeColor = match($role) {
                                        'ROLE_ADMIN' => 'danger',
                                        'ROLE_HERO' => 'warning',
                                        default => 'info'
                                    };
                                    $roleName = match($role) {
                                        'ROLE_ADMIN' => 'ADMINISTRATEUR',
                                        'ROLE_HERO' => 'SUPER-HÉROS',
                                        'ROLE_HERO_PENDING' => 'CANDIDAT',
                                        default => 'CITOYEN'
                                    };
                            ?>
                                <span class="role-badge border-<?= $badgeColor ?> text-<?= $badgeColor ?>">
                                    <?= $roleName ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="d-flex flex-column gap-3 mt-5">
                            <a href="/profile/edit" class="btn btn-outline-light w-100 font-mono text-uppercase tracking-wide position-relative" style="z-index: 10;">
                                <i class="bi bi-pencil-square me-2"></i>Mise à jour
                            </a>
                            <a href="/logout" class="btn btn-outline-danger w-100 font-mono text-uppercase tracking-wide btn-danger-glow position-relative" style="z-index: 10;">
                                <i class="bi bi-power me-2"></i>Déconnexion
                            </a>
                        </div>
                    
                    </div> </div>
            </div>

            <div class="col-lg-8">
                <div class="premium-glass-card h-100 p-0">

                    <div
                        class="p-4 border-bottom border-white border-opacity-10 d-flex justify-content-between align-items-center bg-white bg-opacity-05">
                        <h3 class="h5 text-white text-uppercase mb-0 tracking-wide">
                            <i class="bi bi-cpu me-2 text-white-50"></i>Données Enregistrées
                        </h3>
                        <i class="bi bi-fingerprint text-white-50 fs-4"></i>
                    </div>

                    <div class="p-4 p-md-5">

                        <div class="row g-4 mb-5">
                            <div class="col-12 mb-2">
                                <h4
                                    class="text-secondary text-uppercase x-small tracking-widest border-bottom border-white border-opacity-10 pb-2 mb-3">
                                    Identité Civile</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Prénom</label>
                                    <div class="data-value"><?= htmlspecialchars($user['firstname']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Nom de famille</label>
                                    <div class="data-value"><?= htmlspecialchars($user['lastname']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Date de Naissance</label>
                                    <div class="data-value font-mono"><?= htmlspecialchars($user['birthdate']) ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-group">
                                    <label class="data-label">Contact Électronique</label>
                                    <div class="data-value text-info font-mono"><?= htmlspecialchars($user['email']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-12 mb-2">
                                <h4
                                    class="text-secondary text-uppercase x-small tracking-widest border-bottom border-white border-opacity-10 pb-2 mb-3">
                                    Localisation</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="data-group d-flex align-items-start gap-3">
                                    <i class="bi bi-geo-alt-fill text-white-50 fs-4 mt-1"></i>
                                    <div>
                                        <div class="data-value mb-1">
                                            <?= htmlspecialchars($user['street_number'] ?? '') ?>
                                            <?= htmlspecialchars($user['street'] ?? '') ?>
                                        </div>
                                        <div class="data-value text-white-50 font-mono">
                                            <?= htmlspecialchars($user['zipcode'] ?? '') ?>
                                            <span
                                                class="text-white text-uppercase"><?= htmlspecialchars($user['city'] ?? '') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="p-3 bg-black bg-opacity-25 border-top border-white border-opacity-10 text-end">
                        <span class="font-mono x-small text-white-50">USER_HASH:
                            <?= substr(md5($user['email']), 0, 12) ?>...</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>