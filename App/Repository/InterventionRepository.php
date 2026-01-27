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

    public function create(int $incidentId, int $heroProfileId): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO intervention (incidents_id, hero_profile_id, status, date_open)
            VALUES (:incident_id, :hero_profile_id, 'En Cours', NOW())
        ");

        return $stmt->execute([
            ':incident_id' => $incidentId,
            ':hero_profile_id' => $heroProfileId
        ]);
    }

    public function findByHeroId(int $heroProfileId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT intv.*, 
                   i.title, i.description, i.type, i.priority, 
                   a.city, a.zipcode
            FROM intervention intv
            JOIN incidents i ON intv.incidents_id = i.id
            JOIN adresses_incidents a ON i.adresses_incidents_id = a.id
            WHERE intv.hero_profile_id = :hero_profile_id
            ORDER BY intv.date_open DESC
        ");
        $stmt->execute([':hero_profile_id' => $heroProfileId]);
        return $stmt->fetchAll();
    }

    public function complete(int $interventionId): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE intervention 
            SET status = 'résolu', 
                date_close = NOW() 
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $interventionId]);
    }

    public function isIncidentTaken(int $incidentId): bool
    {
        $stmt = $this->pdo->prepare("SELECT id FROM intervention WHERE incidents_id = :id LIMIT 1");
        $stmt->execute([':id' => $incidentId]);
        return (bool) $stmt->fetch();
    }
}