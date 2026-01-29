<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row align-items-end mb-6 pb-4 border-bottom border-white border-opacity-10">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="live-badge">
                        <span class="pulse-ring"></span>
                        LIVE
                    </span>
                    <span class="font-mono text-white-50 x-small"> SYSTEM_V2.4</span>
                </div>

                <h1 class="display-3 fw-bold text-white text-uppercase tracking-tight leading-none mb-2">
                    Flux d'Incidents
                </h1>

                <p class="text-secondary font-sans fs-5" style="max-width: 500px;">
                    Surveillance en temps réel des activités héroïques et menaces urbaines
                </p>

                <div class="mt-4">
                    <a href="/incident/create"
                        class="btn btn-danger-neon px-4 py-2 fw-bold rounded-pill d-inline-flex align-items-center gap-2 font-mono tracking-wide">
                        <i class="bi bi-megaphone-fill"></i>
                        SIGNALER UN DANGER
                    </a>
                </div>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <div class="stat-group">
                    <span
                        class="stat-value text-white font-mono"><?= str_pad(count($incidents ?? []), 2, '0', STR_PAD_LEFT) ?></span>
                    <span class="stat-label text-secondary x-small text-uppercase tracking-2">Menaces Actives</span>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <?php if (empty($incidents)): ?>
                <div class="col-12 py-5">
                    <div class="empty-state-card">
                        <div class="glow-orb bg-success"></div>
                        <i class="bi bi-shield-check display-1 position-relative z-2 text-white"></i>
                        <h3 class="mt-4 text-white text-uppercase tracking-widest">Périmètre Sécurisé</h3>
                        <p class="text-white-50 font-mono">Aucune anomalie détectée pour le moment.</p>

                        <div class="mt-4 position-relative z-2">
                            <a href="/incident/create" class="btn btn-outline-light rounded-pill px-4">
                                Signaler quelque chose
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>

                <?php foreach ($incidents as $incident): ?>
                    <?php
                    $meta = match ($incident['status']) {
                        'En attente' => ['color' => '#fbbf24', 'bg' => 'warning', 'label' => 'Analyse'],
                        'En cours' => ['color' => '#3b82f6', 'bg' => 'primary', 'label' => 'Intervention'],
                        'Validé' => ['color' => '#06b6d4', 'bg' => 'info', 'label' => 'Confirmé'],
                        'Terminé' => ['color' => '#10b981', 'bg' => 'success', 'label' => 'Clôturé'],
                        default => ['color' => '#94a3b8', 'bg' => 'secondary', 'label' => $incident['status']]
                    };
                    ?>

                    <div class="col-md-6 col-lg-4">
                        <a href="/incident/show?id=<?= $incident['id'] ?>" class="data-card group">

                            <div class="card-border-glow" style="--glow-color: <?= $meta['color'] ?>"></div>

                            <div class="card-content">

                                <div class="d-flex justify-content-between align-items-start mb-4">
                                    <div class="d-flex flex-column">
                                        <span class="font-mono x-small text-white-50 mb-1">ID:
                                            #<?= str_pad($incident['id'], 4, '0', STR_PAD_LEFT) ?></span>
                                        <div class="d-flex align-items-center gap-2 text-white small fw-bold text-uppercase">
                                            <i class="bi bi-geo-alt-fill text-<?= $meta['bg'] ?>"></i>
                                            <?= htmlspecialchars($incident['city']) ?>
                                        </div>
                                    </div>

                                    <span class="status-chip" style="--chip-color: <?= $meta['color'] ?>">
                                        <span class="chip-dot"></span>
                                        <?= htmlspecialchars($meta['label']) ?>
                                    </span>
                                </div>

                                <div class="mb-4 position-relative z-2">
                                    <span class="category-tag mb-2"><?= htmlspecialchars($incident['type']) ?></span>
                                    <h3 class="h4 text-white fw-bold mb-2 tracking-wide text-uppercase">
                                        <?= htmlspecialchars($incident['title']) ?>
                                    </h3>
                                    <p class="text-secondary small line-clamp-2 font-sans">
                                        <?= htmlspecialchars($incident['description']) ?>
                                    </p>
                                </div>

                                <div class="card-footer-tech">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-clock-history text-white-50 x-small"></i>
                                        <span class="font-mono text-white-50 x-small">
                                            <?= date('H:i:s', strtotime($incident['date'])) ?>
                                        </span>
                                    </div>
                                    <div class="action-indicator text-white">
                                        <span class="x-small fw-bold me-2">ACCÉDER</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-spot" style="background: <?= $meta['color'] ?>"></div>
                        </a>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>
</div>