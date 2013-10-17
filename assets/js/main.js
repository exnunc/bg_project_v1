$(document).ready(function() {


    typeaheadForSearch();
    checkOnStock();

    $('#logout-btn').bind('click', signOut);
    $('.view-cart').bind('click', viewCart);
    $('.shop-btn').bind('click',addToCart);
    $('.remove-from-cart').bind('click',removeFromCart);
    $('#empty-cart').bind('click',emptyCart);

});

var viewCart = function() {
    ajaxCallRedirect('home/shopping_cart', {});
};

var signOut = function() {
    ajaxCallRedirect('home/logout', {});
};

var addToCart = function(){
    ajaxCallRedirect('shopping_cart/add_to_cart', {});
};

var checkOnStock = function() {
    var onStock = ajaxCall('game/on_stock', {});
    if (onStock.quantity == 0) {
        $('.shop-btn').html('<span class="glyphicon glyphicon-shopping-cart"></span> Sold out');
        $('.shop-btn').addClass('disabled', 'true');
    }
};

var removeFromCart = function(){
    if(confirm('Are you sure?')){
        
        ajaxCallRedirect('shopping_cart/remove_from_cart/'+$(this).data('id'),{});
    }
}

var emptyCart = function(){
    if(confirm('Are you sure?')){
        
        ajaxCallRedirect('shopping_cart/empty_cart/'+$(this).data('uid'),{});
    }
}

var typeaheadForSearch = function() {
    $('#search-field').typeahead([{
            valueKey: 'name',
            prefetch: {
                url: 'home/boardgames',
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



    });
};
