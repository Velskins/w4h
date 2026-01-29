<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow" style="background: radial-gradient(circle, rgba(255, 193, 7, 0.15), transparent 60%);">
    </div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <a href="/citizen/dashboard"
                        class="d-inline-flex align-items-center text-white-50 text-decoration-none font-mono x-small text-uppercase tracking-wide transition-btn hover-text-white">
                        <i class="bi bi-arrow-left me-2"></i> Annuler la candidature
                    </a>
                    <div class="live-badge"
                        style="border-color: rgba(255, 193, 7, 0.3); color: #ffc107; background: rgba(255, 193, 7, 0.1);">
                        <span class="pulse-ring"
                            style="background: #ffc107; box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7);"></span>
                        RECRUITMENT_PROTOCOL
                    </div>
                </div>

                <div class="premium-glass-card p-0 overflow-hidden">

                    <div class="p-4 p-md-5 border-bottom border-white border-opacity-10 position-relative">

                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="icon-box-premium text-warning"
                                style="width: 50px; height: 50px; font-size: 1.5rem;">
                                <i class="bi bi-mask"></i>
                            </div>
                            <h1
                                class="display-6 fw-bold text-white text-uppercase tracking-tight font-tech title-glow mb-0">
                                Devenir un Héros
                            </h1>
                        </div>
                        <p class="text-white-50 font-sans mb-0 ps-1">
                            L'Initiative a besoin de vous. Complétez ce dossier pour rejoindre l'élite.
                        </p>
                    </div>

                    <div class="p-4 p-md-5">

                        <form action="/hero/store" method="POST">

                            <div class="mb-5">
                                <h5
                                    class="text-warning font-mono text-uppercase x-small tracking-widest border-bottom border-warning border-opacity-25 pb-2 mb-4">
                                    01 // Identité Héroïque
                                </h5>

                                <div class="mb-4">
                                    <label for="alias" class="form-label text-white-50 font-sans small">Alias (Nom de
                                        Super-Héros) *</label>
                                    <input type="text" class="form-control text-white font-mono"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                        name="alias" id="alias" placeholder="Ex: IRON MAN, SPIDER-MAN..." required>
                                </div>

                                <div class="mb-4">
                                    <label for="photo_url" class="form-label text-white-50 font-sans small">Photo de
                                        profil (URL) *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0 text-white-50"
                                            style="border-color: rgba(255,255,255,0.1);">
                                            <i class="bi bi-link-45deg"></i>
                                        </span>
                                        <input type="url"
                                            class="form-control text-white font-mono bg-transparent border-start-0"
                                            style="border-color: rgba(255,255,255,0.1);" id="photo_url" name="photo_url"
                                            placeholder="https://exemple.com/mon-costume.jpg" required>
                                    </div>
                                    <div class="form-text text-white-50 x-small font-mono mt-2">Lien direct vers une
                                        image JPG/PNG.</div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h5
                                    class="text-warning font-mono text-uppercase x-small tracking-widest border-bottom border-warning border-opacity-25 pb-2 mb-4">
                                    02 // Capacités & Zone
                                </h5>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Secteur
                                            d'activité</label>
                                        <select name="sector" class="form-select text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                            <option value="Inconnu" class="text-dark">Non défini</option>
                                            <option value="Hell's Kitchen" class="text-dark">Hell's Kitchen</option>
                                            <option value="Madripoor" class="text-dark">Madripoor</option>
                                            <option value="New York" class="text-dark">New York</option>
                                            <option value="Gotham" class="text-dark">Gotham (Hors zone)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Spécialité
                                            Principale</label>
                                        <input type="text" name="specialty" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            placeholder="Ex: Force, Vol, Tech...">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h5
                                    class="text-warning font-mono text-uppercase x-small tracking-widest border-bottom border-warning border-opacity-25 pb-2 mb-4">
                                    03 // Origin Story
                                </h5>

                                <div>
                                    <label class="form-label text-white-50 font-sans small">Votre Histoire</label>
                                    <textarea name="description" class="form-control text-white font-sans"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                        rows="5"
                                        placeholder="Comment avez-vous eu vos pouvoirs ? Pourquoi voulez-vous nous rejoindre ?"></textarea>
                                </div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit"
                                    class="btn btn-warning py-3 fw-bold font-mono text-uppercase tracking-wide shadow-lg"
                                    style="background: linear-gradient(45deg, #ffc107, #ffca2c); border: none; color: #000;">
                                    <i class="bi bi-send-check-fill me-2"></i> Soumettre ma candidature
                                </button>
                                <p class="text-center text-white-50 mt-3 x-small font-mono opacity-50">
                                    <i class="bi bi-shield-lock-fill me-1"></i> Dossier confidentiel. Traitement par le
                                    conseil.
                                </p>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>