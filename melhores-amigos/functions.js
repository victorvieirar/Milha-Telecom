$(function() {
    $('.action-friend .fas.fa-check').click(approveFriend);
    $('.action-friend .fas.fa-times').click(negateFriend);
    $('.action-friend .fas.fa-trash').click(deleteFriend);
})

function approveFriend() {
    let cpf = $(this).parent().attr('data-id');
    if(confirm("Tem certeza que deseja aprovar esse cliente?")) {
        $.ajax({
            method: 'POST',
            url: '../../php/ajax/friends.php',
            data: {
                cpf: cpf,
                approve: true
            }
        })
        .done(function(res) {
            alert('Aprovado com successo!');
            window.location.reload();
        })
        .fail(function(jqXHR, textStatus) {
            alert('Error: '+textStatus);
        })
    }
}

function deleteFriend() {
    let cpf = $(this).parent().attr('data-id');

    if(confirm("Tem certeza que deseja deletar esse cliente?")) {
        $.ajax({
            method: 'POST',
            url: '../../php/ajax/friends.php',
            data: {
                cpf: cpf,
                delete: true
            }
        })
        .done(function(res) {
            alert('Deletado com successo!');
            window.location.reload();
        })
        .fail(function(jqXHR, textStatus) {
            alert('Error: '+textStatus);
        })
    }
}

function negateFriend() {
    let cpf = $(this).parent().attr('data-id');

    if(confirm("Tem certeza que deseja cancelar esse cliente?")) {
        $.ajax({
            method: 'POST',
            url: '../../php/ajax/friends.php',
            data: {
                cpf: cpf,
                negate: true
            }
        })
        .done(function(res) {
            alert('Cancelado com successo!');
            window.location.reload();
        })
        .fail(function(jqXHR, textStatus) {
            alert('Error: '+textStatus);
        })
    }
}