$(document).ready(function() {

    $('span.stars').stars();
    $('span.starsVote').starsVote();

    typeaheadForSearch();
    checkOnStock();
    blockCheckout();
    $('#logout-btn').bind('click', signOut);
    $('.view-cart').bind('click', viewCart);
    $('.shop-btn').bind('click', addToCart);
    $('.remove-from-cart').bind('click', removeFromCart);
    $('#empty-cart').bind('click', emptyCart);
    $('.select-quantity').bind('change', updateQuantity);
    $('#checkout-btn').bind('click', checkoutStepOne);
    $('.back-btn').bind('click', goBack);
    $('#save-new-meeting').bind('click', saveNewMeeting);

});

$.fn.stars = function() {
    return $(this).each(function() {
        var val = parseFloat($(this).html());

        val = Math.round(val * 4) / 4;
        var size = Math.max(0, (Math.min(5, val))) * 16;
        var $span = $('<span/>').width(size);
        $(this).html($span);
    });
};

$.fn.starsVote = function() {
    return $(this).each(function() {
        $(this).mousemove(function(e) {
            var parentOffset = $(this).parent().offset();
            //or $(this).offset(); if you really just want the current element's offset
            var relX = e.pageX - parentOffset.left;
            var $span = $('<span/>').width(relX);
            $(this).html($span);
        });
        $(this).mouseout(function(e) {
            var $span = $('<span/>').width(0);
            $(this).html($span);
        });
        
        $(this).click(function(e){
            var parentOffset = $(this).parent().offset();
            var relX = e.pageX - parentOffset.left;

            var val = Math.round(relX / 16);
            console.log(val);
        });
    });
};

var viewCart = function() {
    ajaxCallRedirect($('#base-url').data('url') + 'index.php/home/shopping_cart', {});
};
var signOut = function() {
    ajaxCallRedirect($('#base-url').data('url') + 'index.php/home/logout', {});
};
var addToCart = function() {
    ajaxCallRedirect($('#base-url').data('url') + 'index.php/shopping_cart/add_to_cart', {});
};
var checkoutStepOne = function() {
    ajaxCallRedirect($('#base-url').data('url') + 'index.php/shopping_cart/checkout', {});
};

var saveNewMeeting = function() {

    if ($('#meet-time-id').val() !== '' && $('#meet-location').val() !== '') {
        var toSend = {
            'meetDate': $('#meet-time-id').val().split('T')[0],
            'meetTime': $('#meet-time-id').val().split('T')[1],
            'meetLocation': $('#meet-location').val(),
            'meetDetails': $('#meet-details').val()
        };
        console.log(toSend);
        ajaxCallRedirect($('#base-url').data('url') + 'index.php/game/add_new_meeting', toSend);

        $('#meetings-modal').modal({
            show: true,
            remote: '#meetings-modal'
        });
    }

};
var checkOnStock = function() {
    var onStock = ajaxCall($('#base-url').data('url') + 'index.php/game/on_stock', {});
    if (onStock.quantity == 0) {
        $('.shop-btn').html('<span class="glyphicon glyphicon-shopping-cart"></span> Sold out');
        $('.shop-btn').addClass('disabled', 'true');
    }
};
var goBack = function() {
    parent.history.back();
    return false;
};
var blockCheckout = function() {

    if ($('#checkout-btn').data('error') !== '') {

        $('#checkout-btn').addClass('disabled', 'true');
    } else {
        $('#checkout-btn').removeClass('disabled');
    }
};
var removeFromCart = function() {
    if (confirm('Are you sure?')) {

        ajaxCallRedirect($('#base-url').data('url') + 'index.php/shopping_cart/remove_from_cart/' + $(this).data('id'), {});
    }
};
var emptyCart = function() {
    if (confirm('Are you sure?')) {

        ajaxCallRedirect($('#base-url').data('url') + 'index.php/shopping_cart/empty_cart/' + $(this).data('uid'), {});
    }
};
var updateQuantity = function() {
    ajaxCallRedirect($('#base-url').data('url') + 'index.php/shopping_cart/update_quantity_manually/' + $(this).data('id'), {'newValue': $(this).val()});
};
var getCategory = function($id) {
    ajaxCallRedirect('home/browse', +$(this).bgames_cat);
};
var typeaheadForSearch = function() {
    $('#search-field').typeahead([{
            valueKey: 'name',
            prefetch: {
                url: $('#base-url').data('url') + 'index.php/home/boardgames',
                filter: function(data) {
                    retval = [];
                    for (var i = 0; i < data.length; i++) {
                        retval.push({'name': data[i].bg_name, 'id': data[i].bg_id});
                    }

                    return retval;
                }
            }

        }]).bind('typeahead:selected', function(obj, datum) {



        ajaxCallRedirect('home/boardgames/' + datum.id, {});
        ajaxCallRedirect($('#base-url').data('url') + 'index.php/home/boardgames/' + datum.id, {});
    });
};
