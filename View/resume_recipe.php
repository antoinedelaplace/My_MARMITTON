<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 10/02/2016
 * Time: 10:22
 */
include "Include/header.php";
include "Include/nav.php";
include "Include/modal.php";

?>
<div class="container" id="page">
    <div class="row">
        <div class="col s12 m6">
            <img src="<?php echo $this->_infos['picture'] ?>" class="responsive-img">
            <br />
            <?php
            foreach ($this->_infos['category'] as $category) {
                echo '<div class="chip" style="background-color: #8d6e63">'.$category.'</div>';
            }
            ?>
            <?php
            if (isset($this->_infos['avg_note']) && $this->_infos['avg_note'] != 0)
                echo "<h5 id='avg_note'>Note : ".$this->_infos['avg_note']."/5</h5>";
            else
                echo "<h5 id='avg_note'></h5>";
            ?>
            <br />
            <br />
            <div>
                <i onclick="remove_star_opacity(this);" class="star material-icons opacity">grade</i>
                <i onclick="remove_star_opacity(this);" class="star material-icons opacity">grade</i>
                <i onclick="remove_star_opacity(this);" class="star material-icons opacity">grade</i>
                <i onclick="remove_star_opacity(this);" class="star material-icons opacity">grade</i>
                <i onclick="remove_star_opacity(this);" class="star material-icons opacity">grade</i>
                <span class="hidden" id="note">0</span>
                <span class="hidden" id="id_recipe"><?php echo $this->_id ?></span>
            </div>
            <div class="input-field">
                <input id="pseudo" type="text" class="validate" name="pseudo">
                <label for="pseudo">Pseudo</label>
            </div>
            <div class="input-field commentaires">
                <textarea class="materialize-textarea" name="commentaires" id="commentaires"></textarea>
                <label for="commentaires">Commentaires</label>
            </div>
            <div>
                <button class="btn waves-effect waves-light" onclick="send_commentaires();">Envoyer
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        <div class="col s10 m5">
            <h4><?php echo $this->_infos['name_recette'] ?> <span id="min">(Créé par <?php echo $this->_infos['creator_pseudo'] ." le ". date('d/m/Y',time($this->_infos['date_create'])) ?>)</span></h4>
            <h5>Ingrédients : </h5>
            <ul>
                <?php
                foreach ($this->_infos['ingredients'] as $ingredient) {
                    echo '<li>'.$ingredient['value']." ".$ingredient['name_quantity']." ".$ingredient['name_ingredient'].'</li>';
                }
                ?>
            </ul>
            <hr />
            <div>
                <h5>Préparation : <a href="<?php echo "index.php?full_screen_slider=1&id_recipe=".$this->_infos['id_recette']?>"><span id="min">(Passer en mode cuisine)</span></a></h5>
            </div>
            <div style="text-align: justify">
                <?php
                foreach ($this->_infos['step'] as $step) {
                    echo $step . " ";
                }
                ?>
            </div>
        </div>
    </div>
    <br />
    <div id="comments">
        <?php
        if (!empty($this->_comments)) {
            foreach ($this->_comments as $comment) {
                echo '<div class="row">';
                echo '<div class="col s12 m12">';
                $i = 0;
                while ($i < $comment['note']) {
                    echo '<i class="material-icons" > grade</i >';
                    $i++;
                }
                while ($i < 5) {
                    echo '<i class="material-icons opacity" > grade</i >';
                    $i++;
                }
                echo '<br><b>' . $comment['pseudo'] . '</b>';
                echo '<p>';
                echo $comment['commentaire'];
                echo '</p>';
                echo '</div></div><hr />';
            }
        }
        ?>
    </div>
</div>
<?php
include "Include/footer.php";
?>
