<div class="min-vh-100 d-flex flex-column text-white position-relative overflow-hidden" style="background-color: #0b1622;">
    
    <div class="zoom-bg position-absolute w-100 h-100" 
         style="background: url('../public/assets/background/Background-homepage.png') center/cover no-repeat; z-index: 0; transition: transform 0.1s ease-out;">
    </div>

    <main class="flex-grow-1 d-flex position-relative align-items-center" style="z-index: 1;">
        <div class="position-absolute w-100 h-100"
            style="background: radial-gradient(circle at 20%, transparent 0%, rgba(11, 22, 34, 0.9) 100%); z-index: 0;"></div>

        <div class="container position-relative rounded-5" style="z-index: 2; background: linear-gradient(180deg, #172A3D 0%, #222F39 100%);">
            <div class="row align-items-center p-5">
                <div class="col-lg-5 offset-lg-1">
                    <h1 class="display-3 fw-bold mb-2">Signalez un incident</h1>
                    <h2 class="h4 fw-light mb-5 text-secondary">Nos héros interviennent rapidement</h2>
                    <ul class="list-unstyled lh-lg border-start border-primary border-4 ps-4 mt-4">
                        <li class="mb-3 h5 fw-normal">Signalez en temps réel</li>
                        <li class="mb-3 h5 fw-normal">Notez vos héros</li>
                        <li class="h5 fw-normal">Restez informés</li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <img src="../public/assets/background/map-hp.webp" alt="Carte" class="img-fluid rounded-5 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
window.addEventListener('scroll', function() {
    const scrollValue = window.scrollY;
    const bgImage = document.querySelector('.zoom-bg');
    
    const scale = 1 + (scrollValue / 2000);
    
    if (bgImage) {
        bgImage.style.transform = `scale(${scale})`;
    }
});
</script>