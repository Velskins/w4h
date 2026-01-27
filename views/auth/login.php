<main class="login">
    <div class="login-content">
        <h1>Connexion</h1>

        <form action="/login" method="POST">

            <?php if (isset($error)): ?>
                <div style="color: red; margin-bottom: 10px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="pwd" placeholder="Mot de passe" required>

            <a href="#" class="forgot">Mot de passe oublié ?</a>

            <button type="submit">Connexion</button>
        </form>

        <p class="signup">
            Vous n'êtes pas encore protégé ?
            <a href="/register">Inscrivez-vous !</a>
        </p>
    </div>
</main>