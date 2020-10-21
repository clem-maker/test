<?php
include ('header.php');
?>
<main class="center"></br>
    <h1> Liste d'envie </h1></br>
    <div class="col">
        <label> Trier par popularitée selon l'année : </label>
        <select name='year'>;
<?php
     for ($i = 2020; $i > 1900; $i--) { 
         echo '<option>' . $i . '</option>';
     }
    echo "</select>";
    echo "</div></br>";
    foreach ($this->listFilm as $film) { 
                echo "<img src='" . $film['film_pic'] . "' width='205px' height='275px' style='margin: 10px;'>";
            }
?>
</main>
<?php
include ('footer.php');
?>