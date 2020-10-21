<?php
class Model {

    private $bdd;

    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbName = 'movies_land';

        try {
            $this->bdd = new PDO ("mysql:host=$host;dbname=$dbName;charset=utf8", $user, 
            $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            var_dump('ERROR : Echec lors de la tentetive de conexion : ' . $e->getMessage());
        }
    }

    public function chooseCategory($category) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM category WHERE category_name = ?');
            $request->execute(array(
                $category
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function addNewFilm($name, $category, $pic, $note, $seen) {
        try {
            $cate = $this->chooseCategory($category)[0]["category_id"];
            $request = $this->bdd->prepare('INSERT INTO film(film_name, 
                                                            id_category,
                                                            film_pic,
                                                            film_note,
                                                            film_seen)
                                                            VALUES (?, ?, ?, ?, ?)');
            $request->execute(array(
                $name,
                $cate,
                $pic,
                $note,
                $seen
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function addNewFilmApi($name, $pic, $id) {
        try {
            $request = $this->bdd->prepare('INSERT INTO film(film_name, 
                                                            film_pic,
                                                            film_idbase)
                                                            VALUES (?, ?, ?)');
            $request->execute(array(
                $name,
                $pic,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function getFilms() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function choosefilm($name) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_name = ?');
            $request->execute(array(
                $name
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getPret($name, $date, $who) {
        try {
            $whatFilm = $this->choosefilm($name)[0]["film_id"];
            var_dump($whatFilm);
            $request = $this->bdd->prepare('INSERT INTO prets(prets_name,
                                                            prets_date,
                                                            prets_who)
                                                            VALUES (?, ?, ?)');
            $request->execute(array(
                $whatFilm,
                $date,
                $who
            ));
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function deletePret($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM prets WHERE prets_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getFilmsPret() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM prets
                                            LEFT JOIN film ON prets.prets_name = film.film_id');
            $request->execute();
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAllFilms() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_archive = ? AND film_envie = ?');
            $request->execute(array(
                0,
                0
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function filterNo() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_seen = ? AND film_archive = ?');
            $request->execute(array(
                0,
                0
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function filterYes() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_seen = ? AND film_archive = ?');
            $request->execute(array(
                1,
                0
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function filterNote() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_archive = ? ORDER BY film_note DESC');
            $request->execute(array(
                0
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function filterAtoZ() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_archive = ? ORDER BY film_name ASC');
            $request->execute(array(
                0
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getAllCategory() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM category ORDER BY category_name ASC');
            $request->execute();
            $categories = $request->fetchAll();
            return $categories;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function modification($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film 
                                            LEFT JOIN category ON film.id_category = category_id
                                            WHERE film_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function convertNote($detail) {
        try {
            $request = $this->bdd->prepare('SELECT film_note FROM film WHERE film_id = ?');
            $request->execute(array(
                $detail
            ));
            $notes = $request->fetch();
            if ($notes[0] == 1) {
                return 1;
            } 
            if ($notes[0] == 2) {
                return 2;
            } 
            if ($notes[0] == 3) {
                return 3;
            } 
            if ($notes[0] == 4) {
                return 4;
            } 
            if ($notes[0] == 5) {
                return 5;
            } 
        }
        catch (Execption $e) {
            return false;
        }
    }

    public function editFilm($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_id = ?');
            $request->execute(array(
                $id
            ));
            $edit = $request->fetchAll();
            return $edit;
        }
        catch (Execption $e) {
            return false;
        }
    }

    public function editedFilm($name, $category, $pic, $note, $seen, $id) {
        try {
            $cate = $this->chooseCategory($category)[0]["category_id"];
            var_dump($cate);
            $request = $this->bdd->prepare('UPDATE film SET film_name = ?,
                                                            id_category = ?,
                                                            film_pic = ?,
                                                            film_note = ?,
                                                            film_seen = ?
                                                            WHERE film_id = ?');
            $request->execute(array(
                $name,
                $cate,
                $pic,
                $note,
                $seen,
                $id
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }
    }

    public function addNewCategory($newCategory) {
        try {
            $request = $this->bdd->prepare('INSERT INTO category(category_name)
                                                            VALUES (?)');
            $request->execute(array(
                $newCategory
                )); 
                return true;
            }
        catch (Exception $e) {
            return false;
        }

    }

    public function deleteCategory($id) {
        try {
            $request = $this->bdd->prepare('DELETE FROM category WHERE category_id = ?');
            $request->execute(array(
                $id
            ));
            $deleted = $request->fetchAll();
            return $deleted;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function archiveFilm($id) {
        try {
            $request = $this->bdd->prepare('UPDATE film SET film_archive = ?
                                                            WHERE film_id = ?');
            $request->execute(array(
                1,
                $id
                )); 
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function envieFilm($name) {
        try {
            $request = $this->bdd->prepare('UPDATE film SET film_envie = ?
                                                            WHERE film_name = ?');
            $request->execute(array(
                1,
                $name
                )); 
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getEnvieFilm() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_envie = ?');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function getArchivedFilm() {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_archive = ?');
            $request->execute(array(
                1
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function filmTMDB($name) {
        $film = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=6985e562c05ec6150e49c08a88da0226&language=fr&page=1&include_adult=false&query=$name");
        $film = json_decode($film);
        return $film;
    }

    public function singleMovie($id) {
        $film = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=6985e562c05ec6150e49c08a88da0226&language=fr&append_to_response=videos");
        $film = json_decode($film);
        return $film;
    }

    public function changeId($id) {
        try {
            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_idbase = ?');
            $request->execute(array(
                $id
            ));
            $film = $request->fetchAll();
            return $film;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function progressBar($note) {
        if ($note == 0 OR $note < 3) {
            $color = "danger";
            return $color;
        }
        elseif ($note >= 3 AND $note < 7) {
            $color = "warning";
            return $color;
        }
        elseif ($note >= 7 AND $note < 11) {
            $color = "success";
            return $color;
        }
    }
}