<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 17/02/2016
 * Time: 00:22
 */

require_once "Model/Database.php";

class StepController
{
    private $_infos;
    private $_id_recipe;

    public function __construct($id_recipe)
    {
        //Récupére les étapes de la recette
        $this->_id_recipe = $id_recipe;
        $findstep = new find_step();
        $this->_infos = $findstep->get_steps($id_recipe);
        //Création de la vue en fonction des étapes
        require "View/full_screen_slider.php";
    }
}