<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 16/02/2016
 * Time: 23:27
 */
class ResumeRecipeController
{
    private $_infos;
    private $_comments;
    private $_id;

    public function __construct($id_recipe)
    {
        //Récupére les infos de la recette à partir de son id
        $this->_id = $id_recipe;
        $find_recipe = new find_recipe();
        $this->_infos = $find_recipe->search_recipe_id($id_recipe);
        $find_comments = new find_comment();
        $this->_comments = $find_comments->show_comment($id_recipe);
        //Créer la vue
        require "View/resume_recipe.php";

    }
}