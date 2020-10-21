<?php
class Details {

    private $title;
    private $model;
    private $detailFilm;
    private $errorMessage;
    private $noteFilm;
    private $convertNote;

    public function __construct() {
        $this->title = "Détails";
        $this->model = new Model();
    }

    public function manage() {
        $this->detailFilm = $this->model->modification($_GET["id"]);
        $this->convertNote= $this->model->convertNote($_GET["id"]);
        if ($this->detailFilm[0]["film_note"] == NULL) {
            $this->Film = $this->model->singleMovie($this->detailFilm[0]["film_idbase"]);
            $this->genres = $this->Film->genres;
            $this->idFilm = $this->Film->id;
            $this->nameFilm = $this->Film->original_title;
            $this->date = $this->Film->release_date;
            $this->img = $this->Film->poster_path;
            $this->desc = $this->Film->overview;
            $this->noteFilm = $this->Film->vote_average;
            $this->progressBar = $this->model->progressBar($this->noteFilm);
            $this->noteFilmBar = $this->noteFilm * 10;
            $this->video = $this->Film->videos->results[0]->key;
        }
        if ($this->detailFilm === false) {
            $this->errorMessage = "Désolé, impossible de voir le détail de ce film.";
        }
        
        include (__DIR__ . "./../view/view_details.php");
    }
    
}
?>