$(function () {
    function checkHash() {
        if (window.location.hash === "#poll") {
            $("#poll-modal")
                .modal('show')
                .on('hide.bs.modal', function () {
                    window.location.hash = "";
                });
        }
    }

    if ("onhashchange" in window) { // event supported?
        window.onhashchange = checkHash;
    } else { // event not supported:
        var storedHash = window.location.hash;
        window.setInterval(function () {
            if (window.location.hash != storedHash) {
                storedHash = window.location.hash;
                checkHash();
            }
        }, 100);
    }

    checkHash();

    /*var containerWidth = $(".wrapper").width();
    var padding = 0;

    $(".panel")
        .mousedown(function() {
            // $(this).find(".mask").show();
        })
        .mouseup(function() {
            // $(this).find(".mask").hide();
        })
        .resizable({
        handles: 'e',
        containment: 'parent',
        resize: function(event, ui){
            var currentWidth = ui.size.width;
            console.log(containerWidth - currentWidth);
            // set the content panel width
            $(".panel").width(containerWidth - currentWidth);
            $(this).width(currentWidth);
        }
    });*/
});
