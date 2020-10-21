<?php
class Envie {

    private $title;
    private $model;
    private $envieFilms;
    private $erroeMessage;

    public function __construct() {
        $this->title = "Liste d'envie";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->movie = $this->model->singleMovie($_GET["id"]);
            $this->movieBase =$this->model->addNewFilmApi($this->movie->original_title, "https://image.tmdb.org/t/p/w500/" . $this->movie->poster_path, $_GET["id"]);
            $this->envieFilms = $this->model->EnvieFilm($this->movie->original_title);
            }
            $this->listFilm = $this->model->getEnvieFilm();
            if (count($this->listFilm) === 0) {
                $this->errorMessage = 'Aucun film pour le moment';
            }
        include (__DIR__ . './../view/view_envie.php');
    }
    
}
?>