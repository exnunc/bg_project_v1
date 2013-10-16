$(document).ready(function() {

    var boardgames = ajaxCall('home/boardgames');
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



});

