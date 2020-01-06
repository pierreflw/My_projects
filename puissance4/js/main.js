$(document).ready(function() {
    const puissance4 = new Puissance4('#puissance4')

    puissance4.actionJoueur = function() {
        $('#joueur').text(puissance4.joueur);
    }

    $('#restart').click(function() {
        puissance4.restart();
    })
});