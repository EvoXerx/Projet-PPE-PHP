<?php
namespace models;
use PDO;

use models\base\SQL;

class IncidentModel extends SQL
{
    public function __construct()
    {
        parent::__construct('incidents', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->getPdo()->prepare("UPDATE incidents SET etat_id = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function ajouterIncident($description, $priorite, $batiment, $salle, $poste, $materiel_id, $declarant_id){
        

        $sql = "INSERT INTO incidents (dateHeureOuverture, incidents.description, priorite, batiment, salle, poste, materiel_id, declarant_id, etat_id) VALUES (now(),?,?, ?, ?, ?, ?, ?,1)";
        $stmt= $this->getPdo()->prepare($sql);
        $stmt->execute([$description, $priorite, $batiment, $salle, $poste, $materiel_id, $declarant_id]);
       
    }

    public function getIncidentOP(): array|null
    {

        $sql = "SELECT etats.description as descE, incidents.description as descI, famille, materiels.type as typeM, batiment, salle, poste
        FROM incidents
        JOIN etats ON etats.id = incidents.etat_id 
        JOIN materiels ON materiels.id = incidents.materiel_id 
        WHERE etats.id = 1 OR etats.id = 2;";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(); //Ne pas oublier de passer un tableau
   
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    
    }





}