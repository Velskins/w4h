<main class="login">
    <div class="login-content">
        <h1>Récupération</h1>
        <p class="mb-4 text-muted">Entrez votre email pour recevoir un lien de réinitialisation.</p>

        <form action="/forgot-password" method="POST">
            <?php if (isset($error)): ?>
                <div style="color: red; margin-bottom: 10px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Votre Email" required>

            <button type="submit">Envoyer le lien</button>
        </form>

        <p class="signup">
            <a href="/login">Retour à la connexion</a>
        </p>
    </div>
</main>