<?php
namespace controllers;

use controllers\base\WebController;
use utils\Template;
use models\MonModel;

class MonControler extends WebController
{
	private $MonModel;

    function __construct()
    {
        $this->MonModel = new MonModel();
    }

    
	function utilisateurs()
    {
		$users = $this->MonModel->getUsers();
        return Template::render("views/global/tableUtilisateurs.php", ["users"=>$users]);
    }
}
?>