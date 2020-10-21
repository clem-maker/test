<?php
class Category {

    private $title;
    private $model;
    private $addCategory;
    private $errorMessage;
    private $notification;
    private $listCategory;
    private $deleteCategory;

    public function __construct() {
        $this->title = "Catégories";
        $this->model = new Model();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deleteCategory = $this->model->deleteCategory($_GET["id"]);
        }
        if (isset($_POST["addcategory"])) {
            if ($_POST["addcategory"] != "") {
                $this->addCategory = $this->model->addNewCategory($_POST["addcategory"]);
                if ($this->addCategory === true) {
                    $this->notification = "Votre catégorie a bien été ajoutée";
                }           
                if ($this->addCategory === false) {
                    $this->errorMessage = "Un problème est survenu lors de l'ajout de votre catégorie";
                }
            }
            else {
                $this->errorMessage = "Veuillez remplir le champs catégorie";
            }
        }
        $this->listCategory= $this->model->getAllCategory();
        include (__DIR__ . './../view/view_category.php');
    }
    
}
?>