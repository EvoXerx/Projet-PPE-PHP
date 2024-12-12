<?php
namespace models;
use PDO;

use models\base\SQL;

class MaterielModel extends SQL
{
    public function __construct()
    {
        parent::__construct('materiels', 'id');
    }

    





}