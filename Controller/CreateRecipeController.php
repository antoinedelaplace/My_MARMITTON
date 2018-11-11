<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 10/02/2016
 * Time: 14:09
 */
require_once "Model/Database.php";

class CreateRecipeController
{

    public function getView()
    {
        //Création de la vue
        require "View/add_recipe.php";
    }

    public function addRecipe($infos_recipe)
    {
        //print_r($infos_recipe);
        require_once "Model/Database.php";
        $add_database = new add_database();

        $data['creator']=$infos_recipe['pseudo'];
        $data['creator_email'] = $infos_recipe['email'];
        $data['name_recipe'] = $infos_recipe['title'];
        $i=1;
        $j=0;
        while (isset($infos_recipe['step_'.$i]))
        {
            if (!is_null($infos_recipe['step_'.$i]))
            {
                $tmp[$j] = $infos_recipe['step_' . $i];
                $j++;
            }
            $i++;
        }
        $data['step'] = $tmp;
        $i=1;
        while (isset ($infos_recipe['name_ingredient_'.$i]))
        {
            $tmp2['ingredient'] = $infos_recipe['name_ingredient_'.$i];
            $tmp2['value'] = $infos_recipe['quantite_'.$i];
            $tmp2['quantity'] = $infos_recipe['unite_'.$i];

            $tmp3[$i-1] = $tmp2;
            $i++;
        }
        $data['ingredients'] = $tmp3;
       // print_r($infos_recipe['category']);
        $category = explode(', ', $infos_recipe['category']);
       // print_r($category);
       // var_dump($category[(sizeof($category))]);
        if (is_null($category[(sizeof($category))]))
            array_pop($category);
       // print_r($category);
        $data['category']=$category;

        if($picture = $this->addFiles($_FILES['picture']))
            $data['picture'] = $picture;
        //add_database
        $id_recipe = $add_database->add_recipe($data);
        //echo $id_recipe;

        if ($id_recipe == -1) {
            require_once 'IndexController.php';
            new IndexController();
        }
        else {
            require_once 'ResumeRecipeController.php';
            new ResumeRecipeController($id_recipe);
        }
    }

    public function addFiles($infos_files)
    {
        //fichier correctement uploadé
        if (!isset($infos_files) || $infos_files['error'] > 0) return (FALSE);
        //type image
        $type = explode('/',$infos_files['type']);
        if ($type[0] != 'image') return (FALSE);
        //Upload
        if(move_uploaded_file($infos_files['tmp_name'], 'Upload/img/'.$infos_files['name']))
            return ('Upload/img/'.$infos_files['name']);
        else return (FALSE);
    }
}

?>