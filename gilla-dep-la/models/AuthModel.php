<?php
namespace models;
use PDO;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateurs', 'id');
    }
    
    
    public function existeUserH($mail,$pass) :string
    {
        $mailt = 'inconnu';

        $req = "select * from utilisateurs WHERE mail = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$mail]); 
        $ligne = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (isset($ligne)){
             $passh = $ligne[0]->passhash;
             $ok = password_verify($pass,$passh);
             if ($ok){
                 $mailt= $ligne[0]->mail;
             }
         }
         return $mailt;
    }
    public function getUser($mail)
    {
     
        $req = "select * from utilisateurs WHERE mail = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$mail]); 
        
        $user = $stmt->fetch(PDO::FETCH_OBJ);
       
         return $user;
    }
    public function updatePassId(){
        $passH1 = password_hash("util1", PASSWORD_BCRYPT);
        $passH2 = password_hash("agent1", PASSWORD_BCRYPT);
        $passH3 = password_hash("resp1", PASSWORD_BCRYPT);
        $passH4 = password_hash("admin1", PASSWORD_BCRYPT);

        $stmt = $this->getPdo()->prepare("UPDATE utilisateurs SET passhash = ? WHERE id = ?");

        $stmt->execute([$passH1,1]);
        /* $stmt->execute([$passH2,2]);
        $stmt->execute([$passH3,3]);
        $stmt->execute([$passH4,4]); */
    }
}