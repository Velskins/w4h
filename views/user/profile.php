<style>
    /* PAGE PROFIL */
    .profile-page {
        background-image: #f2f4f8;
        min-height: 100vh;
        padding-left: 260px;
        overflow-x: hidden;
    }

    /* CONTENU */
    .profile-content {
        padding: 30px;
    }

    /* CARTE */
    .profile-card {
        background-color: #ffffff;
        border-radius: 12px;
        border: none;
    }

    /* TITRES */
    .section-title {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6b7280;
        margin-bottom: 10px;
    }

    /* AVATAR */
    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background-color: #d1d5db;
    }

</style>

<div class="container-fluid profile-page">
    <div class="row">

         <div class="col-12 profile-content" id="titrePtofile">

            <h1 class="mb-4">
                <?= htmlspecialchars($title) ?>
            </h1>

            <div class="card profile-card p-4">

                <div class="row align-items-center mb-4">
                    <div class="col-md-9">
                        <h2 class="mb-1">
                            Profil de
                            <?= htmlspecialchars($user['firstname']) ?>
                            <?= htmlspecialchars($user['lastname']) ?>
                        </h2>
                    </div>

                    <div class="col-md-3 text-md-end text-center">
                        <div class="profile-avatar">
                            <!-- image plus tard -->
                        </div>
                    </div>
                </div>

                 <div class="row">

                     <div class="col-md-6">
                        <h6 class="section-title">Informations personnelles</h6>

                        <p><strong>Prénom :</strong> <?= htmlspecialchars($user['firstname']) ?></p>
                        <p><strong>Nom :</strong> <?= htmlspecialchars($user['lastname']) ?></p>
                        <p><strong>Date de naissance :</strong> <?= htmlspecialchars($user['birthdate']) ?></p>
                        <p><strong>Adresse email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    </div>

                     <div class="col-md-6">
                        <h6 class="section-title">Activité du compte</h6>

                        <p><strong>Rôle :</strong>
                            <?php
                            $roles = json_decode($user['role'], true);
                            echo htmlspecialchars(implode(', ', $roles));
                            ?>
                        </p>

                        <h6 class="section-title mt-4">Adresse postale</h6>

                        <p>
                            <?= htmlspecialchars($user['street_number'] ?? '') ?>
                            <?= htmlspecialchars($user['street'] ?? '') ?><br>
                            <?= htmlspecialchars($user['zipcode'] ?? '') ?>
                            <?= htmlspecialchars($user['city'] ?? '') ?>
                        </p>
                    </div>

                </div>

                <div class="text-end mt-4">
                    <a href="/logout" class="btn btn-outline-secondary">
                        Se déconnecter
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
=======
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
>>>>>>> 4aaba2b4a357b8da56c011b3b7a81b089df405c8
