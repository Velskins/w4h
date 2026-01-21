<style>
    .form_login  {
        margin-top: 300px;
    }
    </style
<h2>
    <?= htmlspecialchars($title) ?>
</h2>

<form action="/login" method="POST" class="form_login">

    <label>Email :</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mot de passe :</label><br>
    <input type="password" name="pwd" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<p>Pas encore inscrit ? <a href="/register">S'inscrire</a></p>
