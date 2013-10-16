$(document).ready(function() {

    var boardgames = ajaxCall('home/boardgames');

    typeaheadForSearch();
    $('#logout-btn').bind('click', signOut);
    $('.view-cart').bind('click', viewCart);




});

var viewCart = function() {
    ajaxCallRedirect('home/shopping_cart',{});
};

var signOut = function() {
    ajaxCallRedirect('home/logout',{});
};

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
        
        ajaxCallRedirect('home/boardgames/' + datum.id,{});
        


    });
};
