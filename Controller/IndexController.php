<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 17/02/2016
 * Time: 00:08
 */

class IndexController
{
    private $_last_recipe;
    private $_popular_recipe;

    public function __construct()
    {
        //Récupérer les recettes populaires et les nouvelles recettes
        $class = new find_most();
        $this->_last_recipe = $class->show_recent();
        $this->_popular_recipe = $class->show_notes();

        //Créer la vue avec ces paramétres
        require "View/index.php";
    }
}