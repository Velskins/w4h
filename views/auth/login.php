<main class="auth-page container-fluid p-0">
    <div class="row g-0 min-vh-100">


        <div class="col-lg-7 d-none d-lg-block auth-bg"></div>


        <div class="col-lg-5 col-12 d-flex align-items-center justify-content-center auth-panel">

            <div class="auth-card w-100">

                <h1 class="auth-title text-center mb-4">Connexion</h1>

                <form action="/login" method="POST">

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger py-2 small">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <input type="email"
                               name="email"
                               class="form-control auth-input"
                               placeholder="Pseudonyme"
                               required>
                    </div>

                    <div class="mb-2">
                        <input type="password"
                               name="pwd"
                               class="form-control auth-input"
                               placeholder="Mot de passe"
                               required>
                    </div>

                    <div class="text-end mb-4">
                        <a href="/forgot-password" class="forgot">Mot de passe oublié ?</a>
                    </div>

                    <button type="submit" class="btn auth-btn w-100 mb-4">
                        Connexion
                    </button>

                </form>

                <p class="text-center small auth-footer">
                    Vous n'êtes pas encore protégé ?
                    <a href="/register">Inscrivez-vous !</a>
                </p>

            </div>
        </div>

    </div>
</main>

<!-- déco' (css) -->


<style>

    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #0b1220;
    }


    .auth-page {
        overflow: hidden;
    }


    .auth-bg {
        background-image: url("/public/assets/DA/iron4k.jpg");
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .auth-bg::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
                90deg,
                rgba(11,18,32,0.95) 0%,
                rgba(11,18,32,0.6) 60%,
                rgba(11,18,32,0.0) 100%
        );
    }


    .auth-panel {
        background: rgba(235, 235, 235, 0.92);
        backdrop-filter: blur(4px);
    }


    .auth-card {
        max-width: 360px;
        padding: 40px 30px;
    }


    .auth-title {
        font-size: 26px;
        letter-spacing: 2px;
        color: #1f2d3d;
        text-transform: uppercase;
    }


    .auth-input {
        border-radius: 8px;
        padding: 12px 14px;
        font-size: 14px;
        border: 1px solid rgba(0,0,0,0.1);
    }

    .auth-input:focus {
        border-color: #2c4d73;
        box-shadow: 0 0 0 3px rgba(44,77,115,0.15);
    }


    .auth-link {
        color: #5d6d7e;
        text-decoration: none;
    }

    .auth-link:hover {
        text-decoration: underline;
    }


    .auth-btn {
        background: linear-gradient(to bottom, #2c4d73, #1f3552);
        color: #fff;
        padding: 12px;
        border-radius: 10px;
        font-size: 14px;
        letter-spacing: 1px;
        border: none;
        transition: all 0.25s ease;
    }

    .auth-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(31,53,82,0.4);
    }


    .auth-footer {
        color: #34495e;
    }

    .auth-footer a {
        color: #2c4d73;
        font-weight: 600;
        text-decoration: none;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }


    @media (max-width: 991px) {
        .auth-panel {
            background: #f2f2f2;
        }
    }
</style>
