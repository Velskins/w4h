<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

final class InterventionRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByHeroId(int $heroId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                intv.id as intervention_id,
                intv.date_open as intervention_date,
                intv.status as intervention_status,
                i.*,             
                v.alias as villain_name,
                ai.city,      -- On récupère la ville depuis la table adresse
                ai.zipcode,   -- Et le code postal
                ai.street     -- Et la rue
            FROM intervention intv
            JOIN incidents i ON intv.incidents_id = i.id
            LEFT JOIN villain_profile v ON i.villain_profile_id = v.id
            LEFT JOIN adresses_incidents ai ON i.adresses_incidents_id = ai.id  -- Jointure avec l'adresse
            WHERE intv.hero_profile_id = :hero_id
            ORDER BY intv.date_open DESC
        ");
        $stmt->execute([':hero_id' => $heroId]);
        return $stmt->fetchAll();
    }

    public function create(int $incidentId, int $heroId): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO intervention (incidents_id, hero_profile_id, date_open, status) 
            VALUES (:incident_id, :hero_id, NOW(), 'En Cours')
        ");
        return $stmt->execute([
            ':incident_id' => $incidentId,
            ':hero_id' => $heroId
        ]);
    }

    public function isIncidentTaken(int $incidentId): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM intervention WHERE incidents_id = :id");
        $stmt->execute([':id' => $incidentId]);
        return (int) $stmt->fetchColumn() > 0;
    }

    public function completeByIncidentId(int $incidentId): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE intervention 
            SET date_close = NOW(), 
                status = 'résolu' 
            WHERE incidents_id = :incident_id 
              AND date_close IS NULL
        ");
        return $stmt->execute([':incident_id' => $incidentId]);
    }
}