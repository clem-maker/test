<?php
include ('header.php');
?>
<main class="center"></br>
    <h1> Gestion des prêts </h1></br>
    <form class='form' href='' method='post'></br>
        <div class="col">
            <input type='text' name='who' placeholder=" Nom et Prénom de l'empreinteur " style="width: 300px;">
        </div></br>
        <div class="col">
            <label for="name"> Date du prêt </label></br>
            <input type='date' name='date'>
        </div></br>
        <div class="col">
            <label for="inputState"> Sélectionnez le film à préter </label></br>
                <select id='inputState' name='name'>
<?php
    for ($i = 0; $i < count($this->listFilm); $i++) { 
        echo '<option>' . $this->listFilm[$i]['film_name'] . '</option>';
    }
?>
                </select>
        </div></br>
        <div class="col">
            <button class="btn btn-success" type='submit'> Ajouter </button>
        </div>
    </form></br></br>
<?php
    echo "<h1> Films prétés </h1></br>";
    foreach ($this->listPret as $film) { 
        echo '<a href="?page=pret&id=' . $film['prets_id']. '">';
        echo '<button class="btn btn-danger" type="button" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span> ';
        echo $film['film_name'] . " prété à " . $film['prets_who'] . " le " . $film['prets_date'] . "</h6></br>";
        echo '</button></br></br></a>';
    }
?>
</main>
<?php
include ('footer.php');
?>