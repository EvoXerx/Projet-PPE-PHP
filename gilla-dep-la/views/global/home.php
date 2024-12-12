
<?php 
use utils\SessionHelpers; 
if (SessionHelpers::isId('user')){ ?>
    <div class="alert alert-success" role="alert">
            Bonjour <?php echo SessionHelpers::getID('user')->nom; ?> et bienvenue sur le site !
        </div>
    
 <?php  } 
   else { ?>
    <div class="alert alert-warning" role="alert">
    Bonjour pas d'utilisateur connecté - bienvenue sur le site !
    </div>
  <?php } ?>
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h3>Site de démonstration  depart</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, commodi delectus eaque eos esse ex illum laboriosam laborum modi, molestias necessitatibus non provident quidem quis repellat soluta tempore, veritatis vitae.
                </p>

                
                <div class="d-grid gap-2 col-4 mx-auto">

                        <button type="button" class="btn btn-light" ><i class="bi bi-card-checklist"></i> <a href="/auth/login">Connexion</a></button>
                    </div>
                
                <?php
                if (SessionHelpers::isID('user')&& SessionHelpers::getID('user')->role == 'agent'){ ?>
                    <div class="d-grid gap-2 col-4 mx-auto">

                        <button type="button" class="btn btn-light" ><i class="bi bi-card-checklist"></i> <a href="/auth/logout">Déconnexion</a></button>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto">

                        <button type="button" class="btn btn-info" ><i class="bi bi-card-checklist"></i> <a href="/todo/liste">Prendre en charge un incident</a></button>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto">

                        <button type="button" class="btn btn-info" ><i class="bi bi-card-checklist"></i> 
                             <a href="/todo/consulteA">Consulter les incidents ouverts</a></button>
                    </div>
               
                    <?php } ?>
              

                <?php 
                if (SessionHelpers::isID('user')&& SessionHelpers::getID('user')->role == 'utilisateur'){ ?>
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-light" ><i class="bi bi-card-checklist"></i> <a href="/auth/logout">Déconnexion</a></button>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-info" ><i class="bi bi-card-checklist"></i> <a href="/incident/liste">Signaler un Incident</a></button>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button type="button" class="btn btn-info" ><i class="bi bi-card-checklist"></i> <a href="/todo/suivre">Suivre les incidents signalés</a></button>
                </div>
                <?php } ?>
                
                
                
            </div>
        </div>
    </div>
</div>
