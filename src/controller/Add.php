<?php
class Add {

    private $title;
    private $model;
    private $newFilm;
    private $listCategory;
    private $notification;
    private $errorMessage;
    private $editFilm;
    private $editedFilm;
    private $modification;
    private $details;

    public function __construct() {
        $this->title = "Ajouter un film";
        $this->model = new Model();
    }

    public function manage() {
        $this->listCategory= $this->model->getAllCategory();
        
        if ($this->listCategory === false) {
            $this->errorMessage = "Désolé, impossible de récuperer la liste des catégories.";
        }
        $this->titre = "Ajouter un film";
            $this->name = "";
            $this->category ="";
            $this->pic = "";
            $this->note = "";
            $this->add = "Ajouter ce film";
            $this->id = "";
            $this->checked = "";
        if (isset($_GET["name"])) {
            $this->Film = $this->model->singleMovie($_GET["name"]);
            $this->genres = $this->Film->genres;
            $this->idFilm = $this->Film->id;
            $this->nameFilm = $this->Film->original_title;
            $this->date = $this->Film->release_date;
            $this->img = $this->Film->poster_path;
            $this->desc = $this->Film->overview;
            $this->noteFilm = $this->Film->vote_average;
            $this->progressBar = $this->model->progressBar($this->noteFilm);
            $this->noteFilmBar = $this->noteFilm * 10;
            if ($this->Film->videos->results[0]->key != NULL) {
            $this->video = $this->Film->videos->results[0]->key;
            }
        }
        if (isset($_POST["savename"])) {
        if ($_POST["savename"] != "" AND $_POST["savepic"] != "") {

           $this->newFilm = $this->model->addNewFilmApi($_POST["savename"], $_POST["savepic"], $_POST["saveid"]);
            if ($this->newFilm === true) {
                $this->notification = "Votre film à bien été ajouté";
            }           
            if ($this->newFilm === false) {
                $this->errorMessage = "Un problème est survenu lors de l'ajout de votre film";
            }
        }
        else {
            $this->errorMessage = "Veuillez remplir tous les champs";
        }
    }
        if (isset($_POST["namefilm"])) {
            if (isset($_POST["namefilm"])) {
                $this->Film= $this->model->filmTMDB($_POST["namefilm"]);
            }
        }
        else {

        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["seen"])) {
                    $_POST["seen"] = 0;
                }
                if ($_POST["name"] != "" AND $_POST["category"] != "" AND $_POST["pic"] != "" AND $_POST["note"] != "") {
                    $this->editedFilm = $this->model->editedFilm($_POST["name"], $_POST["category"], $_POST["pic"], $_POST["note"], $_POST["seen"], $_GET["id"]);
                    if ($this->editedFilm === true) {
                        $this->notification = "Votre film à bien été modifié";
                    }           
                    if ($this->editedFilm === false) {
                        $this->errorMessage = "Un problème est survenu lors de la modification de votre film";
                    }
                }
            }
            
            $this->modification = $this->model->modification($_GET["id"]);
            $this->titre = "Modifier un film";
            $this->name = $this->modification[0]['film_name'];
            $this->category = $this->modification[0]['category_name'];
            $this->pic = $this->modification[0]['film_pic'];
            $this->note = $this->modification[0]['film_note'];
            $this->add = "Modifier ce film";
            $this->id = "?page=add&id=" . $this->modification[0]['film_id'];
                if ($this->modification[0]['film_seen'] == 1) {
                    $this->checked = "checked";
                }
                else {
                    $this->checked = "";
                }
            $this->editFilm = $this->model->editFilm($_GET["id"]);
        }
        else {
            $this->titre = "Ajouter un film";
            $this->name = "";
            $this->category ="";
            $this->pic = "";
            $this->note = "";
            $this->add = "Ajouter ce film";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"])) {
                if (!isset($_POST["seen"])) {
                    $_POST["seen"] = 0;
                }
                if ($_POST["name"] != "" AND $_POST["category"] != "" AND $_POST["pic"] != "" AND $_POST["note"] != "") {
                    $this->newFilm = $this->model->addNewFilm($_POST["name"], $_POST["category"], $_POST["pic"], $_POST["note"], $_POST["seen"]);
                    if ($this->newFilm === true) {
                        $this->notification = "Votre film à bien été ajouté";
                    }           
                    if ($this->newFilm === false) {
                        $this->errorMessage = "Un problème est survenu lors de l'ajout de votre film";
                    }
                }
                else {
                    $this->errorMessage = "Veuillez remplir tous les champs";
                }
            }
        }
    }
        include (__DIR__ . './../view/view_add.php');
    }
    
}
?>