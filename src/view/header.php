<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/public/css/style.css">
    <link rel="icon" type="image/png" href="https://camo.githubusercontent.com/40ed6ace6e4988c8de03db99bc05433ccab33108/68747470733a2f2f706e67696d672e636f6d2f75706c6f6164732f6d7973716c2f6d7973716c5f504e4732352e706e67">
</head>
<body class="p-3 mb-2 bg-dark text-white">
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="?page=home"><img src="https://camo.githubusercontent.com/40ed6ace6e4988c8de03db99bc05433ccab33108/68747470733a2f2f706e67696d672e636f6d2f75706c6f6164732f6d7973716c2f6d7973716c5f504e4732352e706e67" width="20" height="20"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="?page=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=myfilms">Mes films</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=add">Ajouter un film</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=category">Catégorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=archives">Archives</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=pret">Prêts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=envie">Liste d'envie</a>
          </li>
        </ul>
      </div>
    </nav>
  </header></br></br>
<?php
if (!empty($this->errorMessage)) { 
  echo '<div class="alert alert-danger" role="alert">';
  echo $this->errorMessage;
  echo "</div>";
}
if (!empty($this->notification)) { 
  echo '<div class="alert alert-info" role="alert">';
  echo $this->notification;
  echo "</div>";
}
?>
</br>