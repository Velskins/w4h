<div class="cinematic-wrapper min-vh-100 d-flex align-items-center justify-content-center position-relative">

    <div class="ambient-glow" style="background: radial-gradient(circle, rgba(13, 202, 240, 0.15), transparent 60%);"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                
                <div class="premium-glass-card p-0 overflow-hidden">
                    <div class="p-4 p-md-5">
                        
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock display-1 text-info opacity-50 mb-3 d-block"></i>
                            <h1 class="h3 text-white text-uppercase font-tech fw-bold tracking-wide title-glow">Récupération d'accès</h1>
                            <p class="text-white-50 font-sans small mb-0">Entrez votre identifiant pour initier le protocole de réinitialisation.</p>
                        </div>

                        <form action="/forgot-password" method="POST">
                            
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger border-danger bg-danger bg-opacity-10 text-white font-mono small mb-4">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <div class="mb-4">
                                <label class="form-label text-white-50 font-mono x-small text-uppercase">Email Sécurisé</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-end-0 text-white-50" style="border-color: rgba(255,255,255,0.1);">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" name="email" 
                                           class="form-control text-white font-mono bg-transparent border-start-0" 
                                           style="border-color: rgba(255,255,255,0.1);"
                                           placeholder="nom@w4h.com" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info w-100 py-2 fw-bold font-mono text-uppercase tracking-wide shadow-lg mb-4" 
                                    style="background: rgba(13, 202, 240, 0.2); border: 1px solid #0dcaf0; color: #0dcaf0;">
                                <i class="bi bi-send me-2"></i> Envoyer le lien
                            </button>
                            
                            <div class="text-center">
                                <a href="/login" class="text-decoration-none text-white-50 font-mono x-small text-uppercase hover-text-white transition-btn">
                                    <i class="bi bi-arrow-left me-1"></i> Retour connexion
                                </a>
                            </div>

                        </form>
                    </div>
                    
                    <div class="bg-black bg-opacity-25 p-2 text-center border-top border-white border-opacity-10">
                        <span class="font-mono x-small text-white-50 opacity-50">SECURE_CHANNEL_V2.4</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>