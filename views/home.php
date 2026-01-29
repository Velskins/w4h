<div class="min-vh-100 d-flex flex-column position-relative overflow-hidden"
    style="background-color: var(--dark-depth);">

    <div class="zoom-bg position-absolute w-100 h-100"
        style="background: url('../public/assets/background/Background-homepage.png') center/cover no-repeat; z-index: 0; transition: transform 0.1s ease-out;">
    </div>

    <div class="noise-texture"></div>
    <div class="grid-lines"></div>
    <div class="position-absolute w-100 h-100"
        style="background: radial-gradient(circle at 50% 50%, transparent 0%, var(--bg-void) 90%); z-index: 0; pointer-events: none;">
    </div>

    <main class="flex-grow-1 d-flex position-relative align-items-center" style="z-index: 2;">

        <div class="container">
            <div class="premium-glass-card p-0 overflow-hidden">

                <div class="recruit-bg-glow"
                    style="background: radial-gradient(circle, rgba(13, 202, 240, 0.1) 0%, transparent 60%); top: -50%; left: -50%;">
                </div>

                <div class="row align-items-center p-5 position-relative z-2">

                    <div class="col-lg-5 offset-lg-1 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="pulse-dot bg-danger"></span>
                            <span class="font-mono text-danger x-small text-uppercase tracking-widest fw-bold">Système
                                d'Alerte Citoyen</span>
                        </div>

                        <h1 class="display-3 fw-bold mb-2 text-white text-uppercase font-tech title-glow leading-none">
                            Signalez un <br><span class="text-stroke">Incident</span>
                        </h1>

                        <h2 class="h5 font-mono text-info mb-5 tracking-wide">
                            <i class="bi bi-shield-check me-2"></i>Nos héros interviennent rapidement
                        </h2>

                        <ul class="list-unstyled d-flex flex-column gap-3">
                            <li class="d-flex align-items-center gap-3 text-white-50">
                                <div class="icon-box-premium text-warning"
                                    style="width: 40px; height: 40px; font-size: 1.2rem;">
                                    <i class="bi bi-broadcast"></i>
                                </div>
                                <div>
                                    <strong class="d-block text-white text-uppercase font-tech h6 mb-0">Temps
                                        Réel</strong>
                                    <span class="font-sans x-small">Signalement géolocalisé instantané</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 text-white-50">
                                <div class="icon-box-premium text-success"
                                    style="width: 40px; height: 40px; font-size: 1.2rem;">
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <div>
                                    <strong
                                        class="d-block text-white text-uppercase font-tech h6 mb-0">Évaluation</strong>
                                    <span class="font-sans x-small">Notez l'efficacité de vos protecteurs</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 text-white-50">
                                <div class="icon-box-premium text-info"
                                    style="width: 40px; height: 40px; font-size: 1.2rem;">
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                                <div>
                                    <strong
                                        class="d-block text-white text-uppercase font-tech h6 mb-0">Information</strong>
                                    <span class="font-sans x-small">Suivez la résolution des menaces</span>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-5">
                            <a href="/incident/create"
                                class="btn btn-danger-neon px-5 py-3 rounded-pill fw-bold font-mono text-uppercase tracking-wide">
                                <i class="bi bi-megaphone-fill me-2"></i> Lancer une alerte
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="ps-lg-5 position-relative">
                            <div class="position-relative p-2 border border-white border-opacity-10 rounded-4"
                                style="background: rgba(0,0,0,0.3);">
                                <div class="corner-accents"></div>
                                <img src="../public/assets/background/map-hp.webp" alt="Carte Interactive"
                                    class="img-fluid rounded-4 shadow-lg w-100"
                                    style="filter: contrast(1.1) saturate(1.1);">

                                <div
                                    class="position-absolute top-50 start-50 translate-middle bg-black bg-opacity-75 p-3 rounded border border-white border-opacity-10 backdrop-blur">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="spinner-border text-info spinner-border-sm" role="status"></div>
                                        <div class="font-mono x-small text-white">SCANNING_SECTOR...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<script>
    window.addEventListener('scroll', function () {
        const scrollValue = window.scrollY;
        const bgImage = document.querySelector('.zoom-bg');

        // Le zoom est conservé tel quel
        const scale = 1 + (scrollValue / 2000);

        if (bgImage) {
            bgImage.style.transform = `scale(${scale})`;
        }
    });
</script>

<style>
    /* Petit ajustement local pour l'effet de cadre */
    .backdrop-blur {
        backdrop-filter: blur(5px);
    }
</style>