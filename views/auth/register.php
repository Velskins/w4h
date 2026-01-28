<main class="auth-page container-fluid p-0">

    <form action="/register" method="POST" class="h-100">

        <div class="row g-0 min-vh-100">

            <div class="col-lg-5 col-12 auth-panel-light d-flex flex-column justify-content-center">

                <div class="auth-content-wrapper mx-auto mt-n4">

                    <h1 class="auth-title mb-3">Inscription</h1>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger py-2 small">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <h6 class="auth-section-title">Informations personnelles</h6>

                    <div class="mb-3">
                        <select name="gender" class="form-select auth-input">
                            <option value="" selected disabled>Civilité</option>
                            <option value="Male">Monsieur</option>
                            <option value="Femelle">Madame</option>
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <input type="text" name="lastname" class="form-control auth-input" placeholder="Nom" required>
                        </div>
                        <div class="col-6">
                            <input type="text" name="firstname" class="form-control auth-input" placeholder="Prénom" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <input type="date" name="birthdate" class="form-control auth-input text-muted">
                    </div>

                    <h6 class="auth-section-title mt-4">Complémentaires</h6>

                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control auth-input" placeholder="N° de portable">
                    </div>

                    <div class="d-lg-none text-center mt-3 text-muted small">
                        Suite du formulaire plus bas <i class="bi bi-arrow-down"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 col-12 auth-panel-dark position-relative d-flex flex-column justify-content-center text-white">

                <div class="auth-overlay"></div>

                <div class="auth-content-wrapper mx-auto position-relative z-2 mt-n4 pt-4">

                    <h6 class="auth-section-title text-light opacity-75">Coordonnées</h6>

                    <div class="mb-3">
                        <input type="text" name="street" class="form-control auth-input" placeholder="Numéro et nom de rue">
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-5">
                            <input type="text" name="zipcode" class="form-control auth-input" placeholder="Code Postal">
                        </div>
                        <div class="col-7">
                            <input type="text" name="city" class="form-control auth-input" placeholder="Ville">
                        </div>
                    </div>

                    <div class="mb-4">
                        <select name="country" class="form-select auth-input">
                            <option value="FR" selected>France</option>
                            <option value="BE">Belgique</option>
                            <option value="CH">Suisse</option>
                        </select>
                    </div>

                    <h6 class="auth-section-title text-light opacity-75 mt-4">Sécurité</h6>

                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <input type="password" name="pwd" class="form-control auth-input" placeholder="Mot de passe" required>
                        </div>
                        <div class="col-6">
                            <input type="password" name="pwd_confirm" class="form-control auth-input" placeholder="Confirmation" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <a href="/login" class="text-white text-decoration-none small opacity-75 hover-opacity-100">
                            Déjà inscrit ? Connexion
                        </a>

                        <button type="submit" class="btn auth-btn px-5">
                            Valider
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </form>
</main>

<style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #fff;
    }
    .auth-page { overflow-x: hidden; }


    .auth-content-wrapper {
        width: 100%;
        max-width: 400px;
        padding: 2rem;

        transition: all 0.3s ease;
    }


    .auth-panel-light {
        background-color: #e3e5e8;
        color: #2c3e50;
    }


    .auth-panel-dark {
        background-image: url('/public/assets/DA/ppspid.png');
        background-size: cover;
        background-position: center center;
    }


    .auth-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
                135deg,
                rgba(20, 30, 48, 0.75) 0%,
                rgba(36, 59, 85, 0.55) 100%
        );
        z-index: 1;
    }


    .auth-title {
        font-size: 28px;
        letter-spacing: 3px;
        text-transform: uppercase;
        font-weight: 700;
        color: #1f3552;

    }

    .auth-section-title {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #6c757d;
        border-bottom: 2px solid rgba(0,0,0,0.05);
        padding-bottom: 5px;
        display: inline-block;
    }


    .auth-input {
        background-color: #ffffff;
        border: 1px solid transparent;
        border-radius: 6px;
        padding: 12px 15px;
        font-size: 14px;
        color: #495057;
        box-shadow: 0 4px 6px rgba(0,0,0,0.04);
        transition: all 0.2s;
    }

    .auth-input:focus {
        background-color: #fff;
        border-color: #2c4d73;
        box-shadow: 0 4px 12px rgba(44,77,115,0.15);
        outline: none;
    }


    .auth-btn {
        background: linear-gradient(to right, #2c4d73, #1f3552);
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: transform 0.2s;
    }

    .auth-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    }

    @media (max-width: 991px) {
        .auth-panel-dark {
            background-image: none;
            background-color: #1f3552;
        }
        .auth-content-wrapper {
            margin-top: 0 !important;
            padding: 30px 20px;
        }
    }
</style>
