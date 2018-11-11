/**
 * Created by antoine on 27/01/2016.
 */

function add_step()
{
    var steps = document.getElementById("steps");
    var textareas = steps.getElementsByTagName("textarea");
    var step = textareas[textareas.length - 1];
    step = step.id;
    step = step.split("_");
    step = 1 + +step[1];
    $('<div class="row"><div class="input-field col s12"><textarea id="step_'+step+'" class="materialize-textarea" name="step_'+step+'"></textarea> <label for="step_'+step+'">Etape '+step+'</label></div></div>').appendTo($('#steps'));
}

function add_ingredients()
{
    var ingredients = document.getElementById("ingredients");
    var input = ingredients.getElementsByTagName("input");
    var ingredient = input[input.length - 1];
    ingredient = ingredient.id;
    ingredient = ingredient.split("_");
    ingredient = 1 + +ingredient[2];
    var row = '<div class="row"><div class="input-field col s4"> <input id="quantite_'+ingredient+'" type="number" class="validate" name="quantite_'+ingredient+'"> <label for="quantite_'+ingredient+'">Quantité</label> </div> <div class="input-field col s4"><label for="unite_'+ ingredient +'">Unité </label><input id="unite_'+ingredient+'" name="unite_'+ingredient+'" type="text" class="validate unity"></div> <div class="input-field col s4"> <input id="name_ingredient_'+ingredient+'" type="text" class="validate ingredients" name="name_ingredient_'+ingredient+'"> <label for="name_ingredient_'+ingredient+'">Ingrédient</label></div></div>';
    $('#ingredients').append(row);
    add_unity();
    add_name_ingredient();
}

function add_unity()
{
    var liste_unites = [];
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var response = xhr.responseXML;
            var items   = response.getElementsByTagName("item");
            for (var i=0, length=items.length; i<length; i++) {
                var champ   = items[i].firstChild;
                liste_unites.push(champ.getAttribute("name"));
            }
            $( ".unity" ).autocomplete({
                source: liste_unites
            });
        }
    };
    xhr.open("GET", "get_unity.php", true);
    xhr.send(null);
}

function add_name_ingredient()
{
    var liste_ingredients = [];
    var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function() {
     if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
     var response = xhr.responseXML;
     var items   = response.getElementsByTagName("item");
     for (var i=0, length=items.length; i<length; i++) {
     var champ   = items[i].firstChild;
     liste_ingredients.push(champ.getAttribute("name"));
     }
     $( ".ingredients" ).autocomplete({
     source: liste_ingredients
     });
     }
     };
     xhr.open("GET", "get_ingredients.php", true);
     xhr.send(null);
}

function remove_star_opacity(star)
{
    stars = document.getElementsByClassName('star');
    var i = 0;
    var classes = "star material-icons";
    while (i<stars.length) {
        stars[i].className = classes;
        if (stars[i] == star) {
            classes = "star material-icons opacity";
            document.getElementById('note').innerHTML = i+1;
        }
        i++;
    }
}

function send_commentaires()
{
    var note = document.getElementById("note").innerHTML;
    var id_recipe = document.getElementById("id_recipe").innerHTML;
    var pseudo = document.getElementById("pseudo").value;
    var commentaires = document.getElementById("commentaires").value;
    var xhr = new XMLHttpRequest();
    var texte = "";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (xhr.responseText == "0")
                alert("L'envoi du commentaires a échoué");
            else {
                document.getElementById('avg_note').innerHTML = "Note : "+xhr.responseText+"/5";
                texte = '<div class="row"><div class="col s12 m12">';
                var i = 0;
                while (i < note) {
                    texte += '<i class="material-icons" > grade</i >';
                    i++;
                }
                while (i < 5) {
                    texte += '<i class="material-icons opacity" > grade</i >';
                    i++;
                }
                texte += '<br><b>'+ pseudo +'</b><p>' + commentaires + '</p></div></div><hr />';
                document.getElementById('comments').className = "well";
                $(".well").prepend(texte);
                document.getElementById("pseudo").value = "";
                document.getElementById("commentaires").value = "";
            }
        }
    };
    xhr.open("GET", "send_commentaires.php?id_recipe="+id_recipe+"&note="+note+"&pseudo="+pseudo+"&commentaires="+commentaires, true);
    xhr.send(null);
}