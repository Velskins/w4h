<form action="/register" method="POST" class="split-screen-form">

    <div class="panel left-panel">
        <div class="panel-content">
            <h1>Inscription</h1>

            <?php if (isset($error)): ?>
                <div style="color: red; background: rgba(255,0,0,0.1); padding: 10px; border-radius: 10px; margin-bottom: 20px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <label class="section-label">Informations personnelles <span class="required-star">*</span></label>

            <div class="input-row">
                <select name="gender" required>
                    <option value="" disabled selected>Civilité</option>
                    <option value="Male">Monsieur</option>
                    <option value="Femelle">Madame</option>
                    <option value="other">Autre</option>
                </select>
            </div>

            <div class="input-row">
                <input type="text" name="lastname" placeholder="Nom" required>
                <input type="text" name="firstname" placeholder="Prénom" required>
            </div>

            <div class="input-row">
                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthdate" placeholder="Date de naissance">
            </div>

            <div class="input-row">
                <input type="email" name="email" placeholder="Adresse Email" required>
            </div>

            <label class="section-label" style="margin-top: 20px;">Informations complémentaires</label>

            <div class="input-row">
                <input type="tel" name="phone" placeholder="N° de portable">
            </div>

            <div style="margin-top: 10px; color: var(--text-dark); display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_hero" value="1" style="width: auto; margin:0;">
                <label>Je souhaite devenir un <strong>Héros</strong></label>
            </div>
        </div>
    </div>

    <div class="panel right-panel">
        <div class="panel-content">

            <label class="section-label">Coordonnées <span class="required-star">*</span></label>

            <div class="input-row">
                <input type="number" name="street_number" placeholder="N°" style="flex: 0 0 80px;">
                <input type="text" name="street" placeholder="Nom de la voie">
            </div>

            <div class="input-row">
                <input type="text" name="complement_number" placeholder="Complément (facultatif)">
            </div>

            <div class="input-row">
                <input type="text" name="city" placeholder="Ville">
                <input type="number" name="zipcode" placeholder="Code Postal">
            </div>

            <div class="input-row">
                <select name="country">
                    <option value="France">France</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Suisse">Suisse</option>
                    <option value="USA">États-Unis</option>
                </select>
            </div>

            <label class="section-label" style="margin-top: 30px;">Sécurité <span class="required-star">*</span></label>

            <div class="input-row">
                <input type="password" name="pwd" placeholder="Mot de passe" required>
                <input type="password" name="pwd_confirm" placeholder="Confirmation">
            </div>

            <button type="submit" class="submit-btn">Inscription</button>

            <div class="login-link">
                Vous avez déjà un compte ? <a href="/login">Connectez-vous</a>
            </div>

        </div>
    </div>

</form>
