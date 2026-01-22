<h1><?= htmlspecialchars($title) ?></h1>

<form action="/profile/edit" method="POST">

    <label>Email</label><br>
    <input type="email" name="email"
           value="<?= htmlspecialchars($user['email']) ?>" required>
    <br><br>

    <label>Prénom</label><br>
    <input type="text" name="firstname"
           value="<?= htmlspecialchars($user['firstname']) ?>" required>
    <br><br>

    <label>Nom</label><br>
    <input type="text" name="lastname"
           value="<?= htmlspecialchars($user['lastname']) ?>" required>
    <br><br>

    <label>Genre</label><br>
    <select name="gender">
        <option value="other" <?= $user['gender'] === 'other' ? 'selected' : '' ?>>Autre</option>
        <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Homme</option>
        <option value="Femelle" <?= $user['gender'] === 'Femelle' ? 'selected' : '' ?>>Femme</option>
    </select>
    <br><br>

    <label>Date de naissance</label><br>
    <input type="date" name="birthdate"
           value="<?= htmlspecialchars($user['birthdate']) ?>">
    <br><br>

    <label>Téléphone</label><br>
    <input type="text" name="phone"
           value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
    <br><br>

    <h3>Adresse</h3>

    <label>Numéro</label>
    <input type="number" name="street_number"
           value="<?= htmlspecialchars($user['street_number'] ?? '') ?>">
    <br><br>

    <label>Complément</label>
    <input type="text" name="complement_number"
           value="<?= htmlspecialchars($user['complement_number'] ?? '') ?>">
    <br><br>

    <label>Rue</label><br>
    <input type="text" name="street"
           value="<?= htmlspecialchars($user['street'] ?? '') ?>">
    <br><br>

    <label>Code postal</label>
    <input type="number" name="zipcode"
           value="<?= htmlspecialchars($user['zipcode'] ?? '') ?>">
    <br><br>

    <label>Ville</label><br>
    <input type="text" name="city"
           value="<?= htmlspecialchars($user['city'] ?? '') ?>">
    <br><br>

    <button type="submit">Enregistrer les modifications</button>

</form>

<br>
<a href="/profile">← Retour au profil</a>
