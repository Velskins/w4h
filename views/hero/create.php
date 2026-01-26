<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg text-white" style="background-color: #162435; border-radius: 15px;">
                
                <div class="p-4 text-center" style="background: linear-gradient(90deg, #ffd700 0%, #ff8c00 100%);">
                    <h2 class="fw-bold text-uppercase mb-0 text-dark"><i class="bi bi-mask me-2"></i>Devenir un Héros</h2>
                    <p class="mb-0 text-dark opacity-75 small mt-1">Rejoignez l'élite et protégez la ville</p>
                </div>

                <div class="p-5">
                    <form action="/hero/store" method="POST">
                        
                        <div class="mb-4">
                            <label for="photo_url" class="form-label text-white-50">Photo de profil (URL de l'image) *</label>
                            <input class="form-control bg-dark text-white border-secondary" 
                                   type="url" 
                                   id="photo_url" 
                                   name="photo_url" 
                                   placeholder="https://exemple.com/mon-image.jpg" 
                                   required>
                            <div class="form-text text-white-50 small">Copiez ici le lien direct vers votre image (web url).</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white-50">Alias (Nom de Super-Héros) *</label>
                            <input type="text" name="alias" class="form-control bg-dark text-white border-secondary" placeholder="Ex: Iron Man, Spider-Man..." required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Secteur d'activité</label>
                                <select name="sector" class="form-select bg-dark text-white border-secondary">
                                    <option value="Inconnu">Non défini</option>
                                    <option value="Hell's Kitchen">Hell's Kitchen</option>
                                    <option value="Madripoor">Madripoor</option>
                                    <option value="New York">New York</option>
                                    <option value="Gotham">Gotham (Hors zone)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Spécialité Principale</label>
                                <input type="text" name="specialty" class="form-control bg-dark text-white border-secondary" placeholder="Ex: Force, Vol, Tech...">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-white-50">Votre Histoire / Origine Story</label>
                            <textarea name="description" class="form-control bg-dark text-white border-secondary" rows="5" placeholder="Comment avez-vous eu vos pouvoirs ? Pourquoi voulez-vous nous rejoindre ?"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning py-3 fw-bold text-uppercase shadow-lg">
                                Envoyer ma candidature
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>