$(function() {
    $('#slider-plans .arrow #next').click(nextPlan);
    $('#slider-plans .arrow #prev').click(prevPlan);
    $('#slider-plans-full .arrow #next').click(nextPlanFull);
    $('#slider-plans-full .arrow #prev').click(prevPlanFull);
    $('#menu').click(toggleMenu);
    $('.plan').first().addClass('active');
    for (let index = 0; index < 3; index++) {
        $('.plan-full:not(.active)').first().addClass('active');
    }
    
    $('.plan-full.active').first().addClass('first');
    $('.plan-full.active').last().addClass('last');
    
    $('.delete-plan').click(deletePlan);
    $('.delete-city').click(deleteCity);

    $('#cities-picker').change(addCityToPlan);

    $('#local-picker').change(setLocal);

    setInterval(mainSlideNext, 2000);
})

function setLocal() {
    let local = $(this).find(':selected').val();
    window.open('?local='+local, '_self');
}

function removeCityFromPlan() {
    let city = $(this).parent(); 
    let id = city.attr('city-id');

    $('input[city-id='+ id +']').remove();
    city.remove();

    $('#cities-picker option:eq(0)').prop('selected', true);
}

function addCityToPlan() {
    let city = $(this).find(':selected');
    let cityView = '<div city-id="'+ city.val() +'" class="city-view bold blue"><span>'+ city.text() + ' ('+ city.attr('uf') +')</span><span class="fas fa-trash"></span></div>';
    $('div#cities-container').append(cityView);

    let cityValue = '<input city-id="'+ city.val() +'" type="hidden" name="city[]" value="'+ city.val() +'">';
    $('form#plans-form').append(cityValue);

    $('.city-view span.fas').click(removeCityFromPlan);
}

function deletePlan() {
    let btn = $(this);

    if(confirm('Deseja realmente deletar esse plano?')) {
        $.ajax({
            url: '../php/ajax/plans.php',
            method: 'post',
            data: {
                id: btn.attr('data-id'),
                delete: true
            }
        }).done(function(response) {
            response = jQuery.parseJSON(response);
    
            if(response.success) {
                window.location.reload();
            }
        }).fail(function(jqXHR, textStatus) {
            alert('Falha ao deletar plano');
        });
    }
}

function deleteCity() {
    let btn = $(this);

    if(confirm('Deseja realmente deletar essa cidade?')) {
        $.ajax({
            url: '../php/ajax/cities.php',
            method: 'post',
            data: {
                id: btn.attr('data-id'),
                delete: true
            }
        }).done(function(response) {
            response = jQuery.parseJSON(response);
    
            if(response.success) {
                window.location.reload();
            }
        }).fail(function(jqXHR, textStatus) {
            alert('Falha ao deletar cidade');
        });
    }
}

function mainSlideNext() {
    let active = $('#slider-top img.active');
    if(active.next().is('img')) {
        active.removeClass('active').next().addClass('active');
    } else {
        active.removeClass('active');
        $('#slider-top img').first().addClass('active');
    }
}

function nextPlan() {
    let active = $('.plan.active');
    if(active.next().is('.plan')) {
        active.next().addClass('active');
        active.removeClass('active');
    } else {
        $('.plan').first().addClass('active');
        active.removeClass('active');
    }
}   

function prevPlan() {
    let active = $('.plan.active');
    if(active.prev().is('.plan')) {
        active.prev().addClass('active');
        active.removeClass('active');
    } else {
        $('.plan').last().addClass('active');
        active.removeClass('active');
    }
}

function nextPlanFull() {
    let last = $('.plan-full.active.last');
    if(last.next().is('.plan-full')) {
        last.next().addClass('active last');
        last.removeClass('last');

        let first = $('.plan-full.active.first');
        first.removeClass('first active');
        if(first.next().is('.plan-full')) {
            first.next().addClass('first');
        } else {
            $('.plan-full').first().addClass('first');
        }       
    } else {
        $('.plan-full.active').removeClass('active first last');
        for (let index = 0; index < 3; index++) {
            $('.plan-full:not(.active)').first().addClass('active');
        }
        
        $('.plan-full.active').first().addClass('first');
        $('.plan-full.active').last().addClass('last');
    }
}   

function prevPlanFull() {
    let first = $('.plan-full.active.first');
    if(first.prev().is('.plan-full')) {
        first.prev().addClass('active first');
        first.removeClass('first');

        let last = $('.plan-full.active.last');
        last.removeClass('first active');

        if(last.prev().is('.plan-full')) {
            last.prev().addClass('last');
        } else {
            $('.plan-full').last().addClass('last');
        }       
    } else {
        $('.plan-full.active').removeClass('active first last');
        for (let index = 0; index < 3; index++) {
            $('.plan-full:not(.active)').first().addClass('active');
        }
        
        $('.plan-full.active').first().addClass('first');
        $('.plan-full.active').last().addClass('last');
    }
}

function toggleMenu() {
    let menu = $(this);

    menu.toggleClass('fa-bars fa-times active');
    if(menu.hasClass('active')) $('#mobile-wrap').fadeIn();
    else $('#mobile-wrap').fadeOut();
}