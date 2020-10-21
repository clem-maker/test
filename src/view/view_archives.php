<?php
include ('header.php');
?>
<main class="center"></br>
    <h1> Liste des films archivés </h1></br>
<?php
    foreach ($this->listFilm as $film) { 
                echo "<img src='" . $film['film_pic'] . "' width='205px' height='275px' style='margin: 10px;'>";
            }
?>
</main>
<?php
include ('footer.php');
?>