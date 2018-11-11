<?php
class find_recipe extends Database
{
    private $_table;
    private $_bdd;
    private $_avg_notes;
    private $_ingredients;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE)
            $this->_bdd =  $toto->try_connection();
        else
            $this->_bdd=FALSE;
    }

    /*
        Renvoyer tableau (plus pratique dans le controlleur pour encoder en Json).
    */

    public function search_recipe_id($indice)
    {
        $sql = "SELECT * FROM recipe WHERE id_recette=".$indice;
        $recipe = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		$id_creator = $recipe['id_creator'];
		$sql4 = "SELECT pseudo, mail FROM creator WHERE id_creator=".$id_creator;
		$creator = $this->_bdd->query($sql4)->fetch(PDO::FETCH_ASSOC);
		$recipe['creator_pseudo']=$creator['pseudo'];
		$recipe['creator_mail']=$creator['mail'];
        $sql2 = "SELECT id_category FROM quantity_category WHERE id_recipe=".$recipe['id_recette'];
        $tmp = $this->_bdd->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
		$i=0;
		while (isset($tmp[$i]['id_category']))
        {
            $sql3 = "SELECT name_category FROM category WHERE id_category=".$tmp[$i]['id_category'];
            $tmp2 = $this->_bdd->query($sql3)->fetch();
			$tmp3[$i] = $tmp2['name_category'];
			$i++;
		}
		$sql5 = "SELECT step FROM step WHERE id_recipe=".$indice." ORDER BY number_step";
		$tmp4 = $this->_bdd->query($sql5)->fetchAll(PDO::FETCH_ASSOC);
		$i=0;
		while (isset($tmp4[$i]['step']))
        {
            $tmp5[$i] =  $tmp4[$i]['step'];
            $i++;
        }
		$recipe['step'] = $tmp5;
		$recipe['category'] = $tmp3;
		$recipe['avg_note'] = $this->show_avg($indice);
		$recipe['ingredients'] = $this->show_ingredient($indice);
        return $recipe;
	}

    public function search_notes_id_recipe($indice)
    {
        $requete2 = "SELECT AVG(`note`) FROM `notes` WHERE id_recipe=".$indice;
        $note = $this->_bdd->query($requete2)->fetch();
		if ($note[0] == FALSE)
            return "0";
        else
            return round($note[0], 2);
	}

    public function search_ingredient_id($indice)
    {
        $sql = "SELECT A.value, B.name_quantity, C.name_ingredient
				FROM quantity_ingredient A, lebel_quantity B, ingredient C
				WHERE A.id_recipe = ".$indice." AND A.id_quantity=B.id_quantity
					AND A.id_ingredient=C.id_ingredient";
        $tmp = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		return $tmp;

	}

    public function show_avg($indice)
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
        {
            $this->_avg_notes = $this->search_notes_id_recipe($indice);
            return $this->_avg_notes;
        }
    }

    public function show_table($indice)
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
        {
            $this->_table = $this->search_recipe_id($indice);
            return $this->_table;
        }
    }

    public function show_ingredient($indice)
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
        {
            $this->_ingredients = $this->search_ingredient_id($indice);
            return $this->_ingredients;
        }
    }

}
?>