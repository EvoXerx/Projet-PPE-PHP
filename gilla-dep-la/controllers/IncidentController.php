<?php
namespace controllers;

use controllers\base\WebController;
use models\IncidentModel;
use models\MaterielModel;
use models\AuthModel;
use utils\Template;
use utils\EmailUtils;
use utils\SessionHelpers;

class IncidentController extends WebController
{
    private $incidentModel;
    private $materielModel;
    private $authModel;

    function __construct(){
        $this->incidentModel = new IncidentModel();
        $this->materielModel = new MaterielModel();
        $this->authModel = new AuthModel();
    }

    /*function ajouter($texte = "")
    {
        $mail = SessionHelpers::getConnected();
        $me = $this->getUser($mail);

        if ($texte !=""){
             $this->incidentModel->ajouterIncident($texte,$me->id,$mail);
        }
        $this->redirect("./liste");
    }*/

    function terminer($id = ''){
        if($id != ""){
            $this->incidentModel->marquerCommeTermine($id);
        }
    
        $this->redirect("./liste");
    }

    function listeOP()
    {
        if (SessionHelpers::isID('user') && SessionHelpers::getID('user')->role == 'utilisateur'){
            $incidents = $this->incidentModel->getIncidentOP(); // Récupération des TODOS présents en base.
            return Template::render("views/incident/listeOP.php", array('incidents' => $incidents)); // Affichage de votre vue.
        }
        else{
            $this->redirect("./../auth/login");
        }
    }

    function formIncident(){
        $materiels = $this->materielModel->getAll();
        return Template::render("views/incident/inserer.php", array('materiels' => $materiels));
    }

    function inserer(){
        
        
        //echo $_POST['idmat']; pour test laffichage de la liste déroulante du materiel
        $post = $_POST;
        $me = SessionHelpers::getID('user');
        $description = $post['commentaire'];
        $priorite = $post['priorite'];
        $batiment = $post['batiment'];
        $salle = "3";
        $poste = "304";
        $materiel_id = $post['idmat'];
        $this->incidentModel->ajouterIncident($description, $priorite, $batiment, $salle, $poste, $materiel_id, $me->id);
        $this->redirect("./liste");
        
        
       
        
        
    }

   

}
