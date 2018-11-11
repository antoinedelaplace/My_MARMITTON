<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 03/02/2016
 * Time: 10:23
 */
include "Include/header.php";
include "Include/nav.php";
include "Include/modal.php";
?>
    <div class="container" id="page">
        <form class="col s12" method="post" action="index.php?create_recipe=1" enctype="multipart/form-data" onsubmit="return verifForm(this)">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="pseudo" type="text" class="validate" name="pseudo" onblur="verifTexte(this)">
                    <label for="pseudo">Pseudo</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" name="email" onblur="verifEmail(this)">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="title" type="text" class="validate" name="title" onblur="verifTexte(this)">
                    <label for="title">Titre</label>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>File</span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <input type="file" name="picture">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="path" onblur="verifPicture(this)">
                    </div>
                </div>
            </div>
            <h4>Catégories</h4>
            <div class="row">
                <div class="input-field col s4">
                    <label for="cat_add">Catégories </label>
                    <input id="cat_add" name="category" type="text" class="validate">
                </div>
            </div>
            <h4>Ingrédients</h4>
            <div id="ingredients">
                <div class="row">
                    <div class="input-field col s4">
                        <input id="quantite_1" type="number" class="validate" name="quantite_1">
                        <label for="quantite_1">Quantité</label>
                    </div>
                    <div class="input-field col s4">
                        <label for="unite_1">Unité </label>
                        <input id="unite_1" name="unite_1" type="text" class="validate unity">
                    </div>
                    <div class="input-field col s4">
                        <label for="name_ingredient_1">Ingrédient </label>
                        <input id="name_ingredient_1" name="name_ingredient_1" type="text" class="validate ingredients">
                    </div>
                </div>
            </div>
            <p>
                <a class="btn-floating btn waves-effect waves-light red" onclick="add_ingredients();"><i class="material-icons">add</i></a>
            </p>
            <h4>Etapes</h4>
            <div id="steps">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="step_1" class="materialize-textarea" name="step_1" onblur="verifStep(this)"></textarea>
                        <label for="step_1">Etape 1</label>
                    </div>
                </div>
            </div>
            <p>
                <a class="btn-floating btn waves-effect waves-light red" onclick="add_step();"><i class="material-icons">add</i></a>
            </p>
            <p>
                <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
                    <i class="material-icons right">send</i>
                </button>
            </p>
        </form>
    </div>

<?php
require_once "Model/autoimplement.class.php";
$auto = new autoimplement();
include "Include/footer.php";
?>


