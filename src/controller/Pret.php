<?php
class Pret {

    private $title;
    private $model;
    private $listFilm;
    private $listFilmPrete;
    private $notification;
    private $errorMessage;
    private $deletePret;

    public function __construct() {
        $this->title = "Prêts";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deletePret = $this->model->deletePret($_GET["id"]);
        }
        $this->listFilm = $this->model->getFilms();
        if (isset($_POST["name"]) AND isset($_POST["date"]) AND isset($_POST["who"])) {
            if ($_POST["name"] != "" AND $_POST["date"] != "" AND $_POST["who"] != "") {
                $this->listFilmPrete = $this->model->getPret($_POST["name"], $_POST["date"], $_POST["who"]);
                if ($this->listFilmPrete === true) {
                    $this->notification = "Votre film à bien été prété";
                }           
                if ($this->listFilmPrete === false) {
                    $this->errorMessage = "Un problème est survenu lors du prêt de votre film";
                }
            }
            else {
                $this->errorMessage = "Veuillez remplir tous les champs";
            }
        }
        $this->listPret = $this->model->getFilmsPret();
        include (__DIR__ . './../view/view_prets.php');
    }
    
}
?>