<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 16/02/2016
 * Time: 22:52
 */
class GlobalController
{
    public function index()
    {
        require_once "IndexController.php";
        new IndexController();
    }

    public function resumeRecipe($id_recipe)
    {
        require_once "ResumeRecipeController.php";
        new ResumeRecipeController($id_recipe);
    }

    public function fullScreenSlider($id_recipe)
    {
        require_once "StepController.php";
        new StepController($id_recipe);
    }

    public function addRecipe()
    {
        require_once "CreateRecipeController.php";
        $create_recipe = new CreateRecipeController();
        $create_recipe->getView();
    }

    public function createRecipe($infos_recipe)
    {
        require_once "CreateRecipeController.php";
        $create_recipe = new CreateRecipeController();
        echo $create_recipe->addRecipe($infos_recipe);
    }

    public function sendCommentary($id_recipe, $note, $commentaires, $pseudo)
    {
        require_once "SendCommentaryController.php";
        $send = new SendCommentaryController($id_recipe, $note, $commentaires, $pseudo);
        return ($send->send());
    }

    public function sendSearch($search)
    {
        require_once "SearchRecipeController.php";
        $send = new SearchRecipeController($search);
        $send->getView();
    }

    public function randomRecipe()
    {
        require_once "RandomController.php";
        $send = new RandomController();
        $send->get_id_recipe();
    }
}