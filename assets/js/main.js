$(document).ready(function() {

    var boardgames = ajaxCall('home/boardgames');

    typeaheadForSearch();
    $('#logout-btn').bind('click', signOut);




});


var signOut = function() {
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        cache: false,
        url: 'home/logout',
        success: function(response) {
            if (response) {
                window.location = response.redirect;
            }
        }
    });
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

        $.ajax({
            type: "POST",
            dataType: "json",
            async: false,
            cache: false,
            url: 'home/boardgames/' + datum.id,
            success: function(response) {
                if (response) {
                    window.location = response.redirect;
                }
            }
        });


    });
};
