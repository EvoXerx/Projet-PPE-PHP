<?php

namespace models;

class Video
{
    public $name;
    public $videoId;

    function __construct($videoId, $name)
    {
        $this->videoId = $videoId;
        $this->name = $name;
    }
}

/**
 * @deprecated
 * Class SampleVideo
 *
 * Class d'exemple « sans logique ». Utiliser de préférence la version en lien avec la base de données
 *
 * @package models
 */
class SampleVideo
{
    private array $videos;

    function __construct()
    {
        $this->videos = array(
            new Video("BcgsOgjHgWA", "Video 1"),
            new Video("lcOxhH8N3Bo", "Video 2"),
            new Video("jTuBnZrLbq0", "Video 3"),
            new Video("M2VtfZDOcHQ", "Video 4"),
            new Video("i1iIaSbK9bg", "Video 5"),
            new Video("MTaHw-S6IDo", "Video 6"),
            new Video("KfMCApWc5xE", "Video 7"),
            new Video("igtN49I1CtM", "Video 8")
        );
    }

    function getVideos(): array
    {
        return $this->videos;
    }

    function getByVideoId($id)
    {
        $result = array_values(array_filter($this->videos, function ($video) use ($id) {
            return $video->videoId === $id;
        }));

        return array_pop($result);
    }
}