<main class="login">
    <div class="login-content">
        <h1>Nouveau mot de passe</h1>
        <p class="mb-4 text-muted">Choisissez un nouveau mot de passe sécurisé.</p>

        <form action="/reset-password" method="POST">
            
            <?php if (isset($error)): ?>
                <div style="color: red; margin-bottom: 15px; font-weight: bold;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">

            <input type="password" name="pwd" placeholder="Nouveau mot de passe" required minlength="4">
            
            <input type="password" name="pwd_confirm" placeholder="Confirmez le mot de passe" required>
            
            <button type="submit">Valider</button>
        </form>
    </div>
</main>