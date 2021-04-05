var toggleButton;
var css;
var cssEnabled = false;
document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("cssEnabled") === null) {
        localStorage.setItem("cssEnabled", JSON.stringify(false));
    }
    else {
        cssEnabled = JSON.parse(localStorage.getItem("cssEnabled"));
        if (cssEnabled)
            toggleCSS();
    }
    createToggleButton();
    toggleButton.onclick = function () {
        toggleCSS();
    };
});
function createToggleButton() {
    var node = document.createElement("li");
    document.getElementById("menu").firstElementChild.appendChild(node);
    var childNode = createChildNode();
    node.insertBefore(childNode, null);
    toggleButton = document.getElementById("darkmode-toggle");
}
function createChildNode() {
    var childNode = document.createElement("a");
    childNode.setAttribute("id", "darkmode-toggle");
    var childNodeContent = document.createTextNode("\u2600");
    childNode.appendChild(childNodeContent);
    return childNode;
}
function toggleCSS() {
    if (css === undefined) {
        var node = document.createElement("link");
        node.setAttribute("id", "darkModeCSS");
        node.setAttribute("rel", "stylesheet");
        node.setAttribute("type", "text/css");
        node.setAttribute("href", "./static/css/dark.css");
        document.head.appendChild(node);
        css = document.getElementById("darkModeCSS");
        cssEnabled = true;
    }
    else {
        if (css) {
            if (cssEnabled) {
                css.disabled = true;
            }
            else
                css.disabled = false;
        }
        cssEnabled = !cssEnabled;
    }
    localStorage.setItem("cssEnabled", JSON.stringify(cssEnabled));
}
function setCSS(CSS, enable) {
    if (CSS) {
        CSS.disabled = !enable;
    }
}
