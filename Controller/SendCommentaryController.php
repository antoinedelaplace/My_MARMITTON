<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 19/02/2016
 * Time: 17:41
 */
class SendCommentaryController
{
    public $_id;
    public $_pseudo;
    public $_note;
    public $_commentaires;

    public function __construct($id_recipe, $note, $commentaires, $pseudo)
    {
        $this->_id = $id_recipe;
        $this->_pseudo = $pseudo;
        $this->_note = $note;
        $this->_commentaires = $commentaires;
    }

    public function send()
    {
        require_once "Model/Database.php";
        $add = new add_database();
        return ($add->add_comment($this->_id, $this->_note, $this->_commentaires, $this->_pseudo));
    }
}