<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="mb-5">
            <a href="/incident"
                class="d-inline-flex align-items-center text-white-50 text-decoration-none font-mono x-small text-uppercase tracking-wide transition-btn hover-text-white">
                <i class="bi bi-arrow-left me-2"></i> Retour au flux
            </a>
        </div>

        <div class="row g-5">

            <div class="col-lg-7">

                <div class="mb-5 border-bottom border-white border-opacity-10 pb-4">
                    <span class="category-tag text-info border-info border-opacity-25 mb-3">
                        <?= htmlspecialchars($incident['type']) ?>
                    </span>

                    <h1
                        class="display-3 fw-bold text-white text-uppercase tracking-tight leading-none mb-3 title-glow font-tech">
                        <?= htmlspecialchars($incident['title']) ?>
                    </h1>

                    <div class="d-flex align-items-center text-white-50 gap-4 font-mono small">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-calendar3 me-2 text-info"></i>
                            <?= date('d/m/Y', strtotime($incident['date'])) ?>
                            <span class="text-secondary ms-1"><?= date('H:i', strtotime($incident['date'])) ?></span>
                        </span>
                        <span class="d-flex align-items-center">
                            <i class="bi bi-person-circle me-2 text-info"></i>
                            Signalé par <?= htmlspecialchars($incident['reporter_firstname'] ?? 'Anonyme') ?>
                        </span>
                    </div>
                </div>

                <?php
                $statusColor = match ($incident['status']) {
                    'En attente' => 'warning', 
                    'En cours' => 'primary', 
                    'Validé' => 'info',    
                    'Terminé' => 'success', 
                    default => 'secondary'
                };
                ?>
                <div class="premium-glass-card p-4 mb-4 position-relative overflow-hidden">
                    <div class="card-glow-effect bg-<?= $statusColor ?>"></div>

                    <div class="d-flex align-items-center justify-content-between position-relative z-2">
                        <div>
                            <span class="d-block text-white-50 x-small font-mono text-uppercase mb-1">État du
                                dossier</span>
                            <div class="status-indicator status-<?= $statusColor ?> fs-5">
                                <?= htmlspecialchars($incident['status']) ?>
                            </div>
                        </div>

                        <?php if ($incident['status'] === 'En cours'): ?>
                            <div class="text-end">
                                <span
                                    class="badge bg-danger bg-opacity-25 text-danger border border-danger animate-pulse font-mono">
                                    INTERVENTION EN COURS
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-5">
                    <h4
                        class="h6 text-secondary text-uppercase x-small tracking-widest border-bottom border-white border-opacity-10 pb-2 mb-3 font-mono">
                        Rapport de situation
                    </h4>
                    <p class="text-white lead font-sans lh-lg opacity-75">
                        <?= nl2br(htmlspecialchars($incident['description'])) ?>
                    </p>
                </div>

                <?php if (!empty($incident['villain_name'])): ?>
                    <div class="premium-glass-card p-4 position-relative overflow-hidden"
                        style="border-color: rgba(220, 53, 69, 0.4);">
                        <div class="recruit-bg-glow"
                            style="background: radial-gradient(circle, rgba(220, 53, 69, 0.15) 0%, transparent 70%);"></div>

                        <div class="d-flex align-items-start gap-4 position-relative z-2">
                            <div class="icon-box-premium text-danger border-danger">
                                <i class="bi bi-radioactive"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold text-danger text-uppercase mb-1 letter-spacing-1 font-tech">Menace
                                    Identifiée</h5>
                                <p class="mb-0 text-white-50 small font-sans">
                                    Les scanners ont détecté la présence de
                                    <strong
                                        class="text-white text-uppercase"><?= htmlspecialchars($incident['villain_name']) ?></strong>
                                    <span
                                        class="font-mono text-danger opacity-75">(<?= htmlspecialchars($incident['villain_alias']) ?>)</span>.
                                    Niveau de vigilance maximal requis.
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-5">
                <div class="sticky-top" style="top: 100px;">

                    <div class="premium-glass-card p-0 mb-4 overflow-hidden">
                        <div class="p-3 border-bottom border-white border-opacity-10 bg-white bg-opacity-05">
                            <h5
                                class="mb-0 fw-bold text-white text-uppercase h6 d-flex align-items-center gap-2 font-mono">
                                <i class="bi bi-crosshair text-danger"></i> Localisation Cible
                            </h5>
                        </div>

                        <div class="bg-black bg-opacity-50 d-flex align-items-center justify-content-center position-relative"
                            style="height: 250px;">
                            <div class="grid-lines opacity-25"></div>
                            <div class="text-center position-relative z-2">
                                <i class="bi bi-map display-4 text-white-50 mb-2"></i>
                                <span class="d-block text-white-50 font-mono x-small text-uppercase">Système de
                                    cartographie</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <h5 class="fw-bold text-white font-tech h4 mb-1"><?= htmlspecialchars($incident['city']) ?>
                            </h5>
                            <p class="text-white-50 mb-0 font-mono small">
                                <?= htmlspecialchars($incident['numero'] . ' ' . ($incident['complement_numero'] ?? '') . ' ' . $incident['street']) ?><br>
                                CODE: <?= htmlspecialchars($incident['zipcode']) ?>
                            </p>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button
                            class="btn btn-outline-light py-3 fw-bold text-uppercase font-mono tracking-wide opacity-50"
                            disabled style="border-style: dashed;">
                            <i class="bi bi-shield-lock me-2"></i> Zone Réservée
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>