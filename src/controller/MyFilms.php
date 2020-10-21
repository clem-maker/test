<?php
class MyFilms {

    private $title;
    private $model;
    private $listFilm;
    private $errorMessage;
    private $filterFilm;
    private $filterNon;
    private $filterYes;
    private $filterNote;
    private $filterAtoZ;

    public function __construct() {
        $this->title = "Mes films";
        $this->model = new Model();
    }

    public function manage() {
        $this->listFilm = $this->model->getAllFilms();
        if (isset($_GET["all"])) {
            $this->listFilm = $this->model->getAllFilms();
        }
        elseif (isset($_GET["nonvues"])) {
            $this->listFilm = $this->model->filterNo();
        }
        elseif (isset($_GET["vus"])) {
            $this->listFilm = $this->model->filterYes();
        }
        elseif (isset($_GET["note"])) {
            $this->listFilm = $this->model->filterNote();
        }
        elseif (isset($_GET["AtoZ"])) {
            $this->listFilm = $this->model->filterAtoZ();
        }
        if ($this->listFilm === false) {
            $this->errorMessage = "Désolé, impossible de récuperer la liste des films.";
        } else if (count($this->listFilm) === 0) {
            $this->errorMessage = 'Aucun film pour le moment';
        }
        include (__DIR__ . './../view/view_myfilms.php');
    }
    
}
?>