<?php
namespace controllers;

use controllers\base\WebController;
use utils\Template;
use utils\SessionHelpers;
use models\AuthModel;


class AuthController extends WebController
{
    private $authModel;
   
    function __construct(){
        $this->authModel = new AuthModel();
    }
    function login()
    {
        //SessionHelpers::logout();
        return Template::render("views/auth/login.php");
    }
    function me()
    {
        $mail = SessionHelpers::getConnected();
        $me = $this->authModel->getUser($mail);
        return Template::render("views/auth/me.php",['me'=>$me]);
    }
    function logout(): string
    {
        SessionHelpers::unsetID('user');
        $this->redirect("/");
      
    }
    function verifuser()
    {
        $postData = $_POST;

        if (isset($postData['email'])  && isset($postData['password']) &&
            !empty($postData['password']) && filter_var($postData['email'], FILTER_VALIDATE_EMAIL) ) { 
      
            $mail = $postData['email'];
            $pass = $postData['password'];
            //$leMail = $this->authModel->existeUser($mail,$pass);
            $leMail = $this->authModel->existeUserH($mail,$pass);
            if ($leMail != "inconnu"){
                $user = $this->authModel->getUser($mail);
                SessionHelpers::setID('user', $user);
               
             }

        }/*  */
        else {
            $this->redirect("/auth/login");
        }
        //return "Voilà votre saisie : ". $postData['email']." et ".$postData['password'];
        $this->redirect("/");
    }
    function updatepasshash(){
        $this->authModel->updatePassId();
        $this->redirect("/");
   }

}