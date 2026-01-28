<div class="py-5 min-vh-100 hero-dashboard-bg max-vw-100">
    
    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold text-uppercase">L'Alliance des Héros</h1>
        <p class="lead text-muted">Découvrez les protecteurs qui veillent sur notre ville.</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="input-group input-group-lg shadow-sm">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" id="searchHeroInput" class="form-control border-start-0 ps-0" placeholder="Rechercher un héros par son nom..." aria-label="Rechercher">
            </div>
        </div>
    </div>

    <?php if (empty($heroes)): ?>
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle me-2"></i>Aucun super-héros n'est référencé pour le moment.
        </div>
    <?php else: ?>
        <div class="row g-4 d-flex justify-content-center" id="heroesContainer">
            <?php foreach ($heroes as $hero): ?>
                
                <div class="col-md-6 col-lg-4 col-xl-3 hero-item">
                    <div class="card h-100 border-0 shadow-sm hero-card overflow-hidden" style="background-color: #f8f9fa;">
                        
                        <div class="position-relative" style="height: 250px; overflow: hidden;">
                            <img src="<?= htmlspecialchars($hero['photo_path'] ?: '/assets/images/default_hero.png') ?>" 
                                 class="w-100 h-100 object-fit-cover transition-transform" 
                                 alt="<?= htmlspecialchars($hero['alias']) ?>">
                            
                            <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" 
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <small class="text-uppercase fw-bold">
                                    <i class="bi bi-geo-alt-fill text-warning me-1"></i>
                                    <?= htmlspecialchars($hero['sector'] ?? 'Secteur Inconnu') ?>
                                </small>
                            </div>
                        </div>

                        <div class="card-body text-center">
                            <h2 class="h5 fw-bold text-uppercase mb-1 text-dark hero-name"><?= htmlspecialchars($hero['alias']) ?></h2>
                            <p class="text-primary small fw-bold mb-3"><?= htmlspecialchars($hero['specialty']) ?></p>
                            
                            <p class="card-text text-muted small text-truncate" style="max-width: 100%;">
                                <?= htmlspecialchars($hero['description'] ?? 'Pas de description disponible.') ?>
                            </p>
                        </div>
                        
                        <div class="card-footer bg-transparent border-0 pb-4 text-center">
                            <span class="badge bg-dark text-warning rounded-pill px-3 py-2">Héros Certifié</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div id="noResults" class="text-center py-5 d-none">
            <i class="bi bi-emoji-frown display-4 text-muted mb-3"></i>
            <p class="text-muted">Aucun héros ne correspond à votre recherche.</p>
        </div>

    <?php endif; ?>

</div>

<style>
        .hero-dashboard-bg {
        background: linear-gradient(rgba(23, 32, 42, 0.2), rgba(23, 32, 42, 0.5)), url('/public/assets/background/Background9.png');
        
        background-size: cover;
        background-position: center top;
        background-attachment: fixed;
        min-height: 100vh;
        
        margin-top: -1.5rem !important; 
        margin-bottom: -1.5rem !important;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }
    .hero-card:hover .transition-transform { transform: scale(1.05); }
    .transition-transform { transition: transform 0.3s ease; }
    .hero-card { transition: box-shadow 0.3s ease, transform 0.3s ease; }
    .hero-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important; transform: translateY(-5px); }
    .object-fit-cover { object-fit: cover; }
    
    .form-control:focus { box-shadow: none; border-color: #ced4da; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchHeroInput');
    const heroItems = document.querySelectorAll('.hero-item');
    const noResultsMsg = document.getElementById('noResults');

    if(searchInput) {
        searchInput.addEventListener('keyup', function(e) {
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