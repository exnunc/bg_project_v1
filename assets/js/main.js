$(document).ready(function() {
    $('#search-field .typeahead').typeahead({
        name: 'boardgames',
        prefetch: '../data/countries.json',
        limit: 10
    });

});

