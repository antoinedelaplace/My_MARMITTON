<?php
/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 19/02/2016
 * Time: 22:21
 */

class find_comment extends Database
{
    private $_bdd;
    private $_comment;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE) {
            $this->_bdd = $toto->try_connection();
        } else {
            $this->_bdd = FALSE;
        }
    }

    public function comment($id_recipe)
    {
        $sql = $this->_bdd->query("SELECT note, commentaire, pseudo FROM notes WHERE id_recipe = '".$id_recipe."'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show_comment($id_recipe)
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
            return $this->_comment = $this->comment($id_recipe);
    }
}