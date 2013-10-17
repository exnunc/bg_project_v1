$(document).ready(function() {

    var boardgames = ajaxCall(window.location + '/boardgames');
    $('#search-field').typeahead([{
            valueKey:'name',
            prefetch: {
                url: window.location + '/boardgames',
                filter: function(data) {
                    retval = [];

                    for (var i = 0; i < data.length; i++) {
                        retval.push({'name':data[i].bg_name, 'id':data[i].bg_id});
                    }

                    return retval;
                }
            }

        }]).bind('typeahead:selected', function(obj, datum) {
        var bg = ajaxCall(window.location+'/boardgames/'+datum.id);
        console.log(bg);
    });
});

