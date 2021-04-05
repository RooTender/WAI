$(document).ready(() => {
    let maxheight = 250;
    let showText = "Pokaż więcej";
    let hideText = "Ukryj treść";

    $('article').each(() => {
        let post: JQuery<typeof globalThis> = $(this);
        
        if(post.height() > maxheight) {
            post.css({
                'overflow': 'hidden',
                'height': maxheight + 'px' });

            let expandButton = $('<a>' + showText + '</a>');
            let expandDiv = $('<div></div>');
            expandDiv.append(expandButton);
            expandDiv.attr('class', 'expandPostButton');
            post.after(expandDiv);

            let isInStorage = sessionStorage.getItem(String(post[0].id));
            if(isInStorage === 'show')
                togglePost(false);

            expandButton.click((event) => {
                event.preventDefault();

                if(post.height() > maxheight) {
                    togglePost(true);
                }
                else {
                    togglePost(false);
                }
            });

            function togglePost(isExpanded: boolean) {
                if(isExpanded) {
                    expandButton.html(showText);
                    post.css({'height': maxheight + 'px'});
                    sessionStorage.removeItem(String(post[0].id));
                } else {
                    expandButton.html(hideText);
                    post.css({'height': 'auto'});
                    sessionStorage.setItem(String(post[0].id), 'show');
                }
            }
        }
    });
});