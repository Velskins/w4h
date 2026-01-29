<style>
    .edit-profile-page {
        min-height: 100vh;
        background-image: url("../../public/assets/DA/profilebackground.jpg");
        background-size: cover;
        background-position: center;
        padding: 40px 20px;
    }

    .edit-profile-card {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 14px;
        border: none;
        max-width: 1100px;
    }

    .edit-profile-title {
        font-size: 2rem;
        font-weight: 600;
    }

    .section-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6b7280;
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    .btn-save {
        padding: 10px 30px;
        font-weight: 600;
    }
</style>

<div class="container-fluid edit-profile-page">
    <div class="row justify-content-center">

        <div class="col-12">

            <div class="text-center mb-4">
                <h1 class="edit-profile-title">
                    <?= htmlspecialchars($title) ?>
                </h1>
            </div>

            <div class="card edit-profile-card mx-auto p-5">

                <form action="/profile/edit" method="POST">

                     <h6 class="section-title">Informations personnelles</h6>

                    <div class="row g-4 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="<?= htmlspecialchars($user['email']) ?>"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="text"
                                   class="form-control"
                                   name="phone"
                                   value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Prénom</label>
                            <input type="text"
                                   class="form-control"
                                   name="firstname"
                                   value="<?= htmlspecialchars($user['firstname']) ?>"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nom</label>
                            <input type="text"
                                   class="form-control"
                                   name="lastname"
                                   value="<?= htmlspecialchars($user['lastname']) ?>"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Genre</label>
                            <select class="form-select" name="gender">
                                <option value="other" <?= $user['gender'] === 'other' ? 'selected' : '' ?>>Autre</option>
                                <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Homme</option>
                                <option value="Femelle" <?= $user['gender'] === 'Femelle' ? 'selected' : '' ?>>Femme</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date de naissance</label>
                            <input type="date"
                                   class="form-control"
                                   name="birthdate"
                                   value="<?= htmlspecialchars($user['birthdate']) ?>">
                        </div>

                    </div>

                     <h2 class="section-title">Adresse</h2>

                    <div class="row g-4 mb-5">

                        <div class="col-md-3">
                            <label class="form-label">Numéro</label>
                            <input type="number"
                                   class="form-control"
                                   name="street_number"
                                   value="<?= htmlspecialchars($user['street_number'] ?? '') ?>">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Complément</label>
                            <input type="text"
                                   class="form-control"
                                   name="complement_number"
                                   value="<?= htmlspecialchars($user['complement_number'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Rue</label>
                            <input type="text"
                                   class="form-control"
                                   name="street"
                                   value="<?= htmlspecialchars($user['street'] ?? '') ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Code postal</label>
                            <input type="number"
                                   class="form-control"
                                   name="zipcode"
                                   value="<?= htmlspecialchars($user['zipcode'] ?? '') ?>">
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Ville</label>
                            <input type="text"
                                   class="form-control"
                                   name="city"
                                   value="<?= htmlspecialchars($user['city'] ?? '') ?>">
                        </div>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="/profile" class="text-decoration-none">
                            ← Retour au profil
                        </a>

                        <button type="submit" class="btn btn-outline-secondary btn-save">
                            Enregistrer les modifications
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
