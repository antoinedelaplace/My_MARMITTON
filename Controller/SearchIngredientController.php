<?php
/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 23/02/2016
 * Time: 11:33
 */

class SearchIngredientController
{
    public function __construct()
    {
        $autoimplement = new autoimplement();
        $autoimplement->find_ingre();
    }
}