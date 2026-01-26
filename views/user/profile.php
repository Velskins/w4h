<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Rajdhani:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<main class="profile-page-container">
    <h1 class="main-title"><?= htmlspecialchars($title) ?></h1>

    <div class="premium-profile-card">
        <aside class="profile-aside">
            <div class="avatar-container">
                <div class="avatar-frame">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['firstname'].'+'.$user['lastname']) ?>&background=000E28&color=3fa9f5&bold=true&size=128" alt="Avatar">
                </div>
            </div>

            <div class="role-badges">
                <?php
                $roles = json_decode($user['role'], true);
                if($roles) {
                    foreach($roles as $role): ?>
                        <span class="badge"><?= htmlspecialchars($role) ?></span>
                    <?php endforeach;
                } ?>
            </div>

            <nav class="profile-nav">
                <a href="/profile/edit" class="btn-nav">Modifier les données</a>
                <a href="../incident/create.php" class="btn-nav alert">
                    ⚠️ Signaler un incident
                </a>
                <a href="/logout" class="logout-link">Deconnexion</a>
            </nav>
        </aside>

        <section class="profile-main">
            <header class="profile-welcome">
                <span class="id-label">Dossier Identité #<?= rand(1000,9999)  ?></span>
                <h2><?= htmlspecialchars($user['firstname']) ?> <span class="lastname"><?= htmlspecialchars($user['lastname']) ?></span></h2>
            </header>

            <div class="info-sections">
                <div class="info-group">
                    <label>Données Personnelles</label>
                    <div class="info-row">
                        <span class="label">Email</span>
                        <span class="value"><?= htmlspecialchars($user['email']) ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Date de naissance</span>
                        <span class="value">
                            <?= $user['birthdate'] ? date('d/m/Y', strtotime($user['birthdate'])) : 'Non renseigné' ?>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="label">Genre</span>
                        <span class="value"><?= htmlspecialchars($user['gender'] ?? 'N/A') ?></span>
                    </div>
                </div>

                <div class="info-group">
                    <label>Coordonées</label>
                    <div class="address-box">
                        <p>
                            <strong>Voie :</strong> <?= htmlspecialchars($user['street_number'] ?? '') ?> <?= htmlspecialchars($user['street'] ?? '') ?><br>
                            <strong>Secteur :</strong> <?= htmlspecialchars($user['zipcode'] ?? '') ?> <?= htmlspecialchars($user['city'] ?? '') ?><br>
                            <strong>Pays :</strong> <?= htmlspecialchars($user['country'] ?? 'France') ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
