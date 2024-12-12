<?php

namespace controllers;

use controllers\base\WebController;
use models\SampleVideo;
use utils\Template;

class VideoWeb extends WebController
{
    

    function __construct()
    {
     

        // Décommenter pour avoir des données depuis une base de données
        //$this->videoModel = new DBVideo();
    }

    function home(): string
    {
        // Récupération des vidéos par le modèle
      
        return Template::render("./views/global/home.php");
    }

   
}