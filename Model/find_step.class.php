<?php

/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 20/02/2016
 * Time: 18:06
 */

class find_step extends Database
{
    private $_bdd;
    private $_steps;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE)
            $this->_bdd = $toto->try_connection();
        else
            $this->_bdd = FALSE;
    }

    public function find_steps($id_recipe)
    {
        $sql = "SELECT step FROM step WHERE id_recipe=".$id_recipe." ORDER BY number_step";
        $steps = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        return $steps;
    }

    public function get_steps($id_recipe)
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else {
            $this->_steps = $this->find_steps($id_recipe);
            //print_r($this->_steps);
            return $this->_steps;
        }
    }
}