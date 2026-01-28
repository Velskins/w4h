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
