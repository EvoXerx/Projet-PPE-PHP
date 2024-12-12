<?php

namespace models;

use models\base\SQL;

class DBVideo extends SQL
{
    public function __construct()
    {
        parent::__construct('video');
    }

    function getVideos(): array
    {
        return $this->getAll();
    }

    function getByVideoId($videoId): array
    {
        // Utilisation d'une query a la place d'un simple getOne car la requête
        // est réalisée sur des champs différents que l'ID de la table.

        $stmt = $this->getPdo()->prepare("SELECT * FROM video WHERE videoId = ?");
        $stmt->execute([$videoId]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}