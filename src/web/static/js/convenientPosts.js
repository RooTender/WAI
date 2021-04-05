$(document).ready(function () {
    var maxheight = 250;
    var showText = "Pokaż więcej";
    var hideText = "Ukryj treść";
    $('article').each(function () {
        var post = $(this);
        if (post.height() > maxheight) {
            post.css({
                'overflow': 'hidden',
                'height': maxheight + 'px'
            });
            var expandButton = $('<a>' + showText + '</a>');
            var expandDiv = $('<div></div>');
            expandDiv.append(expandButton);
            expandDiv.attr('class', 'expandPostButton');
            post.after(expandDiv);
            var isInStorage = sessionStorage.getItem(String(post[0].id));
            if (isInStorage === 'show')
                togglePost(false);
            expandButton.click(function (event) {
                event.preventDefault();
                if (post.height() > maxheight) {
                    togglePost(true);
                }
                else {
                    togglePost(false);
                }
            });
            function togglePost(isExpanded) {
                if (isExpanded) {
                    expandButton.html(showText);
                    post.css({ 'height': maxheight + 'px' });
                    sessionStorage.removeItem(String(post[0].id));
                }
                else {
                    expandButton.html(hideText);
                    post.css({ 'height': 'auto' });
                    sessionStorage.setItem(String(post[0].id), 'show');
                }
            }
        }
    });
});
