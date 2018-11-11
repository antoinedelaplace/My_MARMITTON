/**
 * Created by antoine on 12/02/2016.
 */

$(document).ready(function() {
    $('select').material_select();
});

$(document).ready(function(){
    $('.slider').slider({full_width: true});
});

function init_modal() {
    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200 });
    $('#search-modal').openModal();

}