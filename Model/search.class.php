<?php

/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 19/02/2016
 * Time: 23:47
 */
class Search extends Database
{
    private $_bdd;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE) {
            $this->_bdd = $toto->try_connection();
        } else {
            $this->_bdd = FALSE;
        }
    }

    public function search($request)
    {
        //print_r($request['ingredients']);
        $flag = 0;
        $flag2 = 0;
        $resultat = array();
        $id_recipe_category = array();
        $id_recipe_ingredient = array();
        $id_recipe_titre = array();
        if (empty($request['ingredients']))
            $ingredient = array();
        else
            $ingredient = $request['ingredients'];
        if (empty($request['category']))
            $category = array();
        else
            $category = $request['category'];
        if (empty($request['name_recipe']))
            $titre = array();
        else
            $titre = $request['name_recipe'];
        if (!empty($ingredient)) {
            $j = 0;
            $id_recipe = $this->_bdd->query("SELECT id_recette FROM recipe")->fetchAll(PDO::FETCH_COLUMN);
            for ($i = 0; $i < sizeof($id_recipe); $i++) {
                $sql = $this->_bdd->query("SELECT A.name_ingredient FROM ingredient A, quantity_ingredient B WHERE A.id_ingredient=B.id_ingredient AND B.id_recipe = '" . $id_recipe[$i] . "'");
                $id_recette = $sql->fetchAll(PDO::FETCH_COLUMN);
                $result = array_intersect($id_recette, $ingredient);
                print_r($result);
                print_r($id_recette);
                if (sizeof($result) / sizeof($ingredient) > $request['percent']) {
                    $id_recipe_ingredient[$j] = $id_recipe[$i];
                    $j++;
                }
            }
            $flag = 1;
            $flag2++;
        }

        if (!empty($category)) {
            $j = 0;
            $id_recipe = $this->_bdd->query("SELECT id_recette FROM recipe")->fetchAll(PDO::FETCH_COLUMN);
            for ($i = 0; $i < sizeof($id_recipe); $i++) {
                $sql = $this->_bdd->query("SELECT A.name_category FROM category A, quantity_category B WHERE A.id_category=B.id_category AND B.id_recipe = '" . $id_recipe[$i] . "'");
                $id_recette = $sql->fetchAll(PDO::FETCH_COLUMN);
                $result = array_intersect($category, $id_recette);
                if (isset($result[0]))
                    $id_recipe_category[$j] = $id_recipe[$i];
                $j++;
            }
            $flag = 2;
            $flag2++;
        }

        if (!empty($titre)) {
            $id_recipe_titre = $this->_bdd->query("SELECT id_recette FROM recipe WHERE name_recette='" . $titre . "'")->fetchAll(PDO::FETCH_COLUMN);
            $flag = 3;
            $flag2++;
        }

        if ($flag2 > 1) {
            if ($flag == 1)
                $result = array_intersect($id_recipe_ingredient, $id_recipe_category, $id_recipe_titre);
            elseif ($flag == 2)
                $result = array_intersect($id_recipe_category, $id_recipe_titre, $id_recipe_ingredient);
            elseif ($flag == 3)
                $result = array_intersect($id_recipe_titre, $id_recipe_ingredient, $id_recipe_category);
            else
                return FALSE;
        }
        else {
            if ($flag == 1)
                $result = $id_recipe_ingredient;
            elseif ($flag == 2)
                $result = $id_recipe_category;
            elseif ($flag == 3)
                $result = $id_recipe_titre;
            elseif ($flag == 0)
                $result = $this->_bdd->query("SELECT id_recette FROM recipe")->fetchAll(PDO::FETCH_COLUMN);
            else
                return FALSE;
        }

        $i=0;
        foreach($result as $value)
        {
            $resultat[$i]['id_recipe'] = $value;
            $i++;
        }
        if (is_null($resultat))
            return NULL;
        else
        {
            $result = $resultat;
            $endresult = new find_most();
            $endresult = $endresult->organize_recipe($result);
            return $endresult;
        }
    }

    public function get_id_random()
    {
        $sql = "SELECT id_recette FROM recipe";
        $tmp = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        $taille = sizeof($tmp);
        $id_random = rand(1, $taille);
        return ($id_random);
    }

}