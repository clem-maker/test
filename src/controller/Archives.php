<?php
class Archives {

    private $title;
    private $model;
    private $archiveFilms;
    private $listFilm;

    public function __construct() {
        $this->title = "Archives";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_GET["id"])) {
        $this->archiveFilms = $this->model->archiveFilm($_GET["id"]);
        }
        if (isset($_GET["idfilm"])) {
            $this->changeId = $this->model->changeId($_GET["idfilm"]);
            $newId = $this->changeId[0]["film_id"];
            $this->archiveFilms = $this->model->archiveFilm($newId);
        }
        $this->listFilm = $this->model->getArchivedFilm();
        if (count($this->listFilm) === 0) {
            $this->errorMessage = 'Aucun film archivé pour le moment';
        }
        include (__DIR__ . './../view/view_archives.php');
    }
    
}
?>