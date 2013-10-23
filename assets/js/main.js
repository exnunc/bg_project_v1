$(document).ready(function() {


    typeaheadForSearch();
    checkOnStock();
    blockCheckout();
    
    if ($.cookie("active")==="browse"){
        $('.start').removeClass("active");
        $('.browse').addClass("active");
        $('#start').removeClass("active");
        $('#browse').addClass("active");
        
    }
        
    
    $('#logout-btn').bind('click', signOut);
    $('.view-cart').bind('click', viewCart);
    $('.shop-btn').bind('click', addToCart);
    $('.remove-from-cart').bind('click', removeFromCart);
    $('#empty-cart').bind('click', emptyCart);
    $('.select-quantity').bind('change', updateQuantity);
    $('#checkout-btn').bind('click', checkoutStepOne);
    $('.back-btn').bind('click', goBack);
    $('.allgames').bind('click',getAllGames)
    $('.categories').bind('click',getCategories);

});


var viewCart = function() {
    ajaxCallRedirect($('#base-url').data('url')+'index.php/home/shopping_cart', {});
};

var signOut = function() {
    ajaxCallRedirect($('#base-url').data('url')+'index.php/home/logout', {});
};

var addToCart = function() {
    ajaxCallRedirect($('#base-url').data('url')+'index.php/shopping_cart/add_to_cart', {});
};

var checkoutStepOne = function() {
    ajaxCallRedirect($('#base-url').data('url')+'index.php/shopping_cart/checkout', {});
};
var getCategories=function(){
    var i=$(this).data('id');
    //console.log(i);
    //$.post($('#base-url').data('url')+'index.php/home', {variable: i});
    console.log($('#base-url').data('url')+'index.php/categories');
    //$('.browse').addClass("active");
    //$('.start').removeClass("active");
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        cache: false,
        url:$('#base-url').data('url')+'index.php/home/categories' ,
        data:{'vari':i},
        success: function(response) {
            if (response) {
                window.location = response.redirect;
                $.cookie("active","browse");
                
            }
        }
    });
    //ajaxCallRedirect($('#base-url').data('url')+'index.php/home/categories',{'vari': i});
};

var getAllGames=function(){
    ajaxCallRedirect($('#base-url').data('url')+'index.php', {});
};


var checkOnStock = function() {
    var onStock = ajaxCall($('#base-url').data('url')+'index.php/game/on_stock', {});
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

        ajaxCallRedirect($('#base-url').data('url')+'index.php/shopping_cart/remove_from_cart/' + $(this).data('id'), {});
    }
};

var emptyCart = function() {
    if (confirm('Are you sure?')) {

        ajaxCallRedirect($('#base-url').data('url')+'index.php/shopping_cart/empty_cart/' + $(this).data('uid'), {});
    }
};

var updateQuantity = function() {
    ajaxCallRedirect($('#base-url').data('url')+'index.php/shopping_cart/update_quantity_manually/' + $(this).data('id'), {'newValue': $(this).val()});
};


var typeaheadForSearch = function() {
    $('#search-field').typeahead([{
            valueKey: 'name',
            prefetch: {
                url: $('#base-url').data('url')+'index.php/home/boardgames',
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

        ajaxCallRedirect($('#base-url').data('url')+'index.php/home/boardgames/' + datum.id, {});





    });
};
