<?php
include ('header.php');
?>
<main class="center"></br>
<div class="col">
    <form class='form' href='' method='post'>
    <label for="name"> Nom du film </label></br>
    <input type='text' name='namefilm'></br></br>
    <button class='btn btn-success' type="submit"> Rechercher sur TMDB </button>
</form>
</div></br>
<?php
if (isset($this->Film->results)) {
    for ($i = 0; $i < count($this->Film->results); $i++) {
        echo "<a href='?page=add&name=" . $this->Film->results[$i]->id . "'>";
        echo '<img src="https://image.tmdb.org/t/p/w500/' . $this->Film->results[$i]->poster_path . '" width="205px" height="275px"></a></br>';
        echo "<h5>" . $this->Film->results[$i]->original_title . "</h5>";
    }
}
    if (isset($this->desc)) {
    echo "<form class='form' href='' method='post'></br>";
    echo    "<label for='name'> $this->nameFilm </label></br>";
    echo    "<input type='hidden' name='savename' value='$this->nameFilm'>";
    echo    "<label for='name'> $this->date </label></br>";
    echo    "<input type='hidden' name='savedate'>";
    echo    "<label for='name'><img src='https://image.tmdb.org/t/p/w500/" . $this->img . "' width='205px' height='275px'></label></br>";
    echo    "<input type='hidden' name='savepic' value='https://image.tmdb.org/t/p/w500/$this->img'>";
    echo '<div name="savecategory">';
    for ($i = 0; $i < count($this->genres); $i++) {
    echo "<label for='name'>" . $this->genres[$i]->name . ", </label>&nbsp";
    }
    echo "<input type='hidden' name='savecategory'>";
    echo "<label for='name'> $this->desc </label></br>";
    echo    "<input type='hidden' name='savedesc'>";
    echo '</br><div class="progress">';
    echo "<div class='progress-bar bg-$this->progressBar' role='progressbar' style='width: $this->noteFilmBar%'' aria-valuenow='$this->noteFilm' aria-valuemin='0' aria-valuemax='10'></div>";
    echo "</div></br>";
    echo    "<input type='hidden' name='savenote'>";
    echo    "<input type='hidden' name='saveid' value='$this->idFilm'>";
    if (isset($this->video)) {
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$this->video' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></br></br>";
    }
    echo "<button class='btn btn-success' type='submit'> Ajouter à mes films </button>&nbsp";
    echo "</form>";
    echo "<button class='btn btn-primary'><a href='?page=envie&id=$this->idFilm'> Ajouter à ma liste d'envie </a></button></br>";
}
?>
</br><h5> OU </h5></br>
<?php
    echo "<h1> $this->titre </h1>";
    echo "<form class='form' href='$this->id' method='post'></br>";
    echo '<div class="col">';
    echo    '<label for="name"> Nom du film </label></br>';
    echo    "<input type='text' name='name' value='$this->name'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="inputState"> Sélectionnez la catégorie </label></br>';
    echo    "<select id='inputState' name='category' value='$this->category'>";
    echo        "<option selected> $this->category </option>";
        for ($i = 0; $i < count($this->listCategory); $i++) { 
            echo '<option>' . $this->listCategory[$i]['category_name'] . '</option>';
        }
?>
    </select>
    </div></br>
    <div class="col">
        <label for="name"> Affiche du film </label></br>
<?php
    echo    "<input type='text' name='pic' value='$this->pic' style='width: 1000px;''>";
?>
    </div></br>
    <div class="col">
        <label for="inputState"> Note du film </label></br>
        <select id="inputState" name="note">
<?php
    echo "<option selected> $this->note </option>";
    for ($i = 1; $i < 6; $i++) {
        echo "<option>$i</option>";
    }
?>
        </select>
    </div></br>
    <div class="col">
        <div class="form-check">
        <?php
            echo "<input $this->checked class='form-check-input' type='checkbox' name='seen' value='1' id='gridCheck'>";
        ?>
            <label class="form-check-label" for="gridCheck">Film visionné</label>
        </div>
    </div></br>
    <div class="col">
<?php
    echo    "<button class='btn btn-success' type='submit'> $this->add </button>";
?>
    </div>
</form>
</main>
<?php
include ('footer.php');
?>