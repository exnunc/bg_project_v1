function ajaxCall(url, stuff) {
    var rsp = '';
    $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        cache: false,
        url: url,
        data: stuff,
        success: function(response) {
            if (response) {
                rsp = response;
            }
        }
    });

    return rsp;
}