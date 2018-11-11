<?php

/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 24/02/2016
 * Time: 18:30
 */

require_once "Model/Database.php";

class RandomController
{
    private $_id_recipe;

    public function __construct()
    {
        $tmp = new Search();
        $this->_id_recipe = $tmp->get_id_random();
    }

    public function get_id_recipe()
    {
        require "ResumeRecipeController.php";
        new ResumeRecipeController($this->_id_recipe);
    }
}