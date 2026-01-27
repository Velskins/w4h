<?php
$bgImage = '../public/assets/DA/ppspid.png';
?>

<div class="d-flex w-100 min-vh-100 position-relative"
     style="background: url('<?= $bgImage ?>') center/cover no-repeat;">

    <div class="row g-0 w-100">


        <div class="col-lg-6 position-relative d-flex align-items-center justify-content-center p-5">

            <!-- ioverlay (gauche) -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                 style="background: rgba(255, 255, 255, 0.45); z-index: 1;"></div>

            <div class="position-relative w-100"
                 style="z-index: 2; max-width: 500px; color: #162435;">

                <h1 class="display-4 fw-bold mb-5 text-uppercase" style="letter-spacing: 2px;">
                    Inscription
                </h1>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 shadow-sm mb-4">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form action="/register" method="POST" id="registerForm">

                    <h5 class="fw-bold text-uppercase text-secondary mb-4 small"
                        style="letter-spacing: 1px; color: #0f3050">
                        Informations personnelles
                    </h5>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Civilité</label>
                        <select name="gender" class="form-select border-0 shadow-sm py-2 bg-white">
                            <option value="other">Autre</option>
                            <option value="Male">Homme</option>
                            <option value="Femelle">Femme</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Nom *</label>
                            <input type="text" name="lastname"
                                   class="form-control border-0 shadow-sm py-2"
                                   required placeholder="Stark">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Prénom *</label>
                            <input type="text" name="firstname"
                                   class="form-control border-0 shadow-sm py-2"
                                   required placeholder="Tony">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Date de naissance</label>
                        <input type="date" name="birthdate"
                               class="form-control border-0 shadow-sm py-2">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small">N° de portable</label>
                        <input type="text" name="phone"
                               class="form-control border-0 shadow-sm py-2"
                               placeholder="06 12 34 56 78">
                    </div>

            </div>
        </div>


        <div class="col-lg-6 position-relative d-flex align-items-center justify-content-center p-5 text-white">

           <!-- overlay (droite) -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                 style="background: linear-gradient(
                     135deg,
                     rgba(11, 22, 34, 0.95) 0%,
                     rgba(20, 40, 60, 0.70) 100%
                 ); z-index: 1;"></div>

            <div class="position-relative w-100"
                 style="z-index: 2; max-width: 500px;">

                <h5 class="fw-bold text-uppercase mb-4 small"
                    style="color: #00d2ff; letter-spacing: 1px;">
                    Coordonnées *
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-4">
                        <label class="form-label small opacity-75">N° Rue</label>
                        <input type="number" name="street_number"
                               class="form-control border-0 py-2">
                    </div>
                    <div class="col-8">
                        <label class="form-label small opacity-75">Complément</label>
                        <input type="text" name="complement_number"
                               class="form-control border-0 py-2">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small opacity-75">Nom de rue</label>
                    <input type="text" name="street"
                           class="form-control border-0 py-2">
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <label class="form-label small opacity-75">Ville</label>
                        <input type="text" name="city"
                               class="form-control border-0 py-2">
                    </div>
                    <div class="col-6">
                        <label class="form-label small opacity-75">Code Postal</label>
                        <input type="number" name="zipcode"
                               class="form-control border-0 py-2">
                    </div>
                </div>

                <h5 class="fw-bold text-uppercase mb-4 small"
                    style="color: #ff4757; letter-spacing: 1px;">
                    Sécurité *
                </h5>

                <div class="mb-3">
                    <label class="form-label small opacity-75">Email</label>
                    <input type="email" name="email"
                           class="form-control border-0 py-2"
                           required placeholder="heros@avengers.com">
                </div>

                <div class="mb-4">
                    <label class="form-label small opacity-75">Mot de passe</label>
                    <input type="password" name="pwd"
                           class="form-control border-0 py-2"
                           required>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-secondary">
                    <p class="mb-0 small opacity-75">
                        Déjà inscrit ?
                        <a href="/login" class="text-white text-decoration-underline">
                            Se connecter
                        </a>
                    </p>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow text-uppercase"
                            style="background: linear-gradient(90deg, #103050 0%, #205080 100%);
                                   border: 1px solid rgba(255,255,255,0.2);">
                        Inscription
                    </button>
                </div>

                </form>
            </div>
        </div>

    </div>
</div>
