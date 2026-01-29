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