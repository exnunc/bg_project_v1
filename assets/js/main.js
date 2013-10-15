$(document).ready(function() {
    $('#search-field .typeahead').typeahead({
        source: function(query, process) {
            return $.get('/typeahead', {query: query}, function(data) {
                return process(data.options);
            });
        }

    });

});

