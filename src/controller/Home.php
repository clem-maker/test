<?php
class Home {

    private $title;
    private $model;

    public function __construct() {
        $this->title = "Home";
        $this->model = new Model();
    }

    public function manage() {
        // $chuck = file_get_contents('https://api.chucknorris.io/jokes/random');
        // $chuck = json_decode($chuck);
        // echo $chcuk->value;
        include (__DIR__ . './../view/view_home.php');
    }
    
}
?>