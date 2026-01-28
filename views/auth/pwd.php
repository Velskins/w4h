<h2>
    <?= htmlspecialchars($title) ?>
</h2>

<main class="forgot">
    <div class="forgot-content">
        <h1>Mot de passe oublié</h1>

        <p class="hint">
            Entrez votre adresse e-mail
            Un lien de réinitialisation vous sera envoyé
        </p>

        <form method="post" action="/forgot-password">
            <input
                    type="email"
                    name="email"
                    placeholder="Adresse e-mail"
                    required
            >

            <button type="submit">Envoyer le lien</button>
        </form>

        <p class="back">
            <a href="/login">← Retour à la connexion</a>
        </p>
    </div>
