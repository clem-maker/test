<?php
include ('header.php');
?>
<main class="center"></br>
    <h1> Liste de mes films </h1></br>
    <div>
        <a href="?page=myfilms&all"><button class="btn btn-success" type="submit"> Tous les films </button></a>&nbsp;&nbsp;
        <a href="?page=myfilms&nonvues"><button class="btn btn-primary" type="submit"> Uniquement les non vues </button></a>&nbsp;&nbsp;
        <a href="?page=myfilms&vus"><button class="btn btn-danger" type="submit"> Uniquement les vus </button></a>&nbsp;&nbsp;
        <a href="?page=myfilms&note"><button class="btn btn-secondary" type="submit"> Classés par note </button></a>&nbsp;&nbsp;
        <a href="?page=myfilms&AtoZ"><button class="btn btn-info" type="submit"> De A à Z </button></a>
    </div>
    <div></br></br>
        <?php 
            foreach ($this->listFilm as $film) { 
                echo "<a href='?page=details&id=" . $film['film_id'] . "'><img src='" . $film['film_pic'] . "' width='205px' height='275px' style='margin: 10px;'></a>";
            }
        ?>
    </div>
    </br>
</main>
<?php
include ('footer.php');
?>