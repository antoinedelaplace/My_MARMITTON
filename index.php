<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 16/02/2016
 * Time: 22:55
 */
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once "Controller/GlobalController.php";
require_once "Model/Database.php";
$glob = new GlobalController();

if(isset($_GET['resume_recipe']) && isset($_GET['id'])) {
    $glob->resumeRecipe($_GET['id']);
}
else if(isset($_GET['full_screen_slider']) && isset($_GET['id_recipe'])) {
    $glob->fullScreenSlider($_GET['id_recipe']);
}
else if(isset($_GET['add_recipe'])) {
    $glob->addRecipe();
}
else if(isset($_GET['create_recipe']) && isset($_POST)) {
    $glob->createRecipe($_POST);
}
else if(isset($_GET['create_search']) && isset($_POST)) {
    $glob->sendSearch($_POST);
}
else if (isset($_GET['random'])) {
    $glob->randomRecipe();
}
else {
    $glob->index();
}

