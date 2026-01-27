<main class="main-content">
    <h1 class="page-title">Liste des super-héros</h1>

    <div class="search-bar">
        <input type="text" placeholder="Rechercher un héros..." class="search-input">
        <i class="search-icon"></i>
    </div>

    <div class="heroes-grid">
        <?php foreach ($heroes as $hero): ?>
            <div class="hero-card">
                <div class="hero-header">

                    <h3 class="hero-name"><?= htmlspecialchars($hero['firstname']) ?></h3>
                </div>

                <div class="hero-display">
                    <div class="image-frame">
                        <img src="/assets/DA<?= htmlspecialchars($hero['photo_path']) ?>" alt="Profile" class="hero-img">

                    </div>
                </div>

                <div class="hero-footer">
                    <a href="show_profile.php?id=<?= $hero['id'] ?>" class="btn-more-realistic">Infos</a>

                </div>
            </div>
        <?php endforeach; ?>






    </div>
</main>
