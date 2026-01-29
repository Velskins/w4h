<div class="cinematic-wrapper min-vh-100 d-flex align-items-center justify-content-center position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                
                <div class="premium-glass-card p-0 overflow-hidden">
                    <div class="p-4 p-md-5">
                        
                        <div class="text-center mb-4">
                            <i class="bi bi-fingerprint display-1 text-white-50 opacity-50 mb-3 d-block"></i>
                            <h1 class="h3 text-white text-uppercase font-tech fw-bold tracking-wide title-glow">Nouveau Code d'Accès</h1>
                            <p class="text-white-50 font-sans small mb-0">Définissez un nouveau mot de passe pour sécuriser votre compte.</p>
                        </div>

                        <form action="/reset-password" method="POST">
                            
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger border-danger bg-danger bg-opacity-10 text-white font-mono small mb-4">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">

                            <div class="mb-3">
                                <label class="form-label text-white-50 font-mono x-small text-uppercase">Nouveau mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-end-0 text-white-50" style="border-color: rgba(255,255,255,0.1);">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" name="pwd" 
                                           class="form-control text-white font-mono bg-transparent border-start-0" 
                                           style="border-color: rgba(255,255,255,0.1);"
                                           placeholder="••••••••" required minlength="4">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-white-50 font-mono x-small text-uppercase">Confirmation</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-end-0 text-white-50" style="border-color: rgba(255,255,255,0.1);">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                    <input type="password" name="pwd_confirm" 
                                           class="form-control text-white font-mono bg-transparent border-start-0" 
                                           style="border-color: rgba(255,255,255,0.1);"
                                           placeholder="••••••••" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-2 fw-bold font-mono text-uppercase tracking-wide shadow-lg mb-3" 
                                    style="background: rgba(25, 135, 84, 0.2); border: 1px solid #198754; color: #20c997;">
                                <i class="bi bi-check-lg me-2"></i> Valider
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>