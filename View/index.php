<?php
include "Include/header.php";
include "Include/nav.php";
include "Include/modal.php";
?>

    <div class="container" id="page">
        <div class="section">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="View/img/food_8.jpg">
                        <div class="caption center-align">
                            <h4 class="black-text">Nouveauté : le mode En cuisine</h4>
                            <h5 class="black-text">Il vous permet de suivre une recette étape par étape</h5>
                        </div>
                    </li>
                    <li>
                        <img src="View/img/food_5.jpg">
                        <div class="caption left-align">
                            <h3 class="black-text">Découvrez nos meilleures recettes</h3>
                            <h5 class="black-text">Notez et commentez vos recettes préférées</h5>
                        </div>
                    </li>
                    <li>
                        <img src="View/img/food_9.jpg">
                        <div class="caption right-align">
                            <h4 class="black-text">Vous cherchez une recette en particulier?</h4>
                            <h5 class="black-text">Recherchez une recette par titre, catégorie ou par ingrédients !</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section">
            <div class="icon-block">
                <h5 class="brown-text"><i class="material-icons">announcement</i>Dernières Recettes</h5>
            </div>
            <div class="row">
            <?php
            foreach ($this->_last_recipe as $recipe) {
                ?>
                <div class="col s12 m3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?php echo $recipe['picture'] ?>">
                        </div>
                        <div class="card-action">
                            <div class="chip"><?php echo $recipe['pseudo'] ?></div>
                            </p>
                            <p><?php echo $recipe['name_recette'] ?></p>
                            <a href="index.php?resume_recipe=1&id=<?php echo $recipe['id_recette'] ?>">Afficher la recette</a>
                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
            </div>
            <div class="icon-block">
                <h5 class="brown-text"><i class="material-icons">grade</i>Recettes populaires</h5>
            </div>
            <div class="row">
                <?php
                foreach ($this->_popular_recipe as $recipe) {
                    ?>
                    <div class="col s12 m3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img src="<?php echo $recipe['picture'] ?>">
                            </div>
                            <div class="card-action">
                                <div class="chip"><?php echo $recipe['pseudo'] ?></div>
                                </p>
                                <p><?php echo $recipe['name_recette'] ?></p>
                                <a href="index.php?resume_recipe=1&id=<?php echo $recipe['id_recette'] ?>">Afficher la recette</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
include("Include/footer.php");require_once "Model/autoimplement.class.php";
$auto = new autoimplement();
?>