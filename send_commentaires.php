<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 20/02/2016
 * Time: 00:02
 */
require_once "Controller/GlobalController.php";
$glob = new GlobalController();
if ($note = $glob->sendCommentary($_GET['id_recipe'], $_GET['note'], $_GET['commentaires'], $_GET['pseudo']))
    echo $note;
else
    echo "0";