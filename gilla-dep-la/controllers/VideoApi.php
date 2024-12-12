<?php

namespace controllers;

use controllers\base\ApiController;
use models\SampleVideo;
use utils\JsonHelpers;

class VideoApi extends ApiController
{
    private $videoModel;

    function __construct()
    {
        $this->videoModel = new SampleVideo();

        // Décommenter pour avoir des données depuis une base de données
        //$this->videoModel = new DBVideo();
    }

    function sample(): bool|string
    {
        return JsonHelpers::stringify(["Ceci est un exemple", "de", "tableau"]);
    }

    function videos(): bool|string
    {
        return json_encode($this->videoModel->getVideos());
    }
}