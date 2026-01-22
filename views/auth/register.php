<h2>
    <?= htmlspecialchars($title) ?>
</h2>

<?php if (isset($error)): ?>
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>


<form action="/register" method="POST" style="background-color: black;">
    <label>Email :</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mot de passe :</label><br>
    <input type="password" name="pwd" required><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="firstname" required><br><br>

    <label>Nom :</label><br>
    <input type="text" name="lastname" required><br><br>

    <label>Genre :</label><br>
    <select name="gender">
        <option value="other">Autre</option>
        <option value="Male">Homme</option>
        <option value="Femelle">Femme</option>
    </select><br><br>

    <label>Date de naissance :</label><br>
    <input type="date" name="birthdate"><br><br>

    <label>Numéro de téléphone :</label><br>
    <input type="text" name="phone"><br><br>

    <label>Numéro de rue :</label><br>
    <input type="number" name="street_number"><br><br>

    <label>Complément :</label><br>
    <input type="text" name="complement_number"><br><br>

    <label>Rue :</label><br>
    <input type="text" name="street"><br><br>

    <label>Code postal :</label><br>
    <input type="number" name="zipcode"><br><br>

    <label>Ville :</label><br>
    <input type="text" name="city"><br><br>

    <label>Voulez-vous devenir héros ?</label>
    <input type="checkbox" name="is_hero" value="1"><br><br>

    <button type="submit">S'inscrire</button>
</form>

<p>Déjà inscrit ? <a href="/login">Se connecter</a></p>
</body>
</html>


