var toggleButton: any;
var css: HTMLInputElement | null;
var cssEnabled: boolean = false;

document.addEventListener("DOMContentLoaded", () => {
  if (localStorage.getItem("cssEnabled") === null) {
    localStorage.clear();
    localStorage.setItem("cssEnabled", JSON.stringify(false));
  } else {
    cssEnabled = JSON.parse(localStorage.getItem("cssEnabled"));

    if (cssEnabled) toggleCSS();
  }

  createToggleButton();

  toggleButton.onclick = () => {
    toggleCSS();
  };
});

function createToggleButton() {
  let node = document.createElement("li");
  document.getElementById("menu").firstElementChild.appendChild(node);

  let childNode = createChildNode();

  node.insertBefore(childNode, null);

  toggleButton = document.getElementById("darkmode-toggle");
}

function createChildNode() {
  let childNode = document.createElement("a");
  childNode.setAttribute("id", "darkmode-toggle");
  let childNodeContent = document.createTextNode("\u2600");
  childNode.appendChild(childNodeContent);

  return childNode;
}

function toggleCSS() {
  if (css === undefined) {
    let node = document.createElement("link");
    node.setAttribute("id", "darkModeCSS");
    node.setAttribute("rel", "stylesheet");
    node.setAttribute("type", "text/css");
    node.setAttribute("href", "css/dark.css");
    document.head.appendChild(node);

    css = <HTMLInputElement> document.getElementById("darkModeCSS");

    cssEnabled = true;
  }
  else {  
    if(css) {
        if (cssEnabled) {
            css.disabled = true;
          } else css.disabled = false;
    }

    cssEnabled = !cssEnabled;
  }

  localStorage.setItem("cssEnabled", JSON.stringify(cssEnabled));
}

function setCSS(CSS: HTMLInputElement, enable: boolean) {
    if(CSS) {
        CSS.disabled = !enable;
    }
}
