<?php

namespace routes;

use controllers\AuthController;
use controllers\Main;
use controllers\VideoWeb;
use routes\base\Route;
use controllers\IncidentController;
use utils\Template;


class Web
{
    function __construct()
    {
        $videoWeb = new VideoWeb();
        $main = new Main();
        $auth = new AuthController();
        $inci = new IncidentController();
      
	

        Route::Add('/', [$videoWeb, 'home']);
        Route::Add('/about', [$main, 'about']);
		Route::Add('/ping', [$main, 'ping']);
	
        Route::Add('/auth/login', [$auth, 'login']);
        Route::Add('/auth/me', [$auth, 'me']);
        Route::Add('/auth/recupLogin', [$auth, 'verifuser']);
        Route::Add('/auth/logout', [$auth, 'logout']);

        
        Route::Add('/auth/updatepasshash', [$auth, 'updatepasshash']);

        Route::Add('/incident/liste', [$inci, 'listeOP']);
        Route::Add('/incident/form', [$inci, 'formIncident']);
        Route::Add('/incident/inserer', [$inci, 'inserer']);

      
        /* 1) autant de route que de fonction du controleur
           2) formulaire = 2 routes :
                  -route d'affichage du formulaire
                  -route de verification de la saisie ou d'insertion dans la base de ce qui à été saisi
        */
    }
}

