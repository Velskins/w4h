<div class="container-fluid p-4 hero-dashboard-bg">

    <div class="row mb-5">
        <div class="col-12">
            <div class="admin-card p-4 text-white d-flex align-items-center gap-4" 
                 style="background: linear-gradient(90deg, #162435 0%, #1f3a52 100%); border-left: 5px solid #ffc107; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; border: 3px solid #fff;">
                    <img src="<?= htmlspecialchars($hero['photo_path'] ?: '/assets/images/default_hero.png') ?>" 
                         alt="<?= htmlspecialchars($hero['alias']) ?>" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <div>
                    <h1 class="h2 text-uppercase fw-bold mb-1"><?= htmlspecialchars($hero['alias']) ?></h1>
                    <div class="d-flex gap-3 text-white-50 small text-uppercase">
                        <span><i class="bi bi-geo-alt me-1"></i><?= htmlspecialchars($hero['sector'] ?? 'Secteur Inconnu') ?></span>
                        <span><i class="bi bi-stars me-1"></i><?= htmlspecialchars($hero['specialty']) ?></span>
                    </div>
                </div>

                <div class="ms-auto text-end d-none d-md-block">
                    <span class="display-6 fw-bold text-warning"><?= count($my_interventions) ?></span>
                    <span class="d-block small text-uppercase opacity-75">Missions totales</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="kpi-card d-flex flex-column justify-content-between p-3 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="display-5 fw-bold text-white"><?= count($my_interventions) ?></span>
                    <i class="bi bi-bell-fill text-secondary fs-1 opacity-25"></i>
                </div>
                <span class="text-white-50 small text-uppercase">interventions sur des incidents</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="kpi-card d-flex flex-column justify-content-between p-3 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="display-5 fw-bold text-white">0</span>
                    <i class="bi bi-person-badge-fill text-info fs-1 opacity-25"></i>
                </div>
                <span class="text-white-50 small text-uppercase">super-vilains mis en prison</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="kpi-card d-flex flex-column justify-content-between p-3 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="display-5 fw-bold text-white">4.8</span>
                    <i class="bi bi-hand-thumbs-up-fill text-primary fs-1 opacity-25"></i>
                </div>
                <span class="text-white-50 small text-uppercase">en réputation par les citoyens</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="kpi-card d-flex flex-column justify-content-between p-3 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="display-5 fw-bold text-white">0</span>
                    <i class="bi bi-film text-warning fs-1 opacity-25"></i>
                </div>
                <span class="text-white-50 small text-uppercase">films en tant qu'acteur</span>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <h2 class="h5 fw-bold text-white mb-3 text-uppercase">Incidents en cours</h2>
            
            <div class="table-responsive rounded-3 overflow-hidden">
                <table class="table table-dark mb-0 custom-table align-middle">
                    <thead>
                        <tr class="text-uppercase small" style="background-color: #111923;">
                            <th class="py-3 ps-4">Type</th>
                            <th class="py-3">Lieu</th>
                            <th class="py-3">Super-Vilain</th>
                            <th class="py-3 text-center">Priorité</th>
                            <th class="py-3 text-center pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($available_incidents)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted" style="background-color: #1F2E3E;">
                                    <i class="bi bi-cup-hot fs-3 d-block mb-2"></i>
                                    Aucun incident en cours. Reposez-vous !
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($available_incidents as $index => $incident): ?>
                                <tr class="border-secondary border-opacity-25">
                                    <td class="ps-4 py-3 fw-bold text-white">
                                        <?= htmlspecialchars($incident['type']) ?>
                                    </td>
                                    <td class="py-3 text-white-50">
                                        <?= htmlspecialchars($incident['city']) ?>
                                    </td>
                                    <td class="py-3 fst-italic text-info">
                                        <?= htmlspecialchars($incident['villain_name'] ?? 'Inconnu') ?>
                                    </td>
                                    <td class="py-3 text-center">
                                        <?php if ($incident['priority'] === 'Haute'): ?>
                                            <i class="bi bi-arrow-up-circle-fill text-danger fs-5"></i>
                                        <?php elseif ($incident['priority'] === 'Moyenne'): ?>
                                            <i class="bi bi-arrow-right-circle-fill text-warning fs-5"></i>
                                        <?php else: ?>
                                            <i class="bi bi-arrow-down-circle-fill text-info fs-5"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 text-center pe-4">
                                        <form action="/hero/take" method="POST">
                                            <input type="hidden" name="incident_id" value="<?= $incident['id'] ?>">
                                            <button type="submit" class="btn btn-action-go btn-sm px-4 rounded-pill text-uppercase fw-bold">
                                                GO !
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <h2 class="h5 fw-bold text-white mb-3 text-uppercase">Statistiques</h2>
            
            <div class="d-flex flex-column rounded-3 overflow-hidden">
                <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-dark-row">
                    <span class="fw-bold text-white fs-5">38 %</span>
                    <span class="text-white-50 small">Vols en tout genre</span>
                </div>
                <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-light-row">
                    <span class="fw-bold text-white fs-5">13 %</span>
                    <span class="text-white-50 small">Actes terroristes</span>
                </div>
                <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-dark-row">
                    <span class="fw-bold text-white fs-5">24 %</span>
                    <span class="text-white-50 small">Invasions extraterrestre</span>
                </div>
                 <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-light-row">
                    <span class="fw-bold text-white fs-5">25 %</span>
                    <span class="text-white-50 small">Meurtres</span>
                </div>
                <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-dark-row border-top border-secondary">
                    <span class="fw-bold text-white fs-5">294</span>
                    <span class="text-white-50 small">citoyens secourus</span>
                </div>
                <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-light-row">
                    <span class="fw-bold text-white fs-5">1</span>
                    <span class="text-white-50 small">Top des meilleurs super-héros</span>
                </div>
                 <div class="stat-item d-flex align-items-center justify-content-between p-3 bg-dark-row">
                    <span class="fw-bold text-white fs-5">18</span>
                    <span class="text-white-50 small">Premier rôle dans les films</span>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .hero-dashboard-bg {
        background: linear-gradient(rgba(23, 32, 42, 0.2), rgba(23, 32, 42, 0.5)), url('/public/assets/background/Background9.png');
        
        background-size: cover;
        background-position: center top;
        background-attachment: fixed;
        min-height: 100vh;
        
        margin-top: -1.5rem !important; 
        margin-bottom: -1.5rem !important;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .kpi-card {
        background-color: #1A2634;
        border-radius: 8px;
        min-height: 140px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        transition: transform 0.2s;
        border: 1px solid rgba(255,255,255,0.05);
    }
    .kpi-card:hover {
        transform: translateY(-5px);
        border-color: rgba(255,255,255,0.2);
    }

    .custom-table thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .custom-table tbody tr {
        background-color: #1F2E3E;
        transition: background-color 0.2s;
    }
    .custom-table tbody tr:hover {
        background-color: #2c3e50;
    }
    
    .btn-action-go {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff;
        font-size: 0.8rem;
        transition: all 0.3s;
    }
    .btn-action-go:hover {
        background: #fff;
        color: #000;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.4);
    }

    .bg-dark-row { background-color: #1A2634; }
    .bg-light-row { background-color: #243447; }
    .stat-item {
        border-left: 4px solid transparent;
        transition: all 0.2s;
    }
    .stat-item:hover {
        border-left-color: #3498db;
        background-color: #2c3e50;
    }
</style>