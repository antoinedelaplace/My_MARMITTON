<?php

/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 23/02/2016
 * Time: 11:38
 */
class autoimplement extends Database
{
    private $_bdd;
    private $_ingre;
    private $_cat;
    private $_unity;
    private $_table_unity;
    private $_table_ingredient;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE) {
            $this->_bdd = $toto->try_connection();
            $this->_ingre=$this->find_ingre();
            $this->_cat=$this->find_cat();
            $this->_unity=$this->find_unity();
            $this->_table_unity=$this->find_table_unity();
            $this->_table_ingredient=$this->find_table_ingredient();
        }
        else
            $this->_bdd = FALSE;
    }

    public function find_ingre()
    {
        $sql="SELECT name_ingredient FROM ingredient";
        $ingre = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        $content = "$(function() {";
        $content .= "var availableTags = [";
        $i = 0;
        foreach ($ingre as $ingredient)
        {
            if ($i == 0)
                $content .= "\"".$ingredient."\"";
            else
                $content .= ",\"".$ingredient."\"";
            $i++;
        }
        $content .= " ];";
        return $content;
    }
    public function get_ingre()
    {
        return $this->_ingre;
    }



    public function find_cat()
    {
        $sql="SELECT name_category FROM category";
        $cat = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        $content = "$(function() {";
        $content .= "var availableTags = [";
        $i = 0;
        foreach ($cat as $category)
        {
            if ($i == 0)
                $content .= "\"".$category."\"";
            else
                $content .= ",\"".$category."\"";
            $i++;
        }
        $content .= " ];";
        return $content;
    }
    public function get_cat()
    {
        return $this->_cat;
    }


    public function find_unity()
    {
        $sql = "SELECT name_quantity FROM lebel_quantity";
        $cat = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        $content = "$(function() {";
        $content .= "var availableTags = [";
        $i = 0;
        foreach ($cat as $category)
        {
            if ($i == 0)
                $content .= "\"".$category."\"";
            else
                $content .= ",\"".$category."\"";
            $i++;
        }
        $content .= " ];";
        return $content;
    }

    public function find_table_unity()
    {
        $sql = "SELECT name_quantity FROM lebel_quantity";
        $cat = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        return $cat;
    }

    public function get_table_unity()
    {
        return $this->_table_unity;
    }

    public function find_table_ingredient()
    {
        $sql = "SELECT name_ingredient FROM ingredient";
        $cat = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        return $cat;
    }

    public function get_table_ingredient()
    {
        return $this->_table_ingredient;
    }

    public function get_unity()
    {
        return $this->_unity;
    }
}

