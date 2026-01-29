<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row align-items-end mb-5 pb-4 border-bottom border-white border-opacity-10">
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="live-badge">
                        <span class="pulse-ring bg-warning"></span>
                        ONLINE
                    </span>
                    <span class="font-mono text-white-50 x-small"> DATABASE_V1.0</span>
                </div>
                <h1 class="display-3 fw-bold text-white text-uppercase tracking-tight leading-none mb-2">
                    L'Alliance
                </h1>
                <p class="text-secondary font-sans fs-5" style="max-width: 500px;">
                    Répertoire officiel des protecteurs actifs et certifiés.
                </p>
            </div>

            <div class="col-lg-5 text-lg-end">
                <div class="position-relative search-tech-wrapper mt-4 mt-lg-0">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="searchHeroInput" class="form-control tech-input font-mono"
                        placeholder="RECHERCHER UN HÉROS..." aria-label="Rechercher">
                    <div class="search-border-effect"></div>
                </div>
            </div>
        </div>

        <?php if (empty($heroes)): ?>
            <div class="col-12 py-5">
                <div class="empty-state-card">
                    <div class="glow-orb bg-info"></div>
                    <i class="bi bi-person-x display-1 position-relative z-2 text-white"></i>
                    <h3 class="mt-4 text-white text-uppercase tracking-widest">Base de données vide</h3>
                    <p class="text-white-50 font-mono">Aucun héros n'est enregistré dans le système.</p>
                </div>
            </div>
        <?php else: ?>

            <div class="row g-4" id="heroesContainer">
                <?php foreach ($heroes as $hero): ?>

                    <div class="col-md-6 col-lg-4 col-xl-3 hero-item">

                        <div class="data-card group h-100">
                            <div class="card-border-glow" style="--glow-color: #ffc107"></div>

                            <div class="card-content p-0 d-flex flex-column h-100">

                                <div class="hero-image-frame position-relative">
                                    <div class="image-overlay"></div>
                                    <img src="<?= htmlspecialchars($hero['photo_path'] ?: '/assets/images/default_hero.png') ?>"
                                        class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($hero['alias']) ?>">

                                    <div class="sector-badge font-mono x-small fw-bold">
                                        <i class="bi bi-geo-alt-fill text-warning me-1"></i>
                                        <?= htmlspecialchars($hero['sector'] ?? 'N/A') ?>
                                    </div>
                                </div>

                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h2
                                            class="h4 text-white fw-bold mb-0 tracking-wide text-uppercase hero-name title-glow">
                                            <?= htmlspecialchars($hero['alias']) ?>
                                        </h2>
                                    </div>

                                    <div class="mb-3">
                                        <span class="category-tag text-warning border-warning border-opacity-25">
                                            <?= htmlspecialchars($hero['specialty']) ?>
                                        </span>
                                    </div>

                                    <p class="text-secondary small line-clamp-3 font-sans mb-4 flex-grow-1">
                                        <?= htmlspecialchars($hero['description'] ?? 'Aucune description disponible pour cet agent.') ?>
                                    </p>

                                    <div
                                        class="pt-3 border-top border-white border-opacity-10 d-flex justify-content-between align-items-center mt-auto">
                                        <span class="status-chip" style="--chip-color: #ffc107">
                                            <span class="chip-dot"></span>
                                            CERTIFIÉ
                                        </span>
                                        <i class="bi bi-shield-check text-white-50"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="bg-spot" style="background: #ffc107"></div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <div id="noResults" class="text-center py-5 d-none">
                <div class="empty-state-card py-4">
                    <i class="bi bi-search display-4 text-white-50 mb-3"></i>
                    <p class="text-white font-mono">Aucune correspondance trouvée dans les archives.</p>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=JetBrains+Mono:wght@400;500&family=Rajdhani:wght@500;600;700&display=swap');

    :root {
        --bg-void: #030305;
        --card-surface: rgba(255, 255, 255, 0.02);
        --border-subtle: rgba(255, 255, 255, 0.06);
        --text-main: #ffffff;
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
        padding-top: 4rem !important;
        padding-bottom: 4rem !important;
    }

    .ambient-glow {
        position: absolute;
        top: -20%;
        left: 0;
        right: 0;
        height: 80vh;
        background: radial-gradient(ellipse at top, rgba(255, 193, 7, 0.1), transparent 70%);
        pointer-events: none;
        z-index: 0;
    }

    .noise-texture {
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.07;
        pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }

    .grid-lines {
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 60px 60px;
        mask-image: radial-gradient(circle at center, black 30%, transparent 80%);
    }

    .font-sans {
        font-family: 'Inter', sans-serif;
    }

    .font-mono {
        font-family: 'JetBrains Mono', monospace;
    }

    .tracking-tight {
        letter-spacing: -1px;
    }

    .tracking-wide {
        letter-spacing: 1px;
    }

    .tracking-widest {
        letter-spacing: 3px;
    }

    .leading-none {
        line-height: 1;
    }

    .x-small {
        font-size: 0.75rem;
    }

    .live-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px;
        border-radius: 100px;
        background: rgba(255, 193, 7, 0.1);
        border: 1px solid rgba(255, 193, 7, 0.3);
        color: #ffc107;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .pulse-ring {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7);
        animation: pulse-yellow 2s infinite;
    }

    @keyframes pulse-yellow {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(255, 193, 7, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(255, 193, 7, 0);
        }
    }

    .data-card {
        display: block;
        position: relative;
        background: var(--card-surface);
        border: 1px solid var(--border-subtle);
        border-radius: 2px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .card-content {
        position: relative;
        z-index: 2;
        backdrop-filter: blur(10px);
    }

    .card-border-glow {
        position: absolute;
        inset: 0;
        z-index: 1;
        opacity: 0;
        box-shadow: inset 0 0 0 1px var(--glow-color);
        transition: opacity 0.3s ease;
    }

    .data-card:hover .card-border-glow {
        opacity: 1;
    }

    .data-card:hover {
        transform: translateY(-4px);
    }

    .bg-spot {
        position: absolute;
        width: 200px;
        height: 200px;
        top: -50px;
        right: -50px;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.15;
        z-index: 0;
        transition: opacity 0.3s, transform 0.5s;
    }

    .data-card:hover .bg-spot {
        opacity: 0.25;
        transform: scale(1.2);
    }

    /* Image du héros spécifique */
    .hero-image-frame {
        height: 220px;
        overflow: hidden;
        border-bottom: 1px solid var(--border-subtle);
    }

    .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(3, 3, 5, 0.9), transparent);
        z-index: 1;
    }

    .sector-badge {
        position: absolute;
        bottom: 10px;
        left: 15px;
        z-index: 2;
        color: white;
        background: rgba(0, 0, 0, 0.6);
        padding: 4px 8px;
        border-radius: 4px;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Chips et Tags */
    .status-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.65rem;
        text-transform: uppercase;
        color: var(--chip-color);
        border: 1px solid var(--chip-color);
        padding: 4px 8px;
        border-radius: 2px;
        background: rgba(0, 0, 0, 0.3);
    }

    .chip-dot {
        width: 4px;
        height: 4px;
        background: var(--chip-color);
        box-shadow: 0 0 5px var(--chip-color);
    }

    .category-tag {
        display: inline-block;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        padding: 2px 6px;
        border-radius: 2px;
    }

    /* Helpers texte */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .title-glow {
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
    }

    /* --- BARRE DE RECHERCHE CUSTOM TECH --- */
    .search-tech-wrapper {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.03);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 5px 15px;
        transition: all 0.3s;
    }

    .search-tech-wrapper:focus-within {
        background: rgba(255, 255, 255, 0.05);
        border-bottom-color: #fff;
    }

    .tech-input {
        background: transparent !important;
        border: none !important;
        color: white !important;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: none !important;
    }

    .tech-input::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    .search-icon {
        color: rgba(255, 255, 255, 0.5);
        font-size: 1.2rem;
        margin-right: 10px;
    }

    /* Empty state */
    .empty-state-card {
        border: 1px dashed rgba(255, 255, 255, 0.1);
        padding: 4rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.02) 0%, transparent 70%);
    }

    .glow-orb {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.2;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchHeroInput');
        const heroItems = document.querySelectorAll('.hero-item');
        const noResultsMsg = document.getElementById('noResults');

        if (searchInput) {
            searchInput.addEventListener('keyup', function (e) {
                const searchText = e.target.value.toLowerCase();
                let hasVisibleHero = false;

                heroItems.forEach(item => {
                    const heroName = item.querySelector('.hero-name').textContent.toLowerCase();

                    if (heroName.includes(searchText)) {
                        item.classList.remove('d-none');
                        hasVisibleHero = true;
                    } else {
                        item.classList.add('d-none');
                    }
                });

                if (!hasVisibleHero) {
                    noResultsMsg.classList.remove('d-none');
                } else {
                    noResultsMsg.classList.add('d-none');
                }
            });
        }
    });
</script>