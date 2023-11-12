function DownloadImg(DivId, MenfessRoom) {
  // Select the div you want to convert
  var divToConvert = document.getElementById(DivId);

  // Set the scale for the desired resolution (e.g., 2 for twice the resolution)
  var scale = 20;

  // Use html2canvas with the scale option
  html2canvas(divToConvert, {
    scale: scale,
  }).then(function (canvas) {
    // Convert canvas to data URL
    var imgData = canvas.toDataURL("image/png");

    // Create a link element to download the image
    var link = document.createElement("a");
    link.href = imgData;
    link.download = MenfessRoom + "-" + DivId + ".png";

    // Trigger the download
    link.click();
  });
}
