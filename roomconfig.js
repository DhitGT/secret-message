const previewContent = document.getElementById("menfess-preview-content");
var fontSize;
var fontColor;
var bgColor;
var fontFamily;
backgroundImage = document.querySelector(".bg-img-input").files[0].name;
var textAlign;
var backgroundBlendMode;
var rgba = "rgba(0,0,0,1)";
var imgUrl = "";
init();

function init() {
  fontSize = document.querySelector("#fontsize-input").value;
  fontColor = document.querySelector("#fontcolor-input").value;
  fontFamily = document.querySelector("#font-input").value;
  textAlign = document.getElementById("menfess-preview-content").style
    .textAlign;
  backgroundImage = document.querySelector(".bg-img-input").files[0].name;
}

function fontSizeHandler(value) {
  previewContent.style.fontSize = value + "px";
  document.querySelector(".num-range-fontSize").innerHTML = value + "px";
}

function fontColorHandler(value) {
  previewContent.style.color = value;
}
function bgHandler() {
  var alpha = document.querySelector("#alpha-input").value;
  var rawColor = document.querySelector("#bg-color").value;

  var hex = rawColor.substring(1); // Remove the '#' character
  var bigint = parseInt(hex, 16);
  var rgb = [(bigint >> 16) & 255, (bigint >> 8) & 255, bigint & 255];
  rgba = "rgba(" + rgb[0] + ", " + rgb[1] + ", " + rgb[2] + ", " + alpha + ")";
  previewContent.style.background = `linear-gradient(${rgba}, ${rgba}),url('${imgUrl}')`;
  document.getElementById("value-alpha").innerHTML = alpha;
}

function fontHandler(value, btn) {
  previewContent.style.fontFamily = value;
  btn.style.fontFamily = value;
}

function bgImgHandler(event) {
  const input = event.target;

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      imgUrl = e.target.result;
      previewContent.style.backgroundImage = "url(" + e.target.result + ")";
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function fontAlignHandler(align) {
  previewContent.style.textAlign = align;
}



function getImgName(url) {
  // Use a regular expression to match the filename with extension in the URL
  var matches = url.match(/\/([^\/?#]+)[^\/]*$/);

  if (matches) {
    // The filename with extension is captured in the first capturing group
    return matches[1];
  } else {
    // Return null or handle the case where no match is found
    return null;
  }
}

function generateCSS() {
  init();

  let cssTxt = `font-size: ${fontSize}px;color: ${fontColor};font-family: ${fontFamily};background:linear-gradient(${rgba},${rgba}), url(\\'../media/img/${backgroundImage}\\');text-align: ${textAlign};`;
  document.getElementById("css-value").value = cssTxt;
}
