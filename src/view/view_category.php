<?php
include ('header.php');
?>
<main class="center"></br>
    <h1> Gestion des catégories </h1>
    <form class='form' href='' method='post'></br>
        <div class="col">
            <input type='text' name='addcategory' placeholder=" indiquer ici le nom d'une catégorie" style="width: 300px;">
        </div></br>
        <div class="col">
            <button class="btn btn-success" type='submit'> Ajouter </button>
        </div>
    </form></br></br></br>
<?php
for ($i = 0; $i < count($this->listCategory); $i++) { 
    echo '<a href="?page=category&id=' . $this->listCategory[$i]['category_id']. '">';
    echo '<button class="btn btn-danger" type="button" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span> ';
    echo $this->listCategory[$i]['category_name'];
    echo '</button></br></br></a>';
}
?>
</main>
<?php
include ('footer.php');
?>