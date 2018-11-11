<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 10/02/2016
 * Time: 14:27
 */
require_once "Model/Database.php";

class SearchRecipeController
{
    private $_infos;

    public function __construct($infos_recipe)
    {
        $this->_infos=$this->search($infos_recipe);
    }

    public function search($infos_recipe)
    {
        $ingredient = explode(',', $infos_recipe['ingredients']);
        array_pop($ingredient);
        $data['ingredients'] = $ingredient;
        $category = explode(',', $infos_recipe['category']);
        array_pop($category);
        $data['category']=$category;
        $data['name_recipe'] = $infos_recipe['title'];
        $data['percent'] = ($infos_recipe['percent'] / 100);
        $search = new Search();
        return $search->search($data);
    }

    public function getView()
    {
        require 'View/resume_search.php';
    }
}