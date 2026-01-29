<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

final class HeroProfileRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM hero_profile WHERE users_id = :userId LIMIT 1");
        $stmt->execute([':userId' => $userId]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO hero_profile (alias, description, photo_path, specialty, sector, users_id, is_active)
            VALUES (:alias, :description, :photo_path, :specialty, :sector, :users_id, :is_active)
        ");

        return $stmt->execute([
            ':alias' => $data['alias'],
            ':description' => $data['description'],
            ':photo_path' => $data['photo_path'],
            ':specialty' => $data['specialty'],
            ':sector' => $data['sector'],
            ':users_id' => $data['users_id'],
            ':is_active' => 0
        ]);
    }

    public function findAllActive(): array
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM hero_profile 
            WHERE is_active = 1 
            ORDER BY alias ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function activateByUserId(int $userId): bool
    {
        $stmt = $this->pdo->prepare("UPDATE hero_profile SET is_active = 1 WHERE users_id = :userId");
        return $stmt->execute([':userId' => $userId]);
    }

    public function deleteByUserId(int $userId): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM hero_profile WHERE users_id = :userId");
        return $stmt->execute([':userId' => $userId]);
    }
}