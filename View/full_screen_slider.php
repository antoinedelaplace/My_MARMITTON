<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/02/2016
 * Time: 16:06
 */
include "Include/header.php";
?>
<div class="slider fullscreen">
    <ul class="slides">
        <?php
        $i=1;
        foreach ($this->_infos as $value) {
            echo '<li>';
            echo '<img src="">';
            echo '<div class="caption left-align min">';
            echo 'Appuyez sur Echap pour quitter <br>';
            echo 'Naviguer avec < >';
            echo '</div>';
            echo '<div class="caption center-align">';
            echo '<h3 class="black-text">Etape ' . $i . '</h3>';
            echo '<h5 class="black-text">' . $value . '</h5>';
            echo '</div>';
            echo '</li>';
            $i++;
        }
        ?>
    </ul>
</div>
<span class="hidden" id="id_recipe"><? echo $this->_id_recipe ?></span>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="View/js/materialize.js"></script>
<script>
    $('.slider').slider({full_width: true, interval: 500000});
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            $id_recipe = document.getElementById('id_recipe').innerHTML;
            document.location.href='index.php?resume_recipe=1&id='+$id_recipe;
        }
        if (e.keyCode == 37) { // left key maps to keycode `37`
            $('.slider').slider('prev');
        }
        if (e.keyCode == 39) { // right key maps to keycode `39`
            $('.slider').slider('next');
        }
    });
</script>
</body>
</html>