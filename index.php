<?php
require ('src/controller/Add.php');
require ('src/controller/Archives.php');
require ('src/controller/Category.php');
require ('src/controller/Details.php');
require ('src/controller/Envie.php');
require ('src/controller/Home.php');
require ('src/controller/MyFilms.php');
require ('src/controller/Pret.php');
require ('src/model/Model.php');

$page = filter_input(INPUT_GET, "page");

$road = array(
    "add" => Add::class,
    "archives" => Archives::class,
    "category" => Category::class,
    "details" => Details::class, 
    "envie" => Envie::class,
    "home" => Home::class,
    "myfilms" => MyFilms::class,
    "pret" => Pret::class
);
    foreach ($road as $roadValue => $className) {
        if ($page === $roadValue) {
            $controller = new $className;
            $controller->manage();
        break;
        }
    }
    if (!isset($controller)) {
        // ERROR 404
        $controller = new Home;
        $controller->manage();
    };
?>