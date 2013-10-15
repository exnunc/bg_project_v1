$(document).ready(function() {
    $('#search-field').typeahead([{
      
            prefetch: {
                url: window.location + '/boardgames',
                filter: function(data) {
                    retval = [];
                    
                    for (var i = 0; i < data.length; i++) {
                        retval.push(data[i].bg_name);
                    }
                    
                    return retval;
                }
            }

        }]);
});

