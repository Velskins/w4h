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
            </div>

            <div class="col-lg-4 text-lg-end">
                <div class="stat-group">
                    <span class="stat-value text-white font-mono"><?= str_pad(count($incidents ?? []), 2, '0', STR_PAD_LEFT) ?></span>
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
                    </div>
                </div>
            <?php else: ?>

                <?php foreach ($incidents as $incident): ?>
                    <?php

                    $meta = match($incident['status']) {
                        'En attente' => ['color' => '#fbbf24', 'bg' => 'warning', 'label' => 'Analyse'],
                        'En cours'   => ['color' => '#3b82f6', 'bg' => 'primary', 'label' => 'Intervention'],
                        'Validé'     => ['color' => '#06b6d4', 'bg' => 'info',    'label' => 'Confirmé'],
                        'Terminé'    => ['color' => '#10b981', 'bg' => 'success', 'label' => 'Clôturé'],
                        default      => ['color' => '#94a3b8', 'bg' => 'secondary','label' => $incident['status']]
                    };
                    ?>

                    <div class="col-md-6 col-lg-4">
                        <a href="/incident/show?id=<?= $incident['id'] ?>" class="data-card group">

                            <div class="card-border-glow" style="--glow-color: <?= $meta['color'] ?>"></div>

                            <div class="card-content">

                                <div class="d-flex justify-content-between align-items-start mb-4">
                                    <div class="d-flex flex-column">
                                        <span class="font-mono x-small text-white-50 mb-1">ID: #<?= str_pad($incident['id'], 4, '0', STR_PAD_LEFT) ?></span>
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

<style>

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=JetBrains+Mono:wght@400;500&family=Rajdhani:wght@500;600;700&display=swap');

    :root {
        --bg-void: #030305;
        --card-surface: rgba(255, 255, 255, 0.02);
        --border-subtle: rgba(255, 255, 255, 0.06);
        --text-main: #ffffff;
        --text-muted: #888888;
    }


    .cinematic-wrapper {
        background-color: var(--bg-void);


        background-image:
                linear-gradient(rgba(3, 3, 5, 0.85), rgba(3, 3, 5, 0.95)),
                url('/public/assets/background/Background9.png');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        font-family: 'Rajdhani', sans-serif;
        color: var(--text-main);
        overflow-x: hidden;



        margin-bottom: -1.5rem !important;
        padding-top: 4rem !important;
        padding-bottom: 4rem !important;
    }


    .ambient-glow {
        position: absolute; top: -20%; left: 0; right: 0; height: 80vh;
        background: radial-gradient(ellipse at top, rgba(56, 189, 248, 0.15), transparent 70%);
        pointer-events: none; z-index: 0;
    }

    .noise-texture {
        position: absolute; inset: 0; z-index: 0; opacity: 0.07; pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }

    .grid-lines {
        position: absolute; inset: 0; z-index: 0; pointer-events: none;
        background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        background-size: 60px 60px;
        mask-image: radial-gradient(circle at center, black 30%, transparent 80%);
    }


    .font-sans { font-family: 'Inter', sans-serif; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    .tracking-tight { letter-spacing: -1px; }
    .tracking-wide { letter-spacing: 1px; }
    .tracking-widest { letter-spacing: 3px; }
    .leading-none { line-height: 1; }
    .x-small { font-size: 0.75rem; }
    .mb-6 { margin-bottom: 4rem; }


    .live-badge {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 12px; border-radius: 100px;
        background: rgba(220, 38, 38, 0.1); border: 1px solid rgba(220, 38, 38, 0.3);
        color: #ef4444; font-family: 'JetBrains Mono', monospace; font-size: 0.7rem; font-weight: 700;
    }
    .pulse-ring {
        width: 6px; height: 6px; border-radius: 50%; background: #ef4444;
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
        animation: pulse-red 2s infinite;
    }
    .stat-value { font-size: 3rem; line-height: 1; display: block; }


    .data-card {
        display: block; position: relative; height: 100%; text-decoration: none;
        background: var(--card-surface);
        border: 1px solid var(--border-subtle);
        border-radius: 2px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .card-content {
        padding: 2rem; position: relative; z-index: 2; height: 100%;
        display: flex; flex-direction: column;
        backdrop-filter: blur(10px);
    }


    .card-border-glow {
        position: absolute; inset: 0; z-index: 1; opacity: 0;
        box-shadow: inset 0 0 0 1px var(--glow-color);
        transition: opacity 0.3s ease;
    }
    .data-card:hover .card-border-glow { opacity: 1; }
    .data-card:hover { transform: translateY(-4px); }


    .bg-spot {
        position: absolute; width: 200px; height: 200px; top: -50px; right: -50px;
        border-radius: 50%; filter: blur(80px); opacity: 0.15; z-index: 0;
        transition: opacity 0.3s, transform 0.5s;
    }
    .data-card:hover .bg-spot { opacity: 0.25; transform: scale(1.2); }


    .status-chip {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'JetBrains Mono', monospace; font-size: 0.65rem; text-transform: uppercase;
        color: var(--chip-color); border: 1px solid var(--chip-color);
        padding: 4px 8px; border-radius: 2px;
        background: rgba(0,0,0,0.3);
    }
    .chip-dot { width: 4px; height: 4px; background: var(--chip-color); box-shadow: 0 0 5px var(--chip-color); }


    .category-tag {
        display: inline-block; font-family: 'JetBrains Mono', monospace; font-size: 0.7rem;
        color: rgba(255,255,255,0.5); border: 1px solid rgba(255,255,255,0.1);
        padding: 2px 6px; border-radius: 2px;
    }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }


    .card-footer-tech {
        margin-top: auto; padding-top: 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.05);
        display: flex; justify-content: space-between; align-items: center;
    }
    .action-indicator {
        opacity: 0; transform: translateX(-10px); transition: all 0.3s ease;
    }
    .data-card:hover .action-indicator { opacity: 1; transform: translateX(0); }


    .empty-state-card {
        border: 1px dashed rgba(255,255,255,0.1);
        padding: 4rem; text-align: center; position: relative; overflow: hidden;
        background: radial-gradient(circle, rgba(255,255,255,0.02) 0%, transparent 70%);
    }
    .glow-orb {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 100px; height: 100px; border-radius: 50%; filter: blur(60px); opacity: 0.2;
    }

    @keyframes pulse-red { 0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); } 100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); } }
</style>
