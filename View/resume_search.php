<?php
/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 22/02/2016
 * Time: 13:07
 */
include "Include/header.php";
include "Include/nav.php";
include "Include/modal.php";
?>

<div class="container" id="page">
    <div class="section">
        <div class="icon-block">
            <h5 class="brown-text"><i class="material-icons">announcement</i>Resultats de la recherche
        </div>
        <div class="row">
            <?php
            foreach ($this->_infos as $recipe) {
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
include "Include/footer.php";
?>
