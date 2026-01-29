<div class="cinematic-wrapper min-vh-100 position-relative">

    <div class="ambient-glow"></div>
    <div class="noise-texture"></div>
    <div class="grid-lines"></div>

    <div class="container py-5 position-relative z-2">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <a href="/profile"
                        class="d-inline-flex align-items-center text-white-50 text-decoration-none font-mono x-small text-uppercase tracking-wide transition-btn hover-text-white">
                        <i class="bi bi-arrow-left me-2"></i> Annuler les modifications
                    </a>
                    <div class="live-badge">
                        <span class="pulse-ring bg-info"></span>
                        EDIT_MODE
                    </div>
                </div>

                <div class="premium-glass-card p-0 overflow-hidden">

                    <div class="p-4 p-md-5 border-bottom border-white border-opacity-10 position-relative">

                        <h2
                            class="display-5 fw-bold text-white text-uppercase tracking-tight mb-2 font-tech title-glow">
                            <?= htmlspecialchars($title) ?>
                        </h2>
                        <p class="text-secondary font-sans mb-0">
                            Mise à jour des données biométriques et géographiques du citoyen.
                        </p>
                    </div>

                    <div class="p-4 p-md-5">

                        <form action="/profile/edit" method="POST">

                            <div class="mb-5">
                                <h5
                                    class="text-info font-mono text-uppercase x-small tracking-widest border-bottom border-info border-opacity-25 pb-2 mb-4">
                                    01 // Identité Civile
                                </h5>

                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Prénom *</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Nom *</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Email *</label>
                                        <input type="email" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Téléphone</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Genre</label>
                                        <select class="form-select text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="gender">
                                            <option value="other" class="text-dark" <?= $user['gender'] === 'other' ? 'selected' : '' ?>>Autre</option>
                                            <option value="Male" class="text-dark" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Homme</option>
                                            <option value="Femelle" class="text-dark" <?= $user['gender'] === 'Femelle' ? 'selected' : '' ?>>Femme</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Date de
                                            naissance</label>
                                        <input type="date" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="birthdate" value="<?= htmlspecialchars($user['birthdate']) ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h5
                                    class="text-warning font-mono text-uppercase x-small tracking-widest border-bottom border-warning border-opacity-25 pb-2 mb-4">
                                    02 // Localisation
                                </h5>

                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-sans small">Numéro</label>
                                        <input type="number" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="street_number"
                                            value="<?= htmlspecialchars($user['street_number'] ?? '') ?>">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-sans small">Complément</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="complement_number"
                                            value="<?= htmlspecialchars($user['complement_number'] ?? '') ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white-50 font-sans small">Rue</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="street" value="<?= htmlspecialchars($user['street'] ?? '') ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-white-50 font-sans small">Code Postal</label>
                                        <input type="number" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="zipcode" value="<?= htmlspecialchars($user['zipcode'] ?? '') ?>">
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label text-white-50 font-sans small">Ville</label>
                                        <input type="text" class="form-control text-white font-mono"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
                                            name="city" value="<?= htmlspecialchars($user['city'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="d-flex justify-content-end align-items-center gap-3 pt-3 border-top border-white border-opacity-10">

                                <button type="submit"
                                    class="btn btn-info py-2 px-4 fw-bold font-mono text-uppercase tracking-wide shadow-lg">
                                    <i class="bi bi-save-fill me-2"></i> Enregistrer
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="bg-black bg-opacity-25 p-2 px-4 d-flex justify-content-between align-items-center">
                        <span class="font-mono x-small text-white-50">STATUS: WAITING_INPUT</span>
                        <span class="font-mono x-small text-success"><i class="bi bi-wifi me-1"></i>CONNECTED</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>