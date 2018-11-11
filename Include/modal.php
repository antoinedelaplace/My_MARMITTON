<div id="search-modal" class="modal">
    <form method="post" action="index.php?create_search=1">
        <div class="modal-content">
            <h4>Rechercher</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">Titre</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="tags">Ingrédients </label>
                    <input id="tags" name="ingredients" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="cat">Catégories </label>
                    <input id="cat" name="category" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="range-field col s4">
                    <input type="range" id="percent" name="percent" min="70" max="100" value="70"/>
                    <label for="percent">Poucentage de ressemblance</label>
                </div>
                <button class="btn waves-effect waves-light modal-action modal-close" type="submit" name="action">J'ai faim !
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>
