<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <a href="/citizen/dashboard"
                        class="d-inline-flex align-items-center text-white-50 text-decoration-none font-mono x-small text-uppercase tracking-wide transition-btn hover-text-white">
                        <i class="bi bi-arrow-left me-2"></i> Annuler
                    </a>
                    <div class="live-badge">
                        <span class="pulse-ring bg-danger"></span>
                        SIGNALEMENT_PROTOCOLE_V1
                    </div>
                </div>

                <div class="premium-glass-card p-0 overflow-hidden">

                    <div class="p-4 p-md-5 border-bottom border-white border-opacity-10 position-relative">

                        <h1
                            class="display-5 fw-bold text-white text-uppercase tracking-tight mb-2 font-tech title-glow">
                            Déclarer un Incident
                        </h1>
                        <p class="text-secondary font-sans mb-0">
                            Remplissez ce formulaire avec précision. Les services d'urgence et les héros seront notifiés
                            immédiatement.
                        </p>
                    </div>

                    <div class="p-4 p-md-5">

                        <?php if (isset($error)): ?>
                            <div
                                class="alert alert-danger border-danger bg-danger bg-opacity-10 text-white font-mono small mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form action="/incident/store" method="POST">

                            <div class="mb-5">
                                <h5
                                    class="text-info font-mono text-uppercase x-small tracking-widest border-bottom border-info border-opacity-25 pb-2 mb-4">
                                    01 // Identification de la menace
                                </h5>

                                <div class="mb-4">
                                    <label for="title" class="form-label text-white-50 font-sans small">Titre du
                                        signalement *</label>
                                    <input type="text" class="form-control text-white font-mono"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                        name="title" id="title" placeholder="Ex: BRAQUAGE EN COURS..." required>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label for="type" class="form-label text-white-50 font-sans small">Type
                                            d'incident *</label>
                                        <select class="form-select text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="type" id="type">
                                            <option value="Accident" class="text-dark">Accident</option>
                                            <option value="Braquage" class="text-dark">Braquage / Vol</option>
                                            <option value="Incendie" class="text-dark">Incendie</option>
                                            <option value="Monstre" class="text-dark">Attaque de Monstre</option>
                                            <option value="Catastrophe" class="text-dark">Catastrophe Naturelle</option>
                                            <option value="Autre" class="text-dark">Autre</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="description"
                                        class="form-label text-white-50 font-sans small">Description détaillée</label>
                                    <textarea class="form-control text-white font-mono"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                        name="description" id="description" rows="4"
                                        placeholder="Décrivez la situation, le nombre de personnes en danger, présence de super-vilains..."></textarea>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h5
                                    class="text-warning font-mono text-uppercase x-small tracking-widest border-bottom border-warning border-opacity-25 pb-2 mb-4">
                                    02 // Coordonnées GPS
                                </h5>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-white-50 font-sans small">Numéro *</label>
                                        <input type="number" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="numero" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label text-white-50 font-sans small">Complément</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="complement_numero" placeholder="Bis, Ter, Bâtiment...">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-white-50 font-sans small">Nom de la rue *</label>
                                    <input type="text" class="form-control text-white font-mono"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                        name="street" required>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="form-label text-white-50 font-sans small">Code Postal *</label>
                                        <input type="number" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="zipcode" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label text-white-50 font-sans small">Ville *</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="city" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit"
                                    class="btn btn-danger-neon py-3 fw-bold font-mono text-uppercase tracking-wide shadow-lg">
                                    <i class="bi bi-broadcast me-2 animate-pulse"></i> Transmettre l'alerte
                                </button>
                                <p class="text-center text-white-50 mt-3 x-small font-mono opacity-50">
                                    <i class="bi bi-lock-fill me-1"></i> Connexion sécurisée. Votre signalement est
                                    traçable.
                                </p>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus,
    .form-select:focus {
        background-color: rgba(255, 255, 255, 0.1) !important;
        border-color: var(--neon-cyan) !important;
        box-shadow: 0 0 15px rgba(13, 202, 240, 0.2);
        color: white;
    }

    ::placeholder {
        color: rgba(255, 255, 255, 0.2) !important;
    }
</style>