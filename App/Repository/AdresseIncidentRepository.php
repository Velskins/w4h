<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;
use Exception;

final class AdresseIncidentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findOneById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM adresses_incidents 
            WHERE id = :id 
            LIMIT 1
        ");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO adresses_incidents (numero, complement_numero, street, zipcode, city)
            VALUES (:numero, :complement_numero, :street, :zipcode, :city)
        ");

        $stmt->execute([
            ':numero' => $data['numero'],
            ':complement_numero' => $data['complement_numero'] ?? null,
            ':street' => $data['street'],
            ':zipcode' => $data['zipcode'],
            ':city' => $data['city']
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE adresses_incidents
            SET numero = :numero,
                complement_numero = :complement_numero,
                street = :street,
                zipcode = :zipcode,
                city = :city
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':numero' => $data['numero'],
            ':complement_numero' => $data['complement_numero'] ?? null,
            ':street' => $data['street'],
            ':zipcode' => $data['zipcode'],
            ':city' => $data['city']
        ]);

        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM adresses_incidents WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }
}