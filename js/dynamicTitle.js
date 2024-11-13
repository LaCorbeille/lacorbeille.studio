window.onload = function () {
    var pageTitle = document.title;
    var attentionMessage = "👋 À bientôt";

    document.addEventListener('visibilitychange', function (e) {
        var isPageActive = !document.hidden;

        if (!isPageActive) {
            document.title = attentionMessage;
        } else {
            document.title = pageTitle;
        }
    });
};