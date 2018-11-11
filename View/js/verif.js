/**
 * Created by benoit-xavierhouvet on 23/02/2016.
 */

function verifForm(f)
{
    var pseudoOk = verifTexte(f.pseudo);
    var nameOk = verifEmail(f.email);
    var titleOk = verifTexte(f.title);
    var pictureOk = verifPicture(f.path);
    var categorieOk = verifTexte(f.category);
    var ingredientOk = verifTexte(f.name_ingredient_1);
    var stepOk = verifStep(f.step_1);

    if (pseudoOk && nameOk && titleOk && pictureOk && categorieOk && ingredientOk && stepOk)
        return true;
    else {
        return false;
    }
}

function verifTexte(champ)
{
    if (champ.value.length > 2)
        return true;
    else {
        champ.className = "validate invalid";
        return false;
    }
}

function verifStep(champ)
{
    if (champ.value.length > 2) {
        champ.className = "materialize-textarea validate";
        return true;
    }
    else {
        champ.className = "materialize-textarea invalid";
        return false;
    }
}

function verifEmail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value)) {
        champ.className = "validate invalid";
        return false;
    }
    else {
        return true;
    }
}

function verifPicture(champ)
{
    if (champ.value.length == 0) {
        champ.className = "file-path validate invalid";
        return false;
    }
    else {
        return true;
    }
}
