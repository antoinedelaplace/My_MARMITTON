<?php
class add_database extends Database
{
    private $_bdd;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE)
            $this->_bdd =  $toto->try_connection();
        else
            $this->_bdd=FALSE;
    }

    public function add_recipe($recipe)
    {
        //print_r($recipe);
        $resultat = array();
        $ingredient = $recipe['ingredients'];
        $sql = "SELECT name_recette FROM recipe";
        $nom = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        $name_recipe = str_split($recipe['name_recipe']);
        $i=0;
        for ($j=0; $j<sizeof($ingredient); $j++)
        {
            $ingredient_send[$j] = $ingredient[$j]['ingredient'];
        }
        while (isset($nom[$i]))
        {
            $name = str_split($nom[$i]);
            $verify=array_intersect($name, $name_recipe);
            $sql = "SELECT id_recette FROM recipe WHERE name_recette='".str_replace("'", "''", $nom[$i])."'";
            $id_recette = $this->_bdd->query($sql)->fetch(PDO::FETCH_COLUMN);
            $sql = $this->_bdd->query("SELECT A.name_ingredient FROM ingredient A, quantity_ingredient B, recipe C WHERE A.id_ingredient=B.id_ingredient AND C.name_recette = '".str_replace("'", "''", $nom[$i])."' AND C.id_recette = B.id_recipe");
            $ingredient_recipe=$sql->fetchAll(PDO::FETCH_COLUMN);
            $verify2=array_intersect($ingredient_send, $ingredient_recipe);
            //echo '<pre>';
            //echo $nom[$i];
            //var_dump(sizeof($verify2) / sizeof($ingredient_recipe));
            //var_dump((sizeof($verify) / sizeof($name_recipe)));
            if ((sizeof($verify2) / sizeof($ingredient_recipe)) > 0.85)
            {
                $resultat[$j] = $id_recette[0];
                $j++;
            }
            $i++;
        }

        if (empty($resultat))
        {
            $sql = "SELECT COUNT(`id_recette`) FROM recipe";
            $id_recipe = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		    $id_recipe = (($id_recipe['COUNT(`id_recette`)']) + 1);
		    $date = date_create()->format('Y-m-d');
		    $sql = "SELECT COUNT(`id_creator`) FROM creator";
		    $nbr_creator = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		    $id_creator = (($nbr_creator['COUNT(`id_creator`)']) + 1);
		    $sql = $this->_bdd->prepare("INSERT INTO creator (pseudo, mail, id_creator) VALUES (:creator, :creator_email, :id_creator)");
            $sql->execute(array(
                ':creator' => $recipe['creator'],
                ':creator_email' => $recipe['creator_email'],
                ':id_creator' => $id_creator
            ));
		    $sql = "INSERT INTO recipe (id_recette, name_recette, date_create, picture, id_creator) VALUES (:id_recette, :name_recette, :date_create, :picture, :id_creator)";
           // $request = $this->_bdd->query($sql);
		    $sql = $this->_bdd->prepare($sql);
            $sql->execute(array(
                ':id_recette' => $id_recipe,
                ':name_recette' => $recipe['name_recipe'],
                ':date_create' => $date,
                ':picture' => $recipe['picture'],
                ':id_creator' => $id_creator
            ));
            $sql = "SELECT * FROM recipe";
		    $recette = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		    for ($i = 0; $i < sizeof($ingredient); $i++) {
                $sql = $this->_bdd->query("SELECT id_ingredient FROM ingredient WHERE name_ingredient='" . str_replace("'", "''", $ingredient[$i]['ingredient']) . "'")->fetch(PDO::FETCH_ASSOC);
			    if (!is_null($sql['id_ingredient']))
                    $id_ingredient = $sql['id_ingredient'];
                else {
                    $sql = "SELECT COUNT(`id_ingredient`) FROM ingredient";
                    $id_ingredient = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
				    $id_ingredient = (($id_ingredient['COUNT(`id_ingredient`)']) + 1);
				    $this->_bdd->query("INSERT INTO ingredient (id_ingredient, name_ingredient) VALUES ('" . $id_ingredient . "' , '" . str_replace("'", "''", $ingredient[$i]['ingredient']) . "')");
			    }

			    $sql = $this->_bdd->query("SELECT id_quantity FROM lebel_quantity WHERE name_quantity='" . $ingredient[$i]['quantity'] . "'")->fetch(PDO::FETCH_ASSOC);
			    if (!is_null($sql['id_quantity']))
                    $id_quantity = $sql['id_quantity'];
                else {
                    $sql = "SELECT COUNT(`id_quantity`) FROM lebel_quantity";
                    $id_quantity = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
			    	$id_quantity = (($id_quantity['COUNT(`id_quantity`)']) + 1);
                    $sql = $this->_bdd->prepare("INSERT INTO lebel_quantity (id_quantity, name_quantity) VALUES (:id_quantity, :name_quantity)");
                    $sql->execute(array(
                        ':id_quantity' => $id_quantity,
                        ':name_quantity' => str_replace("'", "''", $ingredient[$i])
                    ));
			    }

		    	$sql = "SELECT COUNT(`id`) FROM quantity_ingredient";
		    	$id_quantity_ingredient = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		    	$id_quantity_ingredient = (($id_quantity_ingredient['COUNT(`id`)']));
		    	$sql = $this->_bdd->prepare("INSERT INTO quantity_ingredient (id, id_ingredient, id_quantity, id_recipe, value) VALUES (:id_quantity_ingredient, :id_ingredient, :id_quantity, :id_recipe, :valeur)");
	    	    $sql->execute(array(
                    ':id_quantity_ingredient' => $id_quantity_ingredient,
                    ':id_ingredient' => $id_ingredient,
                    ':id_quantity' => $id_quantity,
                    ':id_recipe' => $id_recipe,
                    ':valeur' => $ingredient[$i]['value']
                ));
            }
		    $category = $recipe['category'];
		    for ($i = 0; $i < sizeof($category); $i++) {
                $sql = $this->_bdd->query("SELECT id_category FROM category WHERE name_category='" . $category[$i] . "'")->fetch(PDO::FETCH_ASSOC);
			    if (!is_null($sql['id_category']))
                    $id_category = $sql['id_category'];
                else {
                    $sql = "SELECT COUNT(`id_category`) FROM category";
                    $id_category = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
				    $id_category = (($id_category['COUNT(`id_category`)']) + 1);
				    $sql = $this->_bdd->prepare("INSERT INTO category (id_category, name_category) VALUES (:id_category, :category)");
                    $sql->execute(array(
                        ':id_category' => $id_category,
                        ':category' => $category[$i]
                    ));
			    }
			    $sql = "SELECT COUNT(`id`) FROM quantity_category";
			    $id_quantity_category = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
			    $id_quantity_category = (($id_quantity_category['COUNT(`id`)']) + 1);
			    $this->_bdd->query("INSERT INTO quantity_category (id, id_category, id_recipe) VALUES ('" . $id_quantity_category . "' , '" . $id_category . "' ,  '" . $id_recipe . "')");
		    }

		    $step = $recipe['step'];
		    $sql = "SELECT COUNT(`id`) FROM step";
		    $id_step = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		    $id_step = (($id_step['COUNT(`id`)']));
		    for ($i = 0; $i < sizeof($step); $i++) {
                $sql = $this->_bdd->prepare("INSERT INTO step (id, id_recipe, number_step, step) VALUES (:id, :id_recipe, :number_step, :step)");
                $sql = $sql->execute(array(
                    ':id' => $id_step,
                    ':id_recipe' => $id_recipe,
                    ':number_step' => $i,
                    ':step' => str_replace("'", "''", $step[$i])
                ));
                $id_step++;
            }
            $mail = new mail();
            $mail->add_recipe($recipe['creator_email'], $id_recipe, $recipe['name_recipe']);
            return $id_recipe;
        }
    else
        {
            $mail=new mail();
            $mail->no_recipe($recipe['creator_email'], $recipe['name_recipe'], $resultat[1]);
            return -1;
        }
	}

    public function add_comment($id_recipe, $note, $comment, $pseudo)
    {
        $sql = "SELECT COUNT(`id`) FROM notes";
        $id_notes = $this->_bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
		$id_notes = (($id_notes['COUNT(`id`)']) + 1);
		$sql=$this->_bdd->prepare("INSERT INTO notes (id, id_recipe, note, commentaire, pseudo) VALUES (:id, :id_recipe, :note, :comment, :pseudo)");
		$sql = $sql->execute(array(
            ':id' => $id_notes,
            ':id_recipe' => $id_recipe,
            ':note' => $note,
            ':comment' => $comment,
            ':pseudo' => $pseudo
        ));
        $avg_note = new find_recipe();
        $moyenne = $avg_note->search_notes_id_recipe($id_recipe);
		if ($sql == FALSE)
            return FALSE;
        else
            return $moyenne;
	}
}
?>