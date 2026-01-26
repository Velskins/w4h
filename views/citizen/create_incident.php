<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-lg overflow-hidden text-white"
                style="background-color: #162435; border-radius: 15px;">

                <div class="p-4 text-center" style="background: linear-gradient(90deg, #1c4885 0%, #3a7bd5 100%);">
                    <h2 class="fw-bold text-uppercase mb-0"><i class="bi bi-shield-exclamation me-2"></i>Déclarer un
                        incident</h2>
                    <p class="mb-0 opacity-75 small mt-1">Aidez nos héros à intervenir au bon endroit</p>
                </div>

                <div class="p-5">

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="/incident/store" method="POST">

                        <h5 class="text-info text-uppercase fw-bold mb-4 border-bottom border-secondary pb-2">1. Nature
                            de l'incident</h5>

                        <div class="mb-3">
                            <label for="title" class="form-label text-white-50">Titre du signalement *</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary" name="title"
                                id="title" placeholder="Ex: Braquage en cours, Incendie..." required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label text-white-50">Type d'incident *</label>
                                <select class="form-select bg-dark text-white border-secondary" name="type" id="type">
                                    <option value="Accident">Accident</option>
                                    <option value="Braquage">Braquage / Vol</option>
                                    <option value="Incendie">Incendie</option>
                                    <option value="Monstre">Attaque de Monstre</option>
                                    <option value="Catastrophe">Catastrophe Naturelle</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label text-white-50">Description détaillée</label>
                            <textarea class="form-control bg-dark text-white border-secondary" name="description"
                                id="description" rows="4"
                                placeholder="Décrivez la situation, le nombre de personnes en danger, etc."></textarea>
                        </div>

                        <h5 class="text-warning text-uppercase fw-bold mb-4 border-bottom border-secondary pb-2 mt-5">2.
                            Localisation</h5>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Numéro *</label>
                                <input type="number" class="form-control bg-dark text-white border-secondary"
                                    name="numero" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label text-white-50">Complément (Bis, Ter...)</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary"
                                    name="complement_numero">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white-50">Nom de la rue *</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary" name="street"
                                required>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-5">
                                <label class="form-label text-white-50">Code Postal *</label>
                                <input type="number" class="form-control bg-dark text-white border-secondary"
                                    name="zipcode" required>
                            </div>
                            <div class="col-md-7">
                                <label class="form-label text-white-50">Ville *</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary" name="city"
                                    required>
                            </div>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary py-3 fw-bold text-uppercase shadow-lg"
                                style="background: linear-gradient(90deg, #d53a3a 0%, #e85a5a 100%); border: none;">
                                <i class="bi bi-send-fill me-2"></i>Envoyer le signalement
                            </button>
                            <p class="text-center text-white-50 mt-2 small">Votre signalement sera validé par nos
                                services avant diffusion.</p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>