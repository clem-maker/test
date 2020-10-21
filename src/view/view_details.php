<?php
include ('header.php');
?>
<main class="center">
    </br><h1> Détails du film </h1></br>
    <?php
    if (isset($this->desc)) {
        echo "<form class='form' href='' method='post'></br>";
    echo    "<label for='name'> $this->nameFilm </label></br>";
    echo    "<input type='hidden' name='savename' value='$this->nameFilm'>";
    echo    "<label for='name'> $this->date </label></br>";
    echo    "<input type='hidden' name='savedate'>";
    echo    "<label for='name'><img src='https://image.tmdb.org/t/p/w500/" . $this->img . "' width='205px' height='275px'></label></br>";
    echo    "<input type='hidden' name='savepic' value='https://image.tmdb.org/t/p/w500/$this->img'>";
    echo '</br><div name="savecategory">';
    for ($i = 0; $i < count($this->genres); $i++) {
    echo "<label for='name'>" . $this->genres[$i]->name . ", </label>&nbsp";
    }
    echo "<input type='hidden' name='savecategory'>";
    echo "</br></br><label for='name'> $this->desc </label></br>";
    echo    "<input type='hidden' name='savedesc'>";
    echo '</br><div class="progress">';
    echo "<div class='progress-bar bg-$this->progressBar' role='progressbar' style='width: $this->noteFilmBar%'' aria-valuenow='$this->noteFilm' aria-valuemin='0' aria-valuemax='10'></div>";
    echo "</div></br>";
    echo    "<input type='hidden' name='savenote'>";
    echo    "<input type='hidden' name='saveid' value='$this->idFilm'>";
    if (isset($this->video)) {
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$this->video' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></br></br>";
    }
    echo "<button class='btn btn-success'><a href='?page=archives&idfilm=$this->idFilm'> Archiver </button>&nbsp";
    echo "</form>";
    echo "<button class='btn btn-primary'><a href='?page=envie&id=$this->idFilm'> Ajouter à ma liste d'envie </a></button></br>";

    }
    else {
    foreach ($this->detailFilm as $detail) {
    echo '<img src="' . $detail["film_pic"] . '" width="205px" height="275px">';
    echo '</br></br><h5>' . $detail["category_name"] . '<h5></br>';
    if ($detail["film_seen"] == 0) {
    echo '<p> film déjà vu : non <p></br>';
    }
    else {
        echo '<p>film déjà vu : oui <p></br>';
    }
    }
    for ($i = 0; $i < $this->convertNote; $i++) {
    echo "<img src='src/public/images/1.png'' width='60px' height='30px'>";
    }
    echo '</br></br><div class="col">';
    echo '<a href="?page=add&id=' . $detail["film_id"] . '"><button class="btn btn-success" type="submit"> Modifier </button></a>&nbsp;&nbsp;&nbsp;';
    echo '<a href="?page=archives&id=' . $detail["film_id"] . '"><button class="btn btn-danger" type="submit"> Archiver </button></a>';
    echo "</div>";
}
    ?>
</main>
<?php
include ('footer.php');
?>