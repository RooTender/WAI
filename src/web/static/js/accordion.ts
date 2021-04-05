$(document).ready(() => {
    $('#3 ol, #4 ol').accordion({
        header: "h4",
        active: false,
        heightStyle: "content"
    });

    $('#tabs').tabs();
})